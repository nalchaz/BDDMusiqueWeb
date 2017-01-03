<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ProjetLecteur\Modele;

/**
 * Description of ModelCollectionCommentaire
 *
 * @author alexd
 */
class ModelCollectionCommentaire extends Model {
    private $collectionCommentaire ; 
    
    public function getData(){ 
        return $this->collectionCommentaire; 
    }
    
    public function __construct() {
        $this->collectionCommentaire=array(); 
        $this->dataError=array(); 
    }
    
    public static function getModelCommentaireMusique ($idMusique){ 
        $model = new self(array()); 
        $model->collectionCommentaire = \ProjetLecteur\Persistance\CommentaireGateway::getCommentaireMusique($model->dataError,$idMusique); 
        return $model->collectionCommentaire; 
    }
}
