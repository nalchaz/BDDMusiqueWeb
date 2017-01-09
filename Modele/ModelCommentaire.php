<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ProjetLecteur\Modele;

/**
 * Description of ModelCommentaire
 *
 * @author alexd
 */
class ModelCommentaire extends Model{
    private $commentaire; 
    private $title; 
    
    public function getData () { 
        return $this->commentaire; 
    }
    
    public function getTitle () { 
        return $this->title; 
    }
    
    
    
    public static function getModelCommentaireDelete($idCommentaire){ 
        $model=new self (array()); 
        $model->commentaire=\ProjetLecteur\Persistance\CommentaireGateway::deleteCommentaire($model->dataError,$idCommentaire);
        $model->title="Le commentaire a été supprimé"; 
        return $model;
    }
}
