<?php



namespace ProjetLecteur\Controleur;

/**
 * Description of ControleurVisitorAuth
 *
 * @author alexd
 */
class ControleurVisitorAuth {

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
            case "ajoutComment": 
                $this->actionAjoutComment(); 
                break; 
            case "deconnexion":
                $this->actionDeconnexion();
                break;
            default : 
                require(\ProjetLecteur\Config\Config::getVues()["visitorAuth"]);
                break; 
        }
    }
    
    
    public function actionDeconnexion (){ 
        \ProjetLecteur\Auth\Authentification::deconnexion() ;
        require (\ProjetLecteur\Config\Config::getVues()['default']); 
    }
    
    public function actionInfos(){ 
        $rawId=isset($_REQUEST['idMusique']) ? $_REQUEST['idMusique'] : ""; 
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
        $rawId=isset($_REQUEST['idMusique']) ? $_REQUEST['idMusique'] : ""; 
        $idMusique=filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING); 
        $modele= \ProjetLecteur\Modele\ModelMusique::addAvisFavorable($idMusique); 
        if ($modele->getError()===false){ 
            $this->actionInfos();  
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }
    
    public function actionJaimepas() { 
        $rawId=isset($_REQUEST['idMusique']) ? $_REQUEST['idMusique'] : ""; 
        $idMusique=filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING); 
        $modele= \ProjetLecteur\Modele\ModelMusique::addAvisDefavorable($idMusique); 
        if ($modele->getError()===false){ 
            $this->actionInfos();  
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }
    
    public function actionIndiffere() { 
        $rawId=isset($_REQUEST['idMusique']) ? $_REQUEST['idMusique'] : ""; 
        $idMusique=filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING); 
        $modele= \ProjetLecteur\Modele\ModelMusique::addAvisIndifferent($idMusique); 
        if ($modele->getError()===false){ 
            $this->actionInfos();  
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }
    
    public function actionAjoutComment(){ 
        $modele= \ProjetLecteur\Modele\ModelCommentaire::getModelCommentaireCreate($_POST); 
        if ($modele->getError() ===false){ 
            $this->actionInfos(); 
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }

}
