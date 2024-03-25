<?php

class Conexion
{
    private $host;
    private $username;
    private $password;
    private $database;

    public function __construct()
    {
        $conf = $this->readConfig();
        $this->host = $conf['host'];
        $this->username = $conf['username'];
        $this->password = $conf['password'];
        $this->database = $conf['database'];
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

    public function connect()
    {
        return new mysqli($this->host, $this->username, $this->password, $this->database);
    }
}