<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ProjetLecteur\Modele;

/**
 * Description of ModelMusique
 *
 * @author alexd
 */
class ModelMusique extends Model{
    private $musique; 
    private $title; 
    
    public function getData () { 
        return $this->musique; 
    }
    
    public function getTitle () { 
        return $this->titile; 
    }
    
    public static function getModelDefaultMusique (){ 
        $model =new self (array()); 
        $model->musique= \ProjetLecteur\Metier\Musique::getDefaultInstance();
        $model->title= "Saisie d'une adresse"; 
        return $model;     
    }
    
    public static function getModelMusique ($idmusique){ 
        $model = new self (array()); 
        $model->musique = \ProjetLecteur\Persistance\MusiqueGateway::getMusiqueById($model->dataError, $idmusique); 
        $model->title="Affichage d'une musique"; 
        return $model; 
    }
    
    public static function getModelMusiqueCreate($inputArray) { 
        $model= new self(array()); 
        $model->musique= \ProjetLecteur\Persistance\MusiqueGateway::createMusique($model->dataError,$inputArray); 
        $model->title="L'adresse a été insérée"; 
        return $model; 
    }
}
