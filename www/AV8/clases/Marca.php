<?php
class Marca {
    private $Id;
    private $Name;

    public function __construct($Id,$Name) {
        $this->Id = $Id;
        $this->Name = $Name;
    }

    public function getId() {
        return $this->Id;
    }

    public function setId($Id) {
        $this->Id=$Id;
    }

    public function getName() {
        return $this->Name;
    }

    public function setName($Name) {
        $this->Name=$Name;
    }    
}