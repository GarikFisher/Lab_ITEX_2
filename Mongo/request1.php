<?php
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
require_once __DIR__ . '/vendor/autoload.php';

$name=$_GET['name'];
$collection = (new MongoDB\Client)->labItex4->nurse;
$cursor = $collection->find(['name' => $name], ['projection'=>['ward'=>1]])->ToArray();
echo json_encode($cursor);
?>