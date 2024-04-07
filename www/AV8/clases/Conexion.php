<?php
class Conexion {
    private $host;
    private $username;
    private $password;
    private $database;

    public function __construct() {
        $confFile = 'conf.csv';
        if (!file_exists($confFile)) {
            die("Error: El archivo $confFile no existe.");
        }

        $conf = fgetcsv(fopen($confFile, 'r'));
        if ($conf === false) {
            die("Error: No se pudo leer el archivo $confFile.");
        }

        $this->host = $conf[0];
        $this->username = $conf[1];
        $this->password = $conf[2];
        $this->database = $conf[3];
    }

    public function connect() {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        return $conn;
    }
}