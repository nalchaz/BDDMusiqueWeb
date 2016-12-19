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
    
    protected static function validatePeriode ($periodeMel){ 
        if (empty($periodeMel)){ 
            throw new \Exception("La période de mise en ligne doit être renseignée"); 
        }
    }
    
    protected static function validateCouverture ($couverture){ 
        if (empty($couverture)){ 
            throw new \Exception("La couverture de l'album doit être renseignée"); 
        }
    }

    public static function validateInstance (&$dataErrors,&$musique){ 
       $dataErrors= array(); 
       try { 
           self::validateIdMusique($musique->idMusique);
       } 
       catch (\Exception $ex) {
          $dataErrors['idMusique']=$ex->getMessage();  
       }
       try { 
           self::validateNomAlbum($musique->nomAlbum);
       } 
       catch (\Exception $ex) {
          $dataErrors['nomAlbum']=$ex->getMessage();  
       }
       try { 
           self::validateTitre($musique->titre);
       } 
       catch (\Exception $ex) {
          $dataErrors['titre']=$ex->getMessage();  
       }
       try { 
           self::validateAnneeParution($musique->anneeParution);
       } 
       catch (\Exception $ex) {
          $dataErrors['anneeParution']=$ex->getMessage();  
       }
       try { 
           self::validatePeriode($musique->periodeMel);
       } 
       catch (\Exception $ex) {
          $dataErrors['periodeMel']=$ex->getMessage();  
       }
       try { 
           self::validateCouverture($musique->couvertureAlbum);
       } 
       catch (\Exception $ex) {
          $dataErrors['couvertureAlbum']=$ex->getMessage();  
       }
   }

    public static function getValidInstance(&$dataErrors, &$inputArray, $policy = \ProjetLecteur\Controleur\ValidationUtils::SANITIZE_POLICY_DISCARD_HTML_NOQUOTE) {
        MusiqueValidation::validationInput($inputArray, $musique, $policy);
        self::validateInstance($dataErrors, $musique); 
        return $musique; 
    }

}
