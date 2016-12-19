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
            require \ProjetLecteur\Config\Config::getVues()['default'];
        }
        else { 
            if (!empty($modele->getError()['persistance'])){ 
                echo $modele->getError()['persistance']; 
            }
            else { 
                foreach ($modele->getError() as $txt){ 
                    echo $txt; 
                }
                require \ProjetLecteur\Config\Config::getVuesErreur()['saisieAdresseCreate']; 
                
                }
            }
        
    }
}    