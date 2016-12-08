<?php
/**
 * Created by PhpStorm.
 * User: alexd
 * Date: 06/12/2016
 * Time: 14:36
 */

namespace ProjetLecteur\Controleur;


class Controleur
{
    function __construct()
    {

        try {

            $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";
            switch ($action) {
               
                default :
                    require(\ProjetLecteur\Config\Config::getVues()["default"]);
                    break;
            }
        }
     catch (\Exception $e) {
          
        }
    }
    
    
    function actionConnexion () { 
        
    }
}
?>