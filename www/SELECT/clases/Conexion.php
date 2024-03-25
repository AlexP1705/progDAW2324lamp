<?php
class Conexion {
    private $host;
    private $username;
    private $password;
    private $database;

    public function __construct() {
        $config = $this->readCSVConfig('conf.csv');
        if ($config === false || count($config) !== 4) {
            throw new Exception("Error cargando la configuración de la conexión desde el archivo CSV.");
        }
        list($this->host, $this->username, $this->password, $this->database) = $config;
    }

    private function readCSVConfig($filename) {
        $handle = fopen($filename, "r");
        if ($handle === false) {
            throw new Exception("Error abriendo el archivo CSV.");
        }
        $data = fgetcsv($handle);
        fclose($handle);

        return $data;
    }

    public function connect() {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}