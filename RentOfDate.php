<?php
include("connect.php");
$CostOfRent = $_GET["CostOfRent"];

    try 
    {

        $sqlSelect = "SELECT Date_start, Date_end, Cost FROM rent WHERE Date_end =:CostOfRent";
       
        $sth = $dbh->prepare($sqlSelect);
        $sth->bindValue(":CostOfRent",$CostOfRent);
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        $data = array();

    
        foreach($res as $row)
        {
           array_push($data,$row['Cost']);
           
        }
        $json_data = json_encode($data);
        echo $json_data;
    }
    catch(PDOException $ex)
    {
        echo $ex->GetMessage();
    }
    $dbh = null;
?>