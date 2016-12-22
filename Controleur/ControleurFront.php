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
                case "deleteCom":
                    if ($role === "admin") {
                        $adminCtrl = new ControleurAdmin($action);
                    }
                    else { 
                        require (\ProjetLecteur\Config\Config::getVues()["pageAuth"]); 
                    }
                    break; 
                case "infos" :
                    if ($role ==="visitor"){ 
                        $privateCtrl=new ControleurVisitorAuth($action);
                    }
                    else if ($role ==="admin"){
                        $adminCtrl=new ControleurAdmin($action);
                    }
                    else { 
                        require (\ProjetLecteur\Config\Config::getVues()["pageAuth"]); 
                    }
                    break;
                case "deconnexion" : 
                case "jaime":
                case "jaimepas" :
                case "indiffere": 
                case "ajoutComment" : 
                    
                    if ($role ==="visitor" || $role==="admin") { 
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
            $modele = new \ProjetLecteur\Modele\Model(
                    array('exception' => $e->getMessage()));
            require (\ProjetLecteur\Config\Config::getVuesErreur()["default"]);
        }
    }

}
?>