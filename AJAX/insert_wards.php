<?php
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
require __DIR__ . '/Conect.php';

$id=$_GET['id'];
$name=$_GET['name'];
$sql="INSERT INTO ward (id_ward, name) VALUES(:id_n,:name_n)";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(':id_n'=>$id, 'name_n'=>$name));
?>