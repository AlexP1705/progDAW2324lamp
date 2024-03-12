<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Client</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h2>Add New Client</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="Id">Id:</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="Company">Company:</label>
                <input type="text" class="form-control" id="company" name="company" required>
            </div>
            <div class="form-group">
                <label for="Investment">Investment:</label>
                <input type="text" class="form-control" id="investment" name="investment" required>
            </div>
            <div class="form-group">
                <label for="Date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="Active">Active:</label>
                <select class="form-control" id="active" name="active" required>
                    <option value="1">True</option>
                    <option value="0">False</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add Client</button>
        </form>
    </div>

    <?php
    require_once "Autoloader.php";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $connection = new Connection();
        $conn = $connection->getConn();

        $id = $_POST['id'];
        $company = $_POST['company'];
        $investment = $_POST['investment'];
        $date = $_POST['date'];
        $active = $_POST['active'];

        $sql = "INSERT INTO visitas (Id, Company, Investment, Date, Active) VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("isdsi", $id, $company, $investment, $date, $active);

        $stmt->execute();
    }
    ?>
</body>

</html>