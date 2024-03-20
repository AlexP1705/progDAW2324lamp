<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar visitas</title>
</head>
<body>

<?php

function checkSelected($value,$option){
    if($value == $option)
        return " selected ";
    else
        return "";
}

if (isset($_GET['id'])) {
    $idVisitas = $_GET['id'];

    
    require_once "Autoloader.php";
    $datos = new Connection();
    $conn= $datos->getConn();
    $query = "SELECT * From visitas where id='$idVisitas'";
    $result = $conn->query($query);
    
    if($result->num_rows) {

        $row = mysqli_fetch_assoc($result);

        echo "
        
        <div class=\"container\">
        <h2>Edit Client</h2>
        <form action=\"update.php\" method=\"post\">
            <div class=\"form-group\">
                <label for=\"id\">Id:</label>
                <input type=\"text\" class=\"form-control\" id=\"id\" name=\"id\" value=\"".$row["Id"]."\" required>
            </div>
            <div class=\"form-group\">
                <label for=\"company\">Company:</label>
                <input type=\"text\" class=\"form-control\" id=\"company\" name=\"company\" value=\"".$row["Company"]."\" required>
            </div>
            <div class=\"form-group\">
                <label for=\"investment\">Investment:</label>
                <input type=\"text\" class=\"form-control\" id=\"investment\" name=\"investment\" value=\"".$row["Investment"]."\" required>
            </div>
            <div class=\"form-group\">
                <label for=\"date\">Date:</label>
                <input type=\"date\" class=\"form-control\" id=\"date\" name=\"date\" value=\"".$row["Date"]."\" required>
            </div>
            <div class=\"form-group\">
                <label for=\"active\">Active:</label>
                <select class=\"form-control\" id=\"active\" name=\"active\" required>
                    <option ".checkSelected($row["Active"],1)."value=\"1\">True</option>
                    <option ".checkSelected($row["Active"],0)."value=\"0\">False</option>
                </select>
            </div>
            <button type=\"submit\" class=\"btn btn-primary\" name=\"submit\">Edit Client</button>
        </form>
        </div>
        
        
        ";
    }
    else {
        echo "<p>No exite esa visita";
    }


} else { 
    echo "<p> No hay datos  que editar </p>";
}

?>

</body>
</html>