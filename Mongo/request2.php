<?php
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
require_once __DIR__ . '/vendor/autoload.php';

$depart=(int)$_GET['department'];
$collection = (new MongoDB\Client)->labItex4->nurse;
$cursor = $collection->find(['department' => $depart], ['projection'=>['name'=>1]])->ToArray();
echo json_encode($cursor);
?>