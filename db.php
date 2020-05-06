<?php
$db_driver = "mysql"; 
$host = "localhost"; 
$database = "online_store";
$dsn = "$db_driver:host=$host; dbname=$database";
$user = 'root';
$pass = '';
$options = array(PDO::ATTR_PERSISTENT => true, PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try
{ 

    $conn=new PDO($dsn,$user,$pass, $options);

}
catch(PDOException $e)
{
    print "ERROR!".$e->getMessage()."<br/>";
    die();
}
?>
