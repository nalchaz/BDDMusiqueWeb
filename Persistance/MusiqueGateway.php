<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ProjetLecteur\Persistance;

/**
 * Description of MusiqueGateway
 * Permet d'accéder et de mettre à jour les valeurs dans la table musique
 * @author alexd
 */
class MusiqueGateway {
    
    public static function getMusiqueAll(&$dataError){
        $queryResult= DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT * from musiques'); 
        $collectionMusique=array(); 
        if ($queryResult !==false){ 
            foreach ($queryResult as $row){ 
                $musique = \ProjetLecteur\Metier\MusiqueFabrique::getValidInstance($dataErrorsAttributes, $row); 
                $collectionMusique[]=$musique; 
                $dataError= array_merge($dataError,$dataErrorsAttributes); 
            }
        }
        else { 
            $dataError['persistance']="Problème d'accès aux données"; 
        }
        return $collectionMusique; 
    }
    
    public static function createMusique (&$dataError,&$inputArray){ 
        $musique= \ProjetLecteur\Metier\MusiqueFabrique::getValidInstance($dataErrorAttributes, $inputArray);
        if (empty($dataErrorAttributes)){ 
            $queryResult= DataBaseManager::getInstance()->prepareAndExecuteQueryAssoc('REPLACE INTO '.'musiques(titre, nomAuteur, couverture_album, nom_album,' 
                    .'annee_parution, duree, nbavis_favorables, nbavis_indifferents, nbavis_defavorables, id_musique, periode_mel,chemin_audio)'  
                    .'VALUES (:titre,:nomAuteur, :couverture_album, :nom_album,' 
                    .':annee_parution, :duree, :nbavis_favorables, :nbavis_indifferents, :nbavis_defavorables, :id_musique, :periode_mel,:chemin_audio)', 
                    $inputArray); 
            if ($queryResult ===false){ 
                $dataError['persistance']= "Problème d'exécution de la requête"; 
            }
        }
        else { 
            $dataError=array_merge($dataError,$dataErrorAttributes); 
        }
        return $musique; 
        
    }
}