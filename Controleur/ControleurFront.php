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
                case "deconnexion" :
                    $publicCtrl = new ControleurAuth($action);
                    break;
                case "saisie" :
                case "edit" :
                case "update" :
                case "create" :
                case "delete" :
                    if ($role === "admin") {
                        $adminCtrl = new ControleurAdminMusique($action);
                    }
                    else { 
                        require (\ProjetLecteur\Config\Config::getVues()["pageAuth"]); 
                    }
                    break; 
                case "deleteCom" : 
                    if ($role === "admin") {
                        $adminCtrl = new ControleurAdminCommentaire($action);
                    }
                    else { 
                        require (\ProjetLecteur\Config\Config::getVues()["pageAuth"]); 
                    }
                    break;
                case "infos" :
                case "jaime":
                case "jaimepas" :
                case "indiffere":                    
                    if ($role ==="visitor" ) { 
                        $privateCtrl= new ControleurVisitorAuthMusique($action); 
                    }
                    else if ($role==="admin"){
                        $adminCtrl=new ControleurAdminMusique($action); 
                    }
                    else {
                        require (\ProjetLecteur\Config\Config::getVues()["pageAuth"]); 
                    }
                    break;
                case "ajoutComment" : 
                    if ($role ==="visitor" ) { 
                        $privateCtrl= new ControleurVisitorAuthCommentaire($action); 
                    }
                    else if ($role==="admin"){
                        $adminCtrl=new ControleurAdminCommentaire($action); 
                    }
                    else {
                        require (\ProjetLecteur\Config\Config::getVues()["pageAuth"]); 
                    }
                    break;
                default :
                    if ($role ==="admin"){ 
                        require(\ProjetLecteur\Config\Config::getVues()["admin"]);
                    }
                    else if ($role==="visitor"){ 
                        require(\ProjetLecteur\Config\Config::getVues()["visitorAuth"]);
                    }
                    else { 
                        require(\ProjetLecteur\Config\Config::getVues()["default"]);
                    }
                    break;
                    
                    
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