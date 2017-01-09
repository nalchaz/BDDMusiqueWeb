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
            case "ajoutComment" : 
                $this->actionAjoutComment(); 
                break ;
        }
    }
    
    
    
    public function actionInfos($verif=null){ 
        $idMusique=filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING); 
        $modele= \ProjetLecteur\Modele\ModelMusique::getModelMusique($idMusique);      
        $modeleCommentaires=\ProjetLecteur\Modele\ModelCollectionCommentaire::getModelCommentaireMusique($idMusique); 
        if ($modele->getError() ===false && $modeleCommentaires->getError()===false){ 
            require \ProjetLecteur\Config\Config::getVues()['infos'];  
        }
        else { 
            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }
    
    public function actionJaime() { 
        $idMusique=filter_var($_REQUEST['idMusique'], FILTER_SANITIZE_STRING); 
        $modele=\ProjetLecteur\Modele\ModelMusique::getModelMusiqueAjoutAvisFavorable($idMusique);
        $modeleCommentaires=\ProjetLecteur\Modele\ModelCollectionCommentaire::getModelCommentaireMusique($idMusique); 
        if ($modele->getError() ===false && $modeleCommentaires->getError()===false){ 
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
        $modele=\ProjetLecteur\Modele\ModelMusique::getModelMusiqueAjoutAvisDefavorable($idMusique);
        $modeleCommentaires=\ProjetLecteur\Modele\ModelCollectionCommentaire::getModelCommentaireMusique($idMusique); 
        if ($modele->getError() ===false && $modeleCommentaires->getError()===false){ 
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
        $modele=\ProjetLecteur\Modele\ModelMusique::getModelMusiqueAjoutAvisIndifferent($idMusique);
        
        $modeleCommentaires=\ProjetLecteur\Modele\ModelCollectionCommentaire::getModelCommentaireMusique($idMusique); 
        if ($modele->getError() ===false && $modeleCommentaires->getError()===false){ 
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
    
    public function actionAjoutComment(){ 
             
        $modele=\ProjetLecteur\Modele\ModelMusique::getModelMusiqueAjoutCommentaire($_POST); 
        $modeleCommentaires= \ProjetLecteur\Modele\ModelCollectionCommentaire::getModelCommentaireMusique($_POST['idMusique']); 
        if ($modele->getError() ===false && $modeleCommentaires->getError()===false){ 
            require \ProjetLecteur\Config\Config::getVues()['infos'];  
        }
        else if (isset($modele->getError()['texte'])){ 
            $verifTexte=false; 
            require \ProjetLecteur\Config\Config::getVues()['infos'];  
        }
        else { 

            require \ProjetLecteur\Config\Config::getVuesErreur()['default']; 
        }
    }


}
