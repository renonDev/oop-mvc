<?php

$host = 'localhost';
$dbname = 'inventory';
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
} 
