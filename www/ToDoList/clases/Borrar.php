<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $tareas = new Tareas();
    $tareas->deleteTarea($id);

    header("Location: Tareas.php");
    exit();
}