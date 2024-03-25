<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];

    $tareas = new Tareas();
    $tareas->updateTarea($id, $titulo, $descripcion, $fecha_vencimiento);

    header("Location: Modifica.php?id={$id}");
    exit();
}
