<?php
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
require __DIR__ . '/Conect.php';

$shifts=$_GET['shift'];
$sql="SELECT nurse.name as nuse_name, ward.name as ward_name FROM nurse JOIN nurse_ward ON nurse.id_nurse=nurse_ward.fid_nurse JOIN ward ON nurse_ward.fid_ward=ward.id_ward WHERE nurse.shift=:shifts";
$sth = $dbh->prepare($sql);
$sth->execute(array(':shifts' => $shifts));
$timetable = $sth->fetchAll(PDO::FETCH_OBJ);
echo json_encode($timetable);
?>
