<?php
header("Content-Type: application/json");
include 'db.php';


$sql="SELECT items.name, items.price FROM vendors Join items ON items.FID_Vendor=vendors.ID_Vendors WHERE vendors.name = :vendor";

    $sth=$conn->prepare($sql);
    $sth->execute(array(':vendor' => $_GET['vendor']));
	
    $result = $sth->fetchAll(PDO::FETCH_OBJ);
	
    echo json_encode($result);
?>

    