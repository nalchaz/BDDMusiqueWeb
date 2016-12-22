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
            case "register" : 
                $this->actionRegister(); 
                break; 
            case "validateRegister": 
                $this->actionValidateRegister(); 
                break; 
            
            default :
                require(\ProjetLecteur\Config\Config::getVues()["default"]);
                break;
        }
    }

    private function actionRegister(){ 
        require(\ProjetLecteur\Config\Config::getVues()["pageRegister"]);
    }
    
    private function actionValidateRegister() {
        \ProjetLecteur\Auth\ValidationRequest::validationLogin($dataError, $email, $password);
        if (empty($dataError)) { //Si email et mot de passe valide
            $modele = \ProjetLecteur\Auth\ModelUser::createUser($_POST);
            if ($modele->getError() === false) { //Si requete n'a pas échoué
                $modele = \ProjetLecteur\Auth\Authentification::checkAndInitiateSession($email, $password, $dataError);
                if ($modele->getError() === false) { //Si authentification n'a pas échoué
                    require (\ProjetLecteur\Config\Config::getVues()["visitorAuth"]);
                } else {
                    require (\ProjetLecteur\Config\Config::getVuesErreur()['default']);
                }
            } else {
                require (\ProjetLecteur\Config\Config::getVuesErreur()['default']);
            }
        } else {
            foreach ($dataError as $error) {
                echo $error . "<br/>";
            }
            require (\ProjetLecteur\Config\Config::getVues()["pageRegister"]);
        }
    }

    private function actionAuth (){ 
        require(\ProjetLecteur\Config\Config::getVues()["pageAuth"]);
    }
    
    private function actionValidateAuth() {
        $dataError=array(); 
        $email=$_POST['email']; 
        $password=$_POST['password']; 
        $modele = \ProjetLecteur\Auth\Authentification::checkAndInitiateSession($email, $password, $dataError);
        if ($modele->getError() === false) {
           if($modele->getRole()==="admin") {
            require (\ProjetLecteur\Config\Config::getVues()["admin"]);
           }
           else if ($modele->getRole()==="visitor"){ 
               require (\ProjetLecteur\Config\Config::getVues()["visitorAuth"]);
           }
        } else {
            foreach ($modele->getError() as $error){ 
                echo $error ."<br/>"; 
            }
            require (\ProjetLecteur\Config\Config::getVues()["pageAuth"]);
            
        }
    }
    
    

}
