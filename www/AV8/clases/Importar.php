<?php
class Importar {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function customers() {
        $csvFile = 'customers.csv';
        if (!file_exists($csvFile)) {
            die("Error: El archivo $csvFile no existe.");
        }

        $handle = fopen($csvFile, 'r');

        if ($handle === false) {
            die("Error al abrir el archivo $csvFile.");
        }

        $stmt = null;

        while (($data = fgetcsv($handle,0,'#')) !== false) { 
        
            $customerId = $data[0];
            $customerName = $data[1];

            $returnCustomerId = null;

            $stmt = $this->conn->prepare("SELECT customerId FROM customers WHERE customerId = ?");
    
            if ($stmt === false) {
                die("Error al preparar la sentencia: " . $this->conn->error);
            }
    
            $stmt->bind_param("s", $customerId);
            $stmt->execute();
            $stmt->bind_result($returnCustomerId); 
    
            $stmt->fetch();
    
            $stmt->close();
    
            if(!is_null($returnCustomerId)){
                $stmt = $this->conn->prepare("UPDATE customers SET customerName=? WHERE customerId=?");

                if ($stmt === false) {
                    die("Error al preparar la sentencia: " . $this->conn->error);
                } 

                $stmt->bind_param("ss", $customerName, $customerId);
            }else{
                $stmt = $this->conn->prepare("INSERT INTO customers (customerId, customerName) VALUES (?, ?)");

                if ($stmt === false) {
                    die("Error al preparar la sentencia: " . $this->conn->error);
                } 

                $stmt->bind_param("ss", $customerId, $customerName);
            }

            $stmt->execute();

            if ($stmt->error) {
                echo "Error al insertar cliente: " . $stmt->error;
            } 
        }

        if($stmt){
            $stmt->close();
        }

        fclose($handle);
    }

    public function brandCustomer() {
        $csvFile = 'customers.csv';
        if (!file_exists($csvFile)) {
            die("Error: El archivo $csvFile no existe.");
        }
        $stmt = $this->conn->prepare("INSERT INTO brandCustomer (customerId, brandId) VALUES (?, ?)");

        if ($stmt === false) {
            die("Error al preparar la sentencia: " . $this->conn->error);
        }

        $handle = fopen($csvFile, 'r');

        if ($handle === false) {
            die("Error al abrir el archivo $csvFile.");
        }
        while (($data = fgetcsv($handle,0,'#')) !== false) {
            
            $customerId = $data[0];
            $brandNames = $data[2];

            if($brandNames){
                $brandNamesArray = explode(", ", $brandNames);
                foreach ($brandNamesArray as $brandName) {
                    $brandId = $this->getBrandId($brandName);
                    if($brandId){
                        $stmt->bind_param("si", $customerId, $brandId);
                        $stmt->execute();
            
                        if ($stmt->error) {
                            echo "Error al insertar marca favorita: " . $stmt->error;
                        } 
                    }
                }
            }
        }
        $stmt->close();
        fclose($handle);
    }

    public function getBrandId($brandName) : int {

        $brandId = null;

        $stmt = $this->conn->prepare("SELECT brandId FROM brands WHERE brandName = ?");

        if ($stmt === false) {
            die("Error al preparar la sentencia: " . $this->conn->error);
        }

        $stmt->bind_param("s", $brandName);
        $stmt->execute();
        $stmt->bind_result($brandId); 

        $stmt->fetch();

        $stmt->close();

        return (int) $brandId;
    }
}