<?php
header("Cache-Control: no-cache, must-revalidate");
require __DIR__ . '/Conect.php';

$name=$_GET['name'];
$sql="SELECT ward.name FROM nurse JOIN nurse_ward ON nurse.id_nurse=nurse_ward.fid_nurse JOIN ward ON nurse_ward.fid_ward=ward.id_ward WHERE nurse.name=:name";
$sth = $dbh->prepare($sql);
$sth->execute(array(':name' => $name));
$timetable = $sth->fetchAll(PDO::FETCH_NUM);
foreach ($timetable as $row){
echo "<tr><td>$row[0]</td></tr>";
}
?>