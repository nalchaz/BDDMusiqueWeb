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
    
    public static function getMusiqueById (&$dataError, $idMusique){ 
        if (isset($idMusique)){ 
            $args=array($idMusique); 
            $commentaires=array(); 
            // Exécution de la requête
            $queryResult= DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT * FROM musiques  NATURAL LEFT JOIN commentaires  WHERE musiques.idMusique= ? ORDER BY dateInsertion,heureInsertion DESC',$args);
            // Si requête a fonctionné


            if (isset($queryResult) && is_array($queryResult)){ 
                // Si un seul résultat
                if (count($queryResult)>=1){ 
                    $row=$queryResult[0]; 
                    if (!is_null($row['idCommentaire'])){
                        foreach ($queryResult as $ligne){ 
                            $commentaires[]= \ProjetLecteur\Metier\CommentaireFabrique::getValidInstance($dataErrorsAttributes, $ligne);
                        }
                    }

                    $musique= \ProjetLecteur\Metier\MusiqueFabrique::getValidInstance($dataErrorAttributes, $row,$commentaires); 
                    $dataError=array_merge($dataError,$dataErrorAttributes); //fusion 
                }
                else {
                    $dataError['persistance']="Musique d'id : ".$idMusique ." introuvable"; 
                }
            }
            else { 
                $dataError['persistance']= "Impossible d'accéder aux données"; 
            }
        }
        else { 
            $dataError['persistance']="Musique d'id : ".$idMusique ." introuvable"; 
        }
        return $musique; 
    }
    
    public static function getMusiqueAll(&$dataError){
        $queryResult= DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT * from musiques ORDER BY nbavisFavorables DESC'); 
        $collectionMusique=array(); 
        if ($queryResult !==false){ 
            foreach ($queryResult as $row){ 
                $musique = \ProjetLecteur\Metier\MusiqueFabrique::getValidInstance($dataErrorsAttributes, $row,null); 
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
        $musique= \ProjetLecteur\Metier\MusiqueFabrique::getValidInstance($dataErrorAttributes, $inputArray,null);
        if (empty($dataErrorAttributes)){ 
            $queryResult= DataBaseManager::getInstance()->prepareAndExecuteQueryAssoc('REPLACE INTO '.'musiques(titre, nomAuteur, couvertureAlbum, nomAlbum,' 
                    .'anneeParution, duree, nbavisFavorables, nbavisIndifferents, nbavisDefavorables, idMusique, periodeMel,cheminAudio)'  
                    .'VALUES (:titre,:nomAuteur, :couvertureAlbum, :nomAlbum,' 
                    .':anneeParution, :duree, :nbavisFavorables, :nbavisIndifferents, :nbavisDefavorables, :idMusique, sysdate(),:cheminAudio)', 
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
    
    public static function updateMusique(&$dataError, $inputArray){ 
        $musique= \ProjetLecteur\Metier\MusiqueFabrique::getValidInstance($dataErrorsAttributes, $inputArray,null); 
        if (empty($dataErrorsAttributes)){ 
            $queryResults= DataBaseManager::getInstance()->prepareAndExecuteQueryAssoc('UPDATE musiques SET'
                    .' titre=:titre, nomAuteur=:nomAuteur, couvertureAlbum=:couvertureAlbum, nomAlbum=:nomAlbum,' 
                    .'anneeParution=:anneeParution, duree=:duree, nbavisFavorables=:nbavisFavorables,'
                    . 'nbavisIndifferents=:nbavisIndifferents, nbavisDefavorables=:nbavisDefavorables, periodeMel=:periodeMel,cheminAudio=:cheminAudio'
                    . ' WHERE idMusique=:idMusique',$inputArray); 
            if ($queryResults ===false){ 
                $dataError['persistance']= "Problème d'accès aux données"; 
            }
        }
        else { 
            $dataError= array_merge($dataError,$dataErrorsAttributes); 
            }
        return $musique; 
    }
   
    public static function addAvisFavorable (&$dataError,$idMusique,$verif){ 
        $dataErrorIdSearch=array(); 

        
        if (empty($dataErrorIdSearch) && $verif===true){ 
            $args=array($idMusique);
            
            $queryResult = DataBaseManager::getInstance()->prepareAndExecuteQuery('UPDATE musiques set nbavisFavorables=nbavisFavorables+1 WHERE idMusique=?',$args); 
            if ($queryResult ===false){ 
                $dataError['persistance']= "Problème d'exécution de la requête"; 
            }
            else { 
                $dataError= array_merge($dataError,$dataErrorIdSearch); 
            }
            
        }
        $musique= self::getMusiqueById($dataErrorIdSearch, $idMusique); 
        return $musique; 
    }
    
    public static function addAvisIndifferent (&$dataError,$idMusique,$verif){ 
        $dataErrorIdSearch=array(); 
        if (empty($dataErrorIdSearch) && $verif===true){
            $args=array($idMusique); 
            $queryResult = DataBaseManager::getInstance()->prepareAndExecuteQuery('UPDATE musiques set nbavisIndifferents=nbavisIndifferents+1 WHERE idMusique=?',$args); 
            if ($queryResult ===false){ 
                $dataError['persistance']= "Problème d'exécution de la requête"; 
            }
            else { 
                $dataError= array_merge($dataError,$dataErrorIdSearch); 
            }
            
        }
        $musique= self::getMusiqueById($dataErrorIdSearch, $idMusique); 
        return $musique; 
    }
    
    public static function addAvisDefavorable (&$dataError,$idMusique,$verif){ 
        $dataErrorIdSearch=array(); 
        
        if (empty($dataErrorIdSearch) && $verif===true){ 
            $args=array($idMusique); 
            $queryResult = DataBaseManager::getInstance()->prepareAndExecuteQuery('UPDATE musiques set nbavisDefavorables=nbavisDefavorables+1 WHERE idMusique=?',$args); 
            if ($queryResult ===false){ 
                $dataError['persistance']= "Problème d'exécution de la requête"; 
            }
            else { 
                $dataError= array_merge($dataError,$dataErrorIdSearch); 
            }
            
        }
        $musique= self::getMusiqueById($dataErrorIdSearch, $idMusique); 
        return $musique; 
    }
    
    public static function deleteMusique (&$dataError,$idMusique){ 
        $dataErrorIdSearch=array(); 
        $musique=self::getMusiqueById($dataErrorIdSearch, $idMusique); 
        if (empty($dataErrorIdSearch)){ 
            $queryResult = DataBaseManager::getInstance()->prepareAndExecuteQuery('DELETE FROM musiques WHERE idMusique=? ' ,$args=array($idMusique)); 
            if ($queryResult ===false){ 
                $dataError['persistance']= "Problème d'exécution de la requête"; 
            }
            else { 
                $dataError= array_merge($dataError,$dataErrorIdSearch); 
            }
            return $musique; 
        }
    }
}