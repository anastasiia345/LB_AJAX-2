<?php
include("connect.php");

$VendorName = $_GET["VendorName"];


    try 
    {

        $sqlSelect = "SELECT vendors.Name AS VendorName, vendors.ID_Vendors, cars.Name AS CarName
        FROM vendors INNER JOIN cars ON vendors.ID_Vendors = cars.FID_Vendors WHERE vendors.Name=:VendorName";

        $sth = $dbh->prepare($sqlSelect);
        $sth->bindValue(":VendorName",$VendorName);
        $sth->execute();
        $res = $sth->fetchAll(PDO::FETCH_NUM);

        header('Content-Type: text/xml');

    echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
    echo '<response>';
    echo '<VendorName>';

        foreach($res as $row)
        {
            echo '<VendorName>' . $row[0] . " " . $row[1] . " " . $row[2] . " " . $row[3] . '</VendorName>';
        }

    echo '</VendorName>';
    echo '</response>';

    }
    catch(PDOException $ex)
    {
        echo $ex->GetMessage();
    }
    $dbh = null;
?>