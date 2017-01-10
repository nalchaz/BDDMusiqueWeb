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
    
   
    
    
    protected static function validateTitre(&$titre){ 
        if (!ExpressionsRegexUtils::isValidLatin1WithNumbers($titre, 1, 50)){ 
            throw new \Exception("Le titre doit être renseigné et il a au maximum 50 caractères"); 
        }
    }
    
    protected static function validateAnneeParution($annee_parution) {
        if ($annee_parution != "") {
            if (!preg_match('/^[0-9]{4}$/', $annee_parution)) {

                throw new \Exception("L'année de parution doit être un nombre de 4 chiffres");
            }
        }
    }
    
    protected static function validateDuree($duree){
        if ($duree != "") {
            if (!preg_match('/^[0-9]{1,5}$/', $duree)) {

                throw new \Exception("La durée doit être un nombre entier");
            }
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
           self::validateCouverture($musique->couvertureAlbum);
       } 
       catch (\Exception $ex) {
          $dataErrors['couvertureAlbum']=$ex->getMessage();  
       }
       
       try { 
           self::validateDuree($musique->duree);
       } 
       catch (\Exception $ex) {
          $dataErrors['duree']=$ex->getMessage();  
       }
   }

    public static function getValidInstance(&$dataErrors, &$inputArray,$commentaires, $policy = \ProjetLecteur\Controleur\ValidationUtils::SANITIZE_POLICY_DISCARD_HTML_NOQUOTE) {
        
        MusiqueValidation::validationInput($inputArray, $musique, $policy);
        self::validateInstance($dataErrors, $musique); 
        $musique->commentaires=$commentaires; 
        return $musique; 
    }

}
