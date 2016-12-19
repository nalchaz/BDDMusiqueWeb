<?php
/**
 * Created by PhpStorm.
 * User: alexd
 * Date: 06/12/2016
 * Time: 14:36
 */

namespace ProjetLecteur\Controleur;


class ControleurFront
{
    function __construct()
    {

        try {

            $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";
            $modele= \ProjetLecteur\Auth\Authentification::restoreSession(); 
            $role=($modele->getError() === false) ? $modele->getRole() : ""; 
            switch ($action) {
               case "auth" : 
               case "validateAuth" : 
                   $publicCtrl= new ControleurVisitor($action); 
                   break; 
               case "saisie" : 
               case "edit" : 
               case "update" : 
               case "create" : 
               case "delete" : 
                if ($role === "admin"){ 
                       $adminCtrl= new ControleurAdmin($action); 
                   
                }
                else { 
                       require (\ProjetLecteur\Config\Config::getVues()["pageAuth"]); 
                }
                 break; 
               case "getAll": 
                default :
                    if ($role === "admin"){ 
                       $adminCtrl= new ControleurAdmin($action); 
                   
                    }
                    else { 
                        $publicCtrl= new ControleurVisitor($action); 
                    }
            }
        }
     catch (\Exception $e) {
          
        }
    }
    
    
    function actionConnexion () { 
        
    }
}
?>