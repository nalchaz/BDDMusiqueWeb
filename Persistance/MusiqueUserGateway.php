<?php

/*
 * Gateway pour la table musiqueuser qui répertorie les login des user et les idmusique sur lesquels ils ont donné leurs avis
 * Pour qu'un user donne un seul avis par musique
 */

namespace ProjetLecteur\Persistance;


class MusiqueUserGateway {
    public static function verifAvisUnique ($login,$idMusique,&$dataError){
        $args=array($login,$idMusique); 
        $verif= DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT count(*) from musiqueuser WHERE login=? AND idMusique=?',$args);
        if ($verif ===false){ 
            $dataError['persistance']="Problème d'exécution de la requête"; 
        }
        foreach ($verif as $row){ 
            foreach ($row as $res){ 
                $verdict=$res; 
            }
        }
        if ($verdict==1){ 
            $dataError['verif']="L'avis a déjà été donné"; 
        }
        else {
            $ajout= DataBaseManager::getInstance()->prepareAndExecuteQuery('INSERT INTO musiqueuser(login,idMusique) VALUES(?,?)',$args);
            if ($ajout===false){ 
                $dataError['persistance']="Problème d'exécution de la requête ajout "; 
                
            }
        }
        
    }
}
