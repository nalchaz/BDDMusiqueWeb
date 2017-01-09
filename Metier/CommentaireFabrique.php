<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ProjetLecteur\Metier;

/**
 * Description of CommentaireFabrique
 *
 * @author alexd
 */
class CommentaireFabrique {
    
    protected static function validateTexte($texte){
        if (strlen($texte)>200){ 
            throw new \Exception("Le commentaire a au maximum 200 caractères");
        }
    }
    
    protected static function validateInstance (&$dataErrors,&$commentaire){ 
        $dataErrors=array(); 
        try {
            self::validateTexte($commentaire->texte); 
        } catch (\Exception $ex) {
            $dataErrors['texte']=$ex->getMessage(); 
        }
    }


    public static function getValidInstance(&$dataErrors, &$inputArray, $policy = \ProjetLecteur\Controleur\ValidationUtils::SANITIZE_POLICY_DISCARD_HTML_NOQUOTE) {
        CommentaireValidation::validationInput($inputArray, $commentaire, $policy);
        self::validateInstance($dataErrors, $commentaire); 
        return $commentaire; 
    }
}
