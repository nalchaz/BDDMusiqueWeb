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
        $db_name="dbname=BD";
        $db_user="alex";
        $db_password="alex";
    }

    public static function getVues(){
        global $rootDirectory;
        $vueDirectory=$rootDirectory."Vue/vues/";
        return array(
            "default"=>$vueDirectory."vueAccueil.php"
        );
    }
}

?>