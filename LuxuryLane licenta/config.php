<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "luxury";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiune eșuată: " . $conn->connect_error);
}
?>
