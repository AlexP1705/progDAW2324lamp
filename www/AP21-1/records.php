<?php

require_once "Autoloader.php";
$connection = new Connection();
$conn = $connection->getConn();

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

for ($i = 0; $i < 50; $i++) {


}

$conn->close();
