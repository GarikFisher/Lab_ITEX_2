<?php
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
require __DIR__ . '/Conect.php';

$id=$_GET['id'];
$name=$_GET['name'];
$date=$_GET['date'];
$depart=$_GET['depart_select'];
$shifts=$_GET['shift'];

$sql="INSERT INTO nurse (id_nurse, name, date, department, shift) VALUES(:id_n,:name_n,:date_n,:depart_n,:shifts_n)";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(':id_n'=>$id, 'name_n'=>$name,':date_n'=>$date,':depart_n'=>$depart,':shifts_n'=>$shifts));
echo json_encode($stmt);
?>