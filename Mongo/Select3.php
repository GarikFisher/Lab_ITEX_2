<?php
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
require_once __DIR__ . '/vendor/autoload.php';

$collection = (new MongoDB\Client)->labItex4->nurse;
$cursor = $collection->find([], ['projection'=>['shift'=>1]])->ToArray();
echo json_encode($cursor);
?>