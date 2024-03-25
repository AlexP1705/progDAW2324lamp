<?php
class Modelo extends Conexion
{
    public function getAllProductos($order)
    {
        $conn = $this->connect();
        $query = "SELECT * FROM productos ORDER BY descripcion $order";
        $result = $conn->query($query);
        $productos = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
        }
        $conn->close();
        return $productos;
    }

    public function showAllProductos($order = 'ASC')
    {
        $productos = $this->getAllProductos($order);
        echo "<table border='1'><tr><th>Producto ID</th><th>Descripción</th></tr>";
        foreach ($productos as $producto) {
            echo "<tr><td>{$producto['prod_num']}</td><td>{$producto['descripcion']}</td></tr>";
        }
        echo "</table>";
    }
    
    public function getAllEmp()
    {
        $conn = $this->connect();
        $query = "SELECT EMP_NO, APELLIDOS, DEPT_NO, FORMAT(SALARIO, 2, 'es_ES') AS SALARIO FROM emp";
        $result = $conn->query($query);
        $empleados = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $empleados[] = $row;
            }
        }
        $conn->close();
        return $empleados;
    }

    public function showAllEmp()
    {
        $empleados = $this->getAllEmp();
        echo "<table border='1'>
    <tr>
        <th>Empleado ID</th>
        <th>Apellidos</th>
        <th>Departamento</th>
        <th>Salario</th>
    </tr>";
        foreach ($empleados as $empleado) {
            echo "<tr>
        <td>{$empleado['EMP_NO']}</td>
        <td>{$empleado['APELLIDOS']}</td>
        <td>{$empleado['DEPT_NO']}</td>
        <td>{$empleado['SALARIO']}</td>
    </tr>";
        }
        echo "
</table>";
    }


    public function getAllCliente($order)
    {
        $conn = $this->connect();
        $query = "SELECT CLIENTE_COD, NOMBRE, CIUDAD FROM Cliente ORDER BY NOMBRE $order";
        $result = $conn->query($query);
        $clientes = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $clientes[] = $row;
            }
        }
        $conn->close();
        return $clientes;
    }

    public function showAllCliente($order)
    {
        $clientes = $this->getAllCliente($order);
        echo "<table border='1'>
    <tr>
        <th>Cliente ID</th>
        <th>Nombre</th>
        <th>Ciudad</th>
    </tr>";
        foreach ($clientes as $cliente) {
            echo "<tr>
        <td>{$cliente['CLIENTE_COD']}</td>
        <td>{$cliente['NOMBRE']}</td>
        <td>{$cliente['CIUDAD']}</td>
    </tr>";
        }
        echo "
</table>";
    }


    public function getPedidoOver($total)
    {
        $conn = $this->connect();
        $query = "SELECT PEDIDO_NUM, CLIENTE_COD, TOTAL FROM pedido WHERE TOTAL >= $total";
        $result = $conn->query($query);
        $pedidos = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pedidos[] = $row;
            }
        }
        $conn->close();
        return $pedidos;
    }

    public function showPedidoOver($total)
    {
        $pedidos = $this->getPedidoOver($total);
        echo "<table border='1'>
    <tr>
        <th>Pedido Num</th>
        <th>Cliente Cod</th>
        <th>Total</th>
    </tr>";
        foreach ($pedidos as $pedido) {
            echo "<tr>
        <td>{$pedido['PEDIDO_NUM']}</td>
        <td>{$pedido['CLIENTE_COD']}</td>
        <td>{$pedido['TOTAL']}</td>
    </tr>";
        }
        echo "
</table>";
    }


    public function getLineasPedido($pedido)
    {
        $conn = $this->connect();
        $query = "SELECT PEDIDO_NUM, DETALLE_NUM, IMPORTE FROM detalle WHERE PEDIDO_NUM = $pedido";
        $result = $conn->query($query);
        $lineasPedido = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $lineasPedido[] = $row;
            }
        }
        $conn->close();
        return $lineasPedido;
    }

    public function getLineasPedidoMayor($pedido)
    {
        $conn = $this->connect();
        $query = "SELECT MAX(IMPORTE) AS MAX_IMPORTE FROM detalle WHERE PEDIDO_NUM = $pedido";
        $result = $conn->query($query);
        $maxImporte = 0;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $maxImporte = $row['MAX_IMPORTE'];
        }
        $conn->close();
        return $maxImporte;
    }

    public function showLineasPedido($pedido)
    {
        $lineasPedido = $this->getLineasPedido($pedido);
        $maxImporte = $this->getLineasPedidoMayor($pedido);
        echo "<table border='1'>
    <tr>
        <th>Pedido Num</th>
        <th>Detalle Num</th>
        <th>Importe</th>
    </tr>";
        foreach ($lineasPedido as $linea) {
            $importe = $linea['IMPORTE'];
            if ($importe == $maxImporte) {
                echo "<tr>
        <td>{$linea['PEDIDO_NUM']}</td>
        <td>{$linea['DETALLE_NUM']}</td>
        <td>{$importe} *</td>
    </tr>";
            } else {
                echo "<tr>
        <td>{$linea['PEDIDO_NUM']}</td>
        <td>{$linea['DETALLE_NUM']}</td>
        <td>{$importe}</td>
    </tr>";
            }
        }
        echo "
</table>";
    }


    public function showPaginator(int $totalItems, int $itemsPerPage, int $currentPage)
    {
        $totalPages = ceil($totalItems / $itemsPerPage);

        echo '<a href="?page=1">Primera</a>';

        if ($currentPage > 1) {
            echo '<a href="?page=' . ($currentPage - 1) . '">Anterior</a>';
        }

        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
                echo '<span style="font-weight: bold;">' . $i
                    . '</span>';
            } else {
                echo '<a href="?page=' . $i . '">' . $i . '</a>';
            }
        }
        if ($currentPage < $totalPages) {
            echo '<a href="?page=' . ($currentPage + 1) . '">Siguiente</a>';
        }
        echo '<a href="?page=' . $totalPages
            . '">Última</a>';
    }
    public function showOrderAction($order)
    {
        if ($order == 'ASC') {
            echo "<th><a href='?order=DESC'>Descripción</a></th>";
        } else {
            echo "<th><a href='?order=ASC'>Descripción</a></th>";
        }
    }
}