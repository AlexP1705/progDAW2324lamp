<?php

require_once "Autoloader.php";

$connection = new Connection();
$conn = $connection->getConn();

for ($i=0; $i < 50; $i++) { 
    $id=$i;
    $company="Manolo $i";
    $investment=rand(0, 5000);
    $date="2005/07/31";
    $active=rand(0,1);
    $query = "INSERT INTO visitas(Id, Company, Investment, Date, Active) VALUES ('$id','$company','$investment','$date','$active')";
    $result=mysqli_query($conn, $query);
}