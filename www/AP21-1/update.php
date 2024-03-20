<?php
require_once "Autoloader.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $connection = new Connection();
    $conn = $connection->getConn();

    $id = $_POST['id'];
    $company = $_POST['company'];
    $investment = $_POST['investment'];
    $date = $_POST['date'];
    $active = $_POST['active'];

    $sql = "UPDATE visitas SET Company=\"".$company."\", Investment=\"".$investment."\",  Date=\"".$date."\", Active=\"".$active."\" WHERE Id=\"".$id."\"";

    if ($conn->query($sql) === TRUE) {
        echo "Visit updated successfully";
      } else {
        echo "Error updating visit: " . $conn->error;
      }
}

?>