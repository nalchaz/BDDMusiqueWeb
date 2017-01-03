<?php

namespace ProjetLecteur\Modele;

/**
 * Description of ModelCollectionMusique
 *
 * @author alexd
 */
class ModelCollectionMusique extends Model {
    private $collectionMusique ; 
    
    public function getData(){ 
        return $this->collectionMusique; 
    }
    
    public function __construct() {
        $this->collectionMusique=array(); 
        $this->dataError=array(); 
    }
    
    public static function getModelMusiqueAll (){ 
        $model = new self(array()); 
        $model->collectionMusique = \ProjetLecteur\Persistance\MusiqueGateway::getMusiqueAll($model->dataError); 
        return $model; 
    }
}
