<?php
/**
 * Created by PhpStorm.
 * User: alexd
 * Date: 10/12/2016
 * Time: 22:46
 */

namespace Lecteur\Metier;


class MusiqueFabrique
{
    
    protected static function validateIdMusique(&$idmusiques){ 
        if (!isset($idmusiques) || !preg_match("/^[0-9a-f]{10}$/", $idmusiques)){ 
            $tmp=$idmusiques; $idmusiques="";
            throw new \Exception("Erreur, identifiant \"".$tmp."\"incorrect"); 
        }
    }
    
    protected static function validateNomAlbum(&$nom_album){ 
        if (!ExpressionsRegexUtils::isValidLatin1WithNumbersAndPunctuation($nom_album, 1, 50)){ 
            $tmp=$nom_album; $nom_album="";
            throw new \Exception("Erreur, le nom album a au maximum 50 caractères"); 
        }
    }
    
    protected static function validateTitre(&$titre){ 
        if (!ExpressionsRegexUtils::isValidLatin1WithNumbersAndPunctuation($titre, 1, 50)){ 
            $tmp=$titre; $titre="";
            throw new \Exception("Erreur, le titre a au maximum 50 caractères"); 
        }
    }
    
   public static function validateInstance (&$dataErrors,&$musique){ 
       $dataErrors= array(); 
       try { 
           self::validateIdMusique($musique->idmusiques);
       } 
       catch (\Exception $ex) {
          $dataErrors['idmusiques']=$ex->getMessage();  
       }
       try { 
           self::validateNomAlbum($musique->nom_album);
       } 
       catch (\Exception $ex) {
          $dataErrors['nom_album']=$ex->getMessage();  
       }
       try { 
           self::validateTitre($musique->titre);
       } 
       catch (\Exception $ex) {
          $dataErrors['titre']=$ex->getMessage();  
       }
       
   }

    public static function getValidInstance(&$dataErrors, &$inputArray, $policy = \ProjetLecteur\Controleur\ValidationUtils::SANITIZE_POLICY_DISCARD_HTML_NOQUOTE) {
        MusiqueValidation::validationInput($inputArray, $musique, $policy);
        self::validateInstance($dataErrors, $musique); 
        return $musique; 
    }

}
