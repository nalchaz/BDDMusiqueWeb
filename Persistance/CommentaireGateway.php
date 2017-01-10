<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ProjetLecteur\Persistance;

/**
 * Description of CommentaireGateway
 *
 * @author alexd
 */
class CommentaireGateway {

    public static function createCommentaire(&$dataError, &$inputArray) {
        $commentaire = \ProjetLecteur\Metier\CommentaireFabrique::getValidInstance($dataErrorAttributes, $inputArray);
        $idMusique = $commentaire->idMusique;
        $args = array($idMusique);
        $nbCom = DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT count(*) FROM ' . 'commentaires WHERE idMusique=?', $args);

        
        if (empty($dataErrorAttributes)) {
            if ($nbCom[0] >= 3) { //Si déjà 3 commentaires on en supprime 1
                $resultSupp = DataBaseManager::getInstance()->prepareAndExecuteQuery('DELETE FROM ' . 'commentaires WHERE idMusique= ? ORDER BY dateInsertion,heureInsertion LIMIT 1'
                        , $args);
                if ($resultSupp === false) {
                    $dataError['persistance'] = "Echec requête";
                }
            }

            $queryResult = DataBaseManager::getInstance()->prepareAndExecuteQueryAssoc('REPLACE INTO ' . 'commentaires(idCommentaire,texte, idMusique, login,dateInsertion,heureInsertion) '
                    . 'VALUES(:idCommentaire,:texte,:idMusique, :login,sysdate(),curtime())', $inputArray);
            if ($queryResult === false) {
                $dataError['persistance'] = "Problème d'exécution de la requête";
            }
        } else {

            $dataError = array_merge($dataError, $dataErrorAttributes);
        }
        return $commentaire;
    }

    public static function getCommentaireById (&$dataError, $idCommentaire){ 
        if (isset($idCommentaire)){ 
            $args=array($idCommentaire); 
            // Exécution de la requête
            $queryResult= DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT * FROM commentaires WHERE idCommentaire= ?',$args);
            // Si requête a fonctionné
            if (isset($queryResult) && is_array($queryResult)){ 
                // Si un seul résultat
                if (count($queryResult)===1){ 
                    $row=$queryResult[0]; 
                    $commentaire= \ProjetLecteur\Metier\CommentaireFabrique::getValidInstance($dataErrorAttributes, $row); 
                    $dataError=array_merge($dataError,$dataErrorAttributes); //fusion 
                }
                else {
                    $dataError['persistance']="Commentaire d'id : ".$idCommentaire ." introuvable"; 
                }
            }
            else { 
                $dataError['persistance']= "Impossible d'accéder aux données"; 
            }
        }
        else { 
            $dataError['persistance']="Commentaire d'id : ".$idCommentaire ." introuvable"; 
        }
        return $commentaire; 
    }
    
  
    
    public static function deleteCommentaire (&$dataError,$idCommentaire){ 
        $dataErrorIdSearch=array(); 
        $commentaire=self::getCommentaireById($dataErrorIdSearch, $idCommentaire); 
        $args=array($idCommentaire); 
        if (empty($dataErrorIdSearch)){ 
            $queryResult = DataBaseManager::getInstance()->prepareAndExecuteQuery('DELETE FROM commentaires WHERE idCommentaire=?',$args); 
            if ($queryResult ===false){ 
                $dataError['persistance']= "Problème d'exécution de la requête"; 
            }
            else { 
                $dataError= array_merge($dataError,$dataErrorIdSearch); 
            }
            return $commentaire; 
        }                 
    }
}