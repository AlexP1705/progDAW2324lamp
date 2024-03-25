<?php

class Modelo extends Conexion
{
    public function importar()
    {
        $db = $this->connect();
        $stmt = $db->prepare("INSERT INTO tareas (titulo, descripcion, fecha_creacion, fecha_vencimiento) VALUES (?, ?, ?, ?)");
        if (($handle = fopen("tareas.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $fecha_creacion = date("Y-m-d"); 
                $stmt->bind_param("ssss", $data[0], $data[1], $fecha_creacion, date("Y-m-d", strtotime($data[2])));
                $stmt->execute();
            }
            fclose($handle);
        }
        $stmt->close();
        $db->close();
    }

    public function deleteList()
    {
        $db = $this->connect();
        $db->query("DELETE FROM tareas");
        $db->close();
    }

    public function init()
    {
        $this->deleteList();
        $this->importar();
    }

    public function addTarea($titulo, $descripcion, $fecha_vencimiento)
    {
        $db = $this->connect();
        $fecha_creacion = date("Y-m-d");
        $stmt = $db->prepare("INSERT INTO tareas (titulo, descripcion, fecha_creacion, fecha_vencimiento) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $titulo, $descripcion, $fecha_creacion, $fecha_vencimiento);
        $stmt->execute();
        $stmt->close();
        $db->close();
    }

    public function updateTarea($id, $titulo, $descripcion, $fecha_vencimiento)
    {
        $db = $this->connect();
        $stmt = $db->prepare("UPDATE tareas SET titulo = ?, descripcion = ?, fecha_vencimiento = ? WHERE id = ?");
        $stmt->bind_param("sssi", $titulo, $descripcion, $fecha_vencimiento, $id);
        $stmt->execute();
        $stmt->close();
        $db->close();
    }
    public function deleteTarea($id)
    {
        $db = $this->connect();
        $stmt = $db->prepare("DELETE FROM tareas WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $db->close();
    }
}