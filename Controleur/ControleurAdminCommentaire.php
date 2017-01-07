<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ProjetLecteur\Controleur;

/**
 * Description of ControleurAdmin
 *
 * @author alexd
 */


class ControleurAdminCommentaire {

    function __construct($action) {
        switch ($action) {
            case "deleteCom" : 
                $this->actionDeleteCom(); 
                break; 
            case "ajoutComment": 
                $this->actionAjoutComment(); 
                break; 
            default :
                require(\ProjetLecteur\Config\Config::getVues()["admin"]);
                break;
        }
    }
    
    
    
    public function actionDeleteCom (){ 
        $idCommentaire= filter_var($_REQUEST['idCommentaire'], FILTER_SANITIZE_STRING); 
        $modele=\ProjetLecteur\Modele\ModelCommentaire::getModelCommentaireDelete($idCommentaire);       
        if ($modele->getError()===false){ 
              require (\ProjetLecteur\Config\Config::getVues()['afficheCommentaire']); 
        }
        else { 
            require (\ProjetLecteur\Config\Config::getVuesErreur()['default']);
        }
    }
    
  
    
    public function actionAjoutComment(){ 
        
        \ProjetLecteur\Modele\ModelCommentaire::CreateCommentaire($_POST); 
        $modele= \ProjetLecteur\Modele\ModelMusique::getModelMusique($_POST['idMusique']); 
        $modeleCommentaires= \ProjetLecteur\Modele\ModelCollectionCommentaire::getModelCommentaireMusique($_POST['idMusique']); 
        if ($modele->getError() ===false && $modeleCommentaires->getError()===false){ 
            require \ProjetLecteur\Config\Config::getVues()['infosAdmin'];  
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }
    
    
}    