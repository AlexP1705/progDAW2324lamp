<?php

class Tareas extends Modelo
{
    private $itemsPorPagina;

    public function __construct()
    {
        parent::__construct();
        $conf = $this->readConfig();
        $this->itemsPorPagina = $conf['items_por_pagina']; 
    }

    public function getAllTasks($pagina = 1, $orden = 'id')
    {
        $inicio = ($pagina - 1) * $this->itemsPorPagina;
        $db = $this->connect();
        $result = $db->query("SELECT * FROM tareas ORDER BY $orden LIMIT $inicio, $this->itemsPorPagina");
        $tasks = $result->fetch_all(MYSQLI_ASSOC);
        $result->close();
        $db->close();
        return $tasks;
    }

    public function showAllTasks($pagina = 1)
    {
        $orden = $this->getCurrentOrder();

        $tasks = $this->getAllTasks($pagina, $orden);

        foreach ($tasks as $task) {
            echo "<tr>";
            echo "<td>{$task['id']}</td>";
            echo "<td><a href='detalle.php?id={$task['id']}'>{$task['titulo']}</a></td>";
            echo "<td>" . date("d/m/Y", strtotime($task['fecha_vencimiento'])) . "</td>";
            echo "</tr>";
        }

        $this->showNavigation($pagina);
    }

    public function showNavigation($pagina)
    {
        echo "<div>";
        echo "Página: ";
        echo "<a href='?pagina=1'>Primera</a>";
        for ($i = max(1, $pagina - 5); $i <= min($pagina + 5, ceil($this->getTotalTasks() / $this->itemsPorPagina)); $i++) {
            if ($i == $pagina) {
                echo "<span>$i</span>";
            } else {
                echo "<a href='?pagina=$i'>$i</a>";
            }
        }

        echo "<a href='?pagina=" . ceil($this->getTotalTasks() / $this->itemsPorPagina) . "'>Última</a>";
        echo "</div>";
    }

    public function showOrderAction()
    {
        $currentOrder = $this->getCurrentOrder();
        echo "<th><a href='?orden=id'>ID</a></th>";
        echo "<th><a href='?orden=titulo'>Título</a></th>";
        echo "<th><a href='?orden=fecha_vencimiento'>Fecha de Vencimiento</a></th>";
    }

    private function getTotalTasks()
    {
        $db = $this->connect();
        $result = $db->query("SELECT COUNT(*) AS total FROM tareas");
        $total = $result->fetch_assoc()['total'];
        $result->close();
        $db->close();
        return $total;
    }

    private function getCurrentOrder()
    {
        $orden = isset($_GET['orden']) ? $_GET['orden'] : (isset($_SESSION['orden']) ? $_SESSION['orden'] : 'id');
        $_SESSION['orden'] = $orden;
        return $orden;
    }

    private function readConfig()
    {
        $config = array();
        if (($handle = fopen("conf.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $config[$data[0]] = $data[1];
            }
            fclose($handle);
        }
        return $config;
    }
}
