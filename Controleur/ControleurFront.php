<?php


namespace ProjetLecteur\Controleur;


class ControleurFront {

    function __construct() {

        try {

            $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";
            $modele = \ProjetLecteur\Auth\Authentification::restoreSession();
            $role = ($modele->getError() === false) ? $modele->getRole() : "";
            switch ($action) {
                case "auth" :
                case "validateAuth" :
                case "register":
                case "validateRegister": 
                    $publicCtrl = new ControleurVisitor($action);
                    break;
                case "saisie" :
                case "edit" :
                case "update" :
                case "create" :
                case "delete" :
                
                    if ($role === "admin") {
                        $adminCtrl = new ControleurAdmin($action);
                    }
                    else { 
                        require (\ProjetLecteur\Config\Config::getVues()["pageAuth"]); 
                    }
                    break; 
                case "deconnexion" :
                case "infos" : 
                case "jaime":
                case "jaimepas" :
                    if ($role === "admin"){ 
                       $adminCtrl= new ControleurAdmin($action); 
                   
                    }
                    else if ($role ==="visitor") { 
                        $privateCtrl= new ControleurVisitorAuth($action); 
                    }
                    else {
                        require (\ProjetLecteur\Config\Config::getVues()["pageAuth"]); 
                    }
                    break; 
                default :
                    if ($role === "admin"){ 
                       $adminCtrl= new ControleurAdmin($action); 
                   
                    }
                    else if ($role ==="visitor") { 
                        $privateCtrl= new ControleurVisitorAuth($action); 
                    }
                    else {
                        $publicCtrl=new ControleurVisitor($action); 
                    }
                    
            }
        }
     catch (\Exception $e) {
            $modele = new \CoursPHP\Modele\Model(
                    array('exception' => $e->getMessage()));
            require (\ProjetLecteur\Config\Config::getVuesErreur()["default"]);
        }
    }

}
?>