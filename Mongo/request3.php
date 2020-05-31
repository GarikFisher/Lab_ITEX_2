<?php
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
require_once __DIR__ . '/vendor/autoload.php';

$shifts=$_GET['shift'];
$depart=(int)$_GET['department'];
$collection = (new MongoDB\Client)->labItex4->nurse;
$cursor = $collection->find(['shift'=> $shifts, 'department' => $depart], ['projection'=>['name'=>1, 'date'=>1, 'ward'=>1]])->ToArray();
echo json_encode($cursor);
?>