<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ProjetLecteur\Auth;

/**
 * Description of ValidationRequest
 * Valider les données de login/password
 * Nettoyage des chaînes 
 * Initialisation à vide des inputs existants
 * @author alexd
 */
class ValidationRequest {

    public static function sanitizeString($chaine) {
        return isset($chaine) ? filter_var($chaine, FILTER_SANITIZE_STRING) : "";
    }

    public static function validationLogin(&$dataError, &$email, &$password) {
        if (!isset($dataError)) {
            $dataError = array();
        }
        $wouldBePassword = $_POST['motdepasse'];
        if (empty($wouldBePassword) || !AuthUtils::isStrongPassword($wouldBePassword)) {
            $password = "";
            $dataError['mdp'] = "Mot de passe incorrect" . ": votre mot de passe doit contenir au moins 8 caractères, " . "une minuscule, une majuscule, un chiffre.</p>";
        } else {
            $password = $wouldBePassword;
        }
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == FALSE) { 
            $email =""; 
            $dataError['login']= "Adresse email invalide.";
            
        }
        else { 
            $email=$_POST["email"]; 
        }
    }

}
