<?php

require_once 'autoloader.php';

$connObj = new Conexion();
$conn = $connObj->connect();

$importacion = new Importar($conn);

$importacion->customers();
$importacion->brandCustomer();