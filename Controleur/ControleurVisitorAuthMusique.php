<?php

namespace ProjetLecteur\Controleur;

/**
 * Description of ControleurVisitorAuth
 *
 * @author alexd
 */
class ControleurVisitorAuthMusique {

    function __construct($action) {
        switch ($action) {
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
            default : 
                require(\ProjetLecteur\Config\Config::getVues()["visitorAuth"]);
                break; 
        }
    }
    
    
    
    public function actionInfos($verif=null){ 
        $idMusique=filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING); 
        $modele= \ProjetLecteur\Modele\ModelMusique::getModelMusique($idMusique);      
        if ($modele->getError() ===false){
            require \ProjetLecteur\Config\Config::getVues()['infos']; 
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }
    
    public function actionJaime() { 
        $idMusique=filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING); 
        $modele=\ProjetLecteur\Modele\ModelMusique::addAvisFavorable($idMusique);
        if ($modele->getError()===false ){ 
            $verif=true; 
            require \ProjetLecteur\Config\Config::getVues()['infos']; 
        }
        else if (isset($modele->getError()['verif'])){ 
            $verif=false;
            require \ProjetLecteur\Config\Config::getVues()['infos']; 
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }
    
    public function actionJaimepas() { 
        $idMusique=filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING); 
        $modele=\ProjetLecteur\Modele\ModelMusique::addAvisDefavorable($idMusique);
        if ($modele->getError()===false ){ 
            $verif=true; 
            require \ProjetLecteur\Config\Config::getVues()['infos']; 
        }
        else if (isset($modele->getError()['verif'])){ 
            $verif=false;
            require \ProjetLecteur\Config\Config::getVues()['infos']; 
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }
    
    public function actionIndiffere() { 
        $idMusique=filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING); 
        $modele=\ProjetLecteur\Modele\ModelMusique::addAvisIndifferent($idMusique);
        
        if ($modele->getError()===false ){ 
            $verif=true; 
            require \ProjetLecteur\Config\Config::getVues()['infos']; 
        }
        else if (isset($modele->getError()['verif'])){
            $verif=false;
            require \ProjetLecteur\Config\Config::getVues()['infos'];
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }
    


}
