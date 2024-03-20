<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Visit</title>
</head>
<body>
    <?php
        if (isset($_GET['id'])) {
            $idVisitas = $_GET['id'];

            echo "¿Do you wnat delete visit with Id: ".$idVisitas."?";

            echo "
                <form action=\"remove.php\" method=\"post\">
                        <input type=\"hidden\" name=\"id\" value=\"".$idVisitas."\" />
                        <button type=\"submit\" class=\"btn btn-primary\" name=\"submit\">Delete Client</button>
                </form>
            ";

        }

    ?>
</body>
</html>