<?php
/**
 * Created by PhpStorm.
 * User: alexd
 * Date: 06/12/2016
 * Time: 14:42
 */

namespace ProjetLecteur\Config;


class Config
{
    public static function getAuthData (&$db_host, &$db_name,&$db_user,&$db_password){
        $db_host="mysql:host=localhost;";
        $db_name="dbname=projetlecteur";
        $db_user="alex";
        $db_password="alex";
    }

    public static function getVues(){
        global $rootDirectory;
        $vueDirectory=$rootDirectory."Vue/vues/";
        return array(
            "default"=>$vueDirectory."vueAccueil.php", 
            "pageAuth"=>$vueDirectory."vueFormulaire.php", 
            "pageRegister"=>$vueDirectory."vueFormRegister.php", 
            "visitorAuth"=>$vueDirectory."vueVisitorAuth.php", 
            "admin"=>$vueDirectory."vueAdmin.php",
            "saisieMusiqueCreate"=>$vueDirectory."vueSaisieMusiqueCreate.php",
            "afficheMusique"=>$vueDirectory."vueAfficheMusique.php", 
            "saisieMusiqueUpdate"=>$vueDirectory."vueSaisieMusiqueUpdate.php",
            "infos"=>$vueDirectory."vueInfos.php",
            "afficheCommentaire"=>$vueDirectory."vueAfficheCommentaire.php", 
            );
    }
    
    public static function getVuesErreur()
    {
        global $rootDirectory;
        $vueDirectory=$rootDirectory."Vue/vues/";
        return array ( 
            "default"=>$vueDirectory."vueErreurDefault.php",
            "saisieMusiqueCreate"=>$vueDirectory."vueErreurSaisieCreate.php", 
            "saisieMusiqueUpdate"=>$vueDirectory."vueErreurSaisieUpdate.php", 
            
        ); 
    }
    
    public static function getRootURI() { 
        global $rootURI; 
        return $rootURI;  
    }
    
    public static function getStyleSheetsURL() { 
        $cssDirectoryURL =filter_var("http://".$_SERVER['SERVER_NAME'].self::getRootURI()."/css/", FILTER_SANITIZE_URL); 
        return array ( 
            "default"=>$cssDirectoryURL."style.css",
            "formLogin"=>$cssDirectoryURL."styleForm.css",
            "saisie"=>$cssDirectoryURL."saisie.css",
            "infos"=>$cssDirectoryURL."infos.css",
        );
    }
}