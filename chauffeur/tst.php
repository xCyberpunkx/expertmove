<?php
require('../config/config.php');

$sql = "SELECT * FROM reservation";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll();

echo "<pre>";
print_r($data);
echo "</pre>";
