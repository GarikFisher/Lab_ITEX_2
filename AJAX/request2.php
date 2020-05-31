<?php
header('Content-Type: text/xml; charset=utf8');
header("Cache-Control: no-cache, must-revalidate");
require __DIR__ . '/Conect.php';

$depart=$_GET['department'];
$sql="SELECT name FROM nurse WHERE department=:depart";
$sth = $dbh->prepare($sql);
$sth->execute(array(':depart' => $depart));
$timetable = $sth->fetchAll(PDO::FETCH_NUM);

echo '<?xml version="1.0" encoding="utf8"?>';
echo "<root>";
foreach ($timetable as $row)
{
$names=$row[0];
print "<row><name>$names</name></row>";
}
echo "</root>";


?>