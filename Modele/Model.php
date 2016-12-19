<?php

namespace ProjetLecteur\Modele; 

class Model {
    protected $dataError;

    public function getError () {
        if (empty($this->dataError)) {
            return false;
        }
        else {
            return $this->dataError;
        }
    }

    public  function __construct($dataError = array()) {
        $this->dataError = $dataError;
    }

}
?>
