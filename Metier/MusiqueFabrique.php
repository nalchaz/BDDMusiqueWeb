<?php
/**
 * Created by PhpStorm.
 * User: alexd
 * Date: 10/12/2016
 * Time: 22:46
 */

namespace ProjetLecteur\Metier;


class MusiqueFabrique
{
    
    protected static function validateIdMusique(&$id_musique){ 
        if (!isset($id_musique) || !preg_match("/^[0-9a-f]{10,20}$/", $id_musique)){ 
            $tmp=$idmusiques; $id_musique="";
            throw new \Exception("Erreur, identifiant \"".$tmp."\"incorrect"); 
        }
    }
    
    protected static function validateNomAlbum(&$nom_album){ 
        if (!ExpressionsRegexUtils::isValidLatin1WithNumbersAndPunctuation($nom_album, 1, 50)){ 
            $tmp=$nom_album; $nom_album="";
            throw new \Exception("Le nom de l'album doit être renseigné et il a au maximum 50 caractères"); 
        }
    }
    
    protected static function validateTitre(&$titre){ 
        if (!ExpressionsRegexUtils::isValidLatin1($titre, 1, 50)){ 
            throw new \Exception("Le titre doit être renseigné et il a au maximum 50 caractères"); 
        }
    }
    
    protected static function validateAnneeParution($annee_parution) {
        if ($annee_parution != "") {
            if ($annee_parution > 2500 || $annee_parution < 1200) {

                throw new \Exception("L'année de parution doit être un nombre de 4 chiffres");
            }
        }
    }

    public static function validateInstance (&$dataErrors,&$musique){ 
       $dataErrors= array(); 
       try { 
           self::validateIdMusique($musique->id_musique);
       } 
       catch (\Exception $ex) {
          $dataErrors['id_musique']=$ex->getMessage();  
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
       try { 
           self::validateAnneeParution($musique->annee_parution);
       } 
       catch (\Exception $ex) {
          $dataErrors['annee_parution']=$ex->getMessage();  
       }
       
   }

    public static function getValidInstance(&$dataErrors, &$inputArray, $policy = \ProjetLecteur\Controleur\ValidationUtils::SANITIZE_POLICY_DISCARD_HTML_NOQUOTE) {
        MusiqueValidation::validationInput($inputArray, $musique, $policy);
        self::validateInstance($dataErrors, $musique); 
        return $musique; 
    }

}
