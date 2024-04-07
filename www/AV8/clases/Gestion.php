<?php
class Gestion
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getBrands()
    {

        $marasArray = [];

        $sql = "SELECT brandId, brandName FROM brands";

        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $marca = new Marca($row["brandId"], $row["brandName"]);
                array_push($marasArray, $marca);
            }
        }

        if (sizeof($marasArray) > 0) {
            usort($marasArray, function ($first, $second) {
                return strtolower($first->getName()) <=> strtolower($second->getName());
            });
        }


        foreach ($marasArray as $marca) {
            echo "<input type='checkbox' value='" . $marca->getId() . "' name='" . $marca->getName() . "'> " . $marca->getName() . "<br>";
        }
    }
}