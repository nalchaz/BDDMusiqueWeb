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
    public static function getValidInstance(&$dataErrors, &$inputArray, $policy = \ProjetLecteur\Controleur\ValidationUtils::SANITIZE_POLICY_DISCARD_HTML_NOQUOTE) {
        $dataErrors=array(); 
        CommentaireValidation::validationInput($inputArray, $commentaire, $policy);
        return $commentaire; 
    }
}
