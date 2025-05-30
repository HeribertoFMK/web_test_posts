<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$db = 'blog';
$user = 'Heriberto';
$pass = 'romario';
$conn = new mysqli($host,$user,$pass,$db);
if ($conn -> connect_error) {
    die("erro de conexão: . $conn -> connect_error ");
}
?>