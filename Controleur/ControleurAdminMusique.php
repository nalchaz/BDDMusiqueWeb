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
class ControleurAdminMusique {

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
            case "infos" :
                $this->actionInfos();
                break;
            case "jaime" :
                $this->actionJaime();
                break;
            case "jaimepas" : 
                $this->actionJaimePas(); 
                break; 
            case "indiffere": 
                $this->actionIndiffere(); 
                break; 
            case "ajoutComment" : 
                $this->actionAjoutComment(); 
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
    
    
    
    public function actionDelete (){ 
        $idMusique= filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING); 
        $modele= \ProjetLecteur\Modele\ModelMusique::getModelMusiqueDelete($idMusique); 
        if ($modele->getError()===false){ 
            require(\ProjetLecteur\Config\Config::getVues()['afficheMusique']); 
        }
        else { 
            require (\ProjetLecteur\Config\Config::getVuesErreur()['default']);
        }
    }
    
    public function actionEdit (){ 
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
    
    
   public function actionInfos(){ 
        $idMusique=filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING);

        $modele= \ProjetLecteur\Modele\ModelMusique::getModelMusique($idMusique); 
        
        if ($modele->getError() ===false ){ 
            require \ProjetLecteur\Config\Config::getVues()['infosAdmin'];  
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }
    
    public function actionJaime() { 
        $idMusique=filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING);
        
        $modele=\ProjetLecteur\Modele\ModelMusique::getModelMusiqueAjoutAvisFavorable($idMusique);
        if ($modele->getError() ===false ){ 
            require \ProjetLecteur\Config\Config::getVues()['infosAdmin'];  
        }
        else if (isset($modele->getError()['verif'])){ 
            $verif=false;
            require \ProjetLecteur\Config\Config::getVues()['infosAdmin']; 
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }
    
    public function actionJaimepas() { 
        $idMusique=filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING); 
        $modele=\ProjetLecteur\Modele\ModelMusique::getModelMusiqueAjoutAvisDefavorable($idMusique);
        if ($modele->getError() ===false ){ 
            require \ProjetLecteur\Config\Config::getVues()['infosAdmin'];  
        }
        else if (isset($modele->getError()['verif'])){ 
            $verif=false;
            require \ProjetLecteur\Config\Config::getVues()['infosAdmin']; 
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }
    
    public function actionIndiffere() { 
        $idMusique=filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING); 
        $modele=\ProjetLecteur\Modele\ModelMusique::getModelMusiqueAjoutAvisIndifferent($idMusique);
        
        if ($modele->getError() ===false ){ 
            require \ProjetLecteur\Config\Config::getVues()['infosAdmin'];  
        }
        else if (isset($modele->getError()['verif'])){
            $verif=false;
            require \ProjetLecteur\Config\Config::getVues()['infosAdmin'];
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }
    
    public function actionAjoutComment(){ 
             
        $modele=\ProjetLecteur\Modele\ModelMusique::getModelMusiqueAjoutCommentaire($_POST); 
        if ($modele->getError() ===false ){ 
            require \ProjetLecteur\Config\Config::getVues()['infosAdmin'];  
        }
        else if (isset($modele->getError()['texte'])){ 
            $verifTexte=false; 
            require \ProjetLecteur\Config\Config::getVues()['infosAdmin'];  
        }
        else { 

            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }
    
    
    
}
