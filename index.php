<!-- "Варіант 6" -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" type="text/javascript"></script>
    <title>Rent</title>
    <script>
    let ajax2 = new XMLHttpRequest();
        function FreeCars() 
        {
            let FreeCars = document.getElementById("FreeCars").value;
            
            ajax2.onreadystatechange = load3();
            ajax2.open("GET","FreeCars.php?FreeCars=" + FreeCars);
            ajax2.send();
        }
        function load3()
        {
            if(ajax2.readyState === 4)
            {   if(ajax2.status === 200)
                console.log(ajax2);
                document.getElementById("res3").innerHTML = ajax2.response;
            }
            
        }
    </script>
    
</head>
<body>
    <h2>Отриманий дохід з прокату станом на обрану дату</h2>
        <select name="CostOfRent" id="CostOfRent">
    <?php
    include("connect.php");

    try 
    {
         foreach($dbh->query("SELECT DISTINCT Date_end FROM rent") as $row)
        {
            echo "<option value=$row[0]>$row[0]</option>";
        }
    }
    catch(PDOException $ex)
    {
        echo $ex->GetMessage();
    }
    ?>
    </select>
    <input type="button" value="Результат" onclick="Rent()">
    <table border = '1'>
    <tbody id= "res1"></tbody>
    </table>
<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------->
   
    <h2>Автомобілі обраного виробника</h2>
        <select name="VendorName" id="VendorName">
    <?php
    include("connect.php");

    try 
    {
         foreach($dbh->query("SELECT DISTINCT Name FROM vendors") as $row)
        {
            echo "<option value=$row[0]>$row[0]</option>";
        }
    }
    catch(PDOException $ex)
    {
        echo $ex->GetMessage();
    }
    ?>
    </select>
    <input type="button" value="Результат" onclick="Ven()">
    <table border = '1'>
    <tbody id= "res2"></tbody>
    </table>

<!---------------------------------------------------------------------------------------------------------------------------->

<h2>Вільні автомобілі на обрану дату</h2>
        <select name="FreeCars" id="FreeCars">
    <?php
    include("connect.php");

    try 
    {
         foreach($dbh->query("SELECT DISTINCT Date_start FROM rent") as $row)
        {
            echo "<option value=$row[0]>$row[0]</option>";
        }
    }
    catch(PDOException $ex)
    {
        echo $ex->GetMessage();
    }
    ?>
    </select>
    <input type="button" value="Результат" onclick="FreeCars()">
    <table border = '1'>
    <thead><tr><th>ID_Cars</th><th>Name</th></tr></thead>
    <tbody id= "res3"></tbody>

</body>
</html>