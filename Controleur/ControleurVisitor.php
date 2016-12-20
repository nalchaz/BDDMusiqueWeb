<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ProjetLecteur\Controleur;

/**
 * Description of ControleurAuth
 *
 * @author alexd
 */
class ControleurVisitor {
    function __construct($action) {
        switch($action){ 
            case "auth" : 
                $this->actionAuth(); 
                break; 
            case "validateAuth" : 
                $this->actionValidateAuth(); 
                break;
            case "deconnexion": 
                $this->actionDeconnexion(); 
                break; 
            default :
                    require(\ProjetLecteur\Config\Config::getVues()["default"]);
                    break;
        }
    }
    
    private function actionAuth (){ 
        require(\ProjetLecteur\Config\Config::getVues()["pageAuth"]);
    }
    
    private function actionValidateAuth() {
        \ProjetLecteur\Auth\ValidationRequest::validationLogin($dataError, $email, $password);
        $modele = \ProjetLecteur\Auth\Authentification::checkAndInitiateSession($email, $password, $dataError);
        if ($modele->getError() === false) {
           if($modele->getRole()==="admin") {
            require (\ProjetLecteur\Config\Config::getVues()["admin"]);
           }
           else { 
               require (\ProjetLecteur\Config\Config::getVues()["default"]);
           }
        } else {
            require (\ProjetLecteur\Config\Config::getVues()["pageAuth"]);
            
        }
    }

}
