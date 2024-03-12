<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
        <?php
                require_once "Autoloader.php";
                $datos = new Connection();
                $conn= $datos->getConn();
                $query = 'SELECT * From visitas';
                $result = $conn->query($query);
                $totalRegisters = $result->num_rows;
                $regxPag=10;
                $pages=ceil($totalRegisters/$regxPag);
                echo '<table class="table table-striped">';
                echo '<thead><tr><th>Id</th><th>Company</th><th>Investment</th><th>Date</th><th>Active</th><th>Actions</th></tr></thead>';
                $pagina=isset($_GET["pag"]) ? ($_GET["pag"]) : 1;
                if ($pagina > $pages) {
                    $pagina=$pages;
                } elseif ($pagina < 1) {
                    $pagina=1;
                }
                $inicio=($pagina-1) * $regxPag;
                $fin=$inicio+$regxPag-1;
                if ($fin > $totalRegisters) {
                    $fin=$totalRegisters-1;
                }


                for ($i=$inicio; $i <= $fin; $i++) {
                    echo '<tr>';
                    $result->data_seek($i);
                    $data = $result->fetch_array(MYSQLI_ASSOC);
                    
                        foreach($data as $element){
                        echo '<td>' . $element . '</td>';
                    }   
                        echo '<td>' . '<a href="delete.php?id=' . $data["Id"] . '"><img src="img/del_icon.png" alt="" width=50px height=50px ></a>' . '</td>';
                        echo '<td>' . '<a href="edit.php?id=' . $data["Id"] . '"><img src="img/edit_icon.png" alt="" width=50px height=50px ></a>' . '</td>';
                        echo '</tr>';
                        
                }
                    echo '</table>';

        ?>
        <tfoot>
            <tr>
                <td colspan="6">
                    <a href="insert.php">AÑADIR</a>
                    <br>
                    <br>
                    <?php

                        for ($i=1; $i <= $pages; $i++) {
                            if ($pagina == $i) {
                                echo '<strong>' . " $i " . '</strong>';
                            } else{
                                echo '<a href="index.php?pag=' . $i . ' ">' . " $i " . '</a>';
                            }
                        }

                        echo '<a href="index.php?pag=' . 1 . ' ">' . " << " . '</a>';
                        echo '<a href="index.php?pag=' . $pages . ' ">' . " >> " . '</a>';
                        
                        echo '<a href="index.php?pag=' . $pagina-1 . ' ">' . " < " . '</a>';
                        echo '<a href="index.php?pag=' . $pagina+1 . ' ">' . " > " . '</a>';

                    ?>
                </td>
            </tr>
        </tfoot>
</body>

</html>