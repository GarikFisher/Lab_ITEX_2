<?php
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
require __DIR__ . '/Conect.php';

$sql="SELECT DISTINCT shift FROM nurse";
$sth = $dbh->prepare($sql);
$sth->execute();
$timetable = $sth->fetchAll(PDO::FETCH_OBJ);
echo json_encode($timetable);