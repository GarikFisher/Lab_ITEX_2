<?php
$dsn = "mysql:host=localhost;dbname=iteh2lb1var4";
$options = array(
    PDO::ATTR_PERSISTENT => true, 
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
try {

    $dbh = new PDO ($dsn, "root", "", $options);
}
catch (PDOException $e) {

    echo "Error!: " . $e->getMessage() . "<br/>"; 
    die();
}
?>