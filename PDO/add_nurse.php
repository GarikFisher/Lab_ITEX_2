<?php
require __DIR__ . '/Conect.php';

$id=$_POST['id'];
$name=$_POST['name'];
$date=$_POST['date'];
$depart=$_POST['depart_select'];
$shifts=$_POST['duty_select'];


echo "Медсестра добавлена!";
$sql="INSERT INTO nurse (id_nurse, name, date, department, shift) VALUES(:id_n,:name_n,:date_n,:depart_n,:shifts_n)";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(':id_n'=>$id, 'name_n'=>$name,':date_n'=>$date,':depart_n'=>$depart,':shifts_n'=>$shifts));


?>