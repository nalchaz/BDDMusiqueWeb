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
        \ProjetLecteur\Modele\ModelCommentaire::createCommentaire($_POST); 
        $modele= \ProjetLecteur\Modele\ModelMusique::getModelMusique($_POST['idMusique']); 
        $modeleCommentaires=\ProjetLecteur\Modele\ModelCollectionCommentaire::getModelCommentaireMusique($_POST['idMusique']); 
        if ($modele->getError() ===false && $modeleCommentaires->getError()===false){ 
            require \ProjetLecteur\Config\Config::getVues()['infos'];  
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }

}

