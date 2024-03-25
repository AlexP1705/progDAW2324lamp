<?php
require_once 'autoloader.php'; 

$modelo = new Modelo();

echo "<h2>Empleados:</h2>";
$modelo->showAllEmp();

echo "<h2>Clientes ordenados ascendentemente por nombre:</h2>";
$modelo->showAllCliente('ASC');

echo "<h2>Pedidos con total mayor o igual a 1000:</h2>";
$modelo->showPedidoOver(1000);

echo "<h2>Líneas de pedido para el pedido número 123:</h2>";
$modelo->showLineasPedido(123);

echo "<h2>Paginador:</h2>";
$modelo->showPaginator($totalItems, $itemsPerPage, $currentPage);

echo "<h2>Ordenar por Descripción:</h2>";
$modelo->showOrderAction($order);