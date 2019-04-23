<?php

$conn = null;

$servername = "www.renovasol.com.br:3306";
$user = "root";
$password = "live@2019";
$database = "milha_toolsnet";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    $err = $e->getMessage();
}

?>