<?php
$host = "localhost";
$dbUserName="root";
$dbPassword="";
$dbName="practiceSignup";

$dsn = "mysql:host=$host;dbname=$dbName;";

try {
    $pdo = new PDO($dsn,$dbUserName,$dbPassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Failed To Connect with Database ".$e->getMessage());
}