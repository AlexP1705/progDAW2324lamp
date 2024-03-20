<?php
require_once "Autoloader.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $connection = new Connection();
    $conn = $connection->getConn();

    $id = $_POST['id'];

    $sql = "DELETE FROM visitas WHERE Id=\"".$id."\"";

    if ($conn->query($sql) === TRUE) {
        echo "Visit deleted successfully";
        
      } else {
        echo "Error deleting visit: " . $conn->error;
      }   

}

?>   