<?php
namespace ProjetLecteur\Controleur;

/**
 * Description of ControleurVisitorAuth
 *
 * @author alexd
 */
class ControleurVisitorAuthCommentaire {

    function __construct($action) {
        switch ($action) {

            case "ajoutComment": 
                $this->actionAjoutComment(); 
                break; 
            default : 
                require(\ProjetLecteur\Config\Config::getVues()["visitorAuth"]);
                break; 
        }
    }
    
    
    
    public function actionAjoutComment(){ 
        $modele= \ProjetLecteur\Modele\ModelMusique::getModelMusique($_POST['idMusique']); 
        $modeleCom= \ProjetLecteur\Modele\ModelCommentaire::getModelCommentaireCreate($_POST); 
        if ($modele->getError() ===false){ 
            $verif=true; 
            require \ProjetLecteur\Config\Config::getVues()['infos'];  
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }

}

