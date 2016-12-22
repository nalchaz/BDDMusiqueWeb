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
class ControleurAdmin {

    function __construct($action) {
        switch ($action) {
            case "saisie" : 
                $this->actionSaisie(); 
                break; 
            case "create" :
                $this->actionCreate();
                break;
            case "delete" :
                $this->actionDelete();
                break;
            case "edit" : 
                $this->actionEdit() ; 
                break;
            case "update" : 
               $this->actionUpdate(); 
                break; 
            case "infos":
                $this->actionInfos(); 
                break;
            case "deleteCom" : 
                $this->actionDeleteCom(); 
                break; 
            default :
                require(\ProjetLecteur\Config\Config::getVues()["admin"]);
                break;
        }
    }
    
    public function actionSaisie ()
    { 
        $modele= \ProjetLecteur\Modele\ModelMusique::getModelDefaultMusique(); 
        require (\ProjetLecteur\Config\Config::getVues()['saisieMusiqueCreate']); 
    }
    
    public function actionCreate (){ 
        $modele= \ProjetLecteur\Modele\ModelMusique::getModelMusiqueCreate($_POST);
        if($modele->getError() === false){ 
            require \ProjetLecteur\Config\Config::getVues()['afficheMusique'];
        }
        else { 
            if (!empty($modele->getError()['persistance'])){ 
                echo $modele->getError()['persistance']; 
            }
            else { 
                
                require \ProjetLecteur\Config\Config::getVuesErreur()['saisieMusiqueCreate']; 
                
                }
            }
        
    }
    
    public function actionInfos(){ 
        $rawId=isset($_REQUEST['idMusique']) ? $_REQUEST['idMusique'] : ""; 
        $idMusique=filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING); 
        $modele= \ProjetLecteur\Modele\ModelMusique::getModelMusique($idMusique);      
        if ($modele->getError() ===false){
            require \ProjetLecteur\Config\Config::getVues()['infosAdmin']; 
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }
    
    public function actionDelete (){ 
        $idMusique= filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING); 
        $modele= \ProjetLecteur\Modele\ModelMusique::deleteMusique($idMusique); 
        if ($modele->getError()===false){ 
            require(\ProjetLecteur\Config\Config::getVues()['afficheMusique']); 
        }
        else { 
            require (\ProjetLecteur\Config\Config::getVuesErreur()['default']);
        }
    }
    
    public function actionEdit (){ 
        $rawId=isset($_REQUEST['idMusique']) ? $_REQUEST['idMusique'] : ""; 
        $idMusique=filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING); 
        $modele= \ProjetLecteur\Modele\ModelMusique::getModelMusique($idMusique); 
        if ($modele->getError()===false){ 
            require (\ProjetLecteur\Config\Config::getVues()['saisieMusiqueUpdate']); 
        }
        else { 
            require (\ProjetLecteur\Config\Config::getVuesErreur()['default']); 
        }
    }
    
    public function actionUpdate(){ 
        $modele= \ProjetLecteur\Modele\ModelMusique::getModelMusiqueUpdate($_POST); 
        if ($modele->getError()===false){ 
            require (\ProjetLecteur\Config\Config::getVues()['afficheMusique']);
        }
        else { 
            if (!empty($modele->getError()['persistance'])){ 
                require (\ProjetLecteur\Config\Config::getVuesErreur()['default']); 
            }
            else { 
                require (\ProjetLecteur\Config\Config::getVuesErreur()['saisieMusiqueUpdate']);
            }
        }
    }
    
    public function actionDeleteCom (){ 
        $idCommentaire= filter_var($_REQUEST['idCommentaire'], FILTER_SANITIZE_STRING); 
        $modele=\ProjetLecteur\Modele\ModelCommentaire::deleteCommentaire($idCommentaire);       
        if ($modele->getError()===false){ 
              require (\ProjetLecteur\Config\Config::getVues()['afficheCommentaire']); 
        }
        else { 
            require (\ProjetLecteur\Config\Config::getVuesErreur()['default']);
        }
    }
    
   
    
    
}    