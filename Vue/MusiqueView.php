<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ProjetLecteur\Vue;

/**
 * Description of MusiqueView
 *  Retourner le code HTML de l'affichage d'une musique 
 * @author alexd
 */
class MusiqueView {
    
    
    public static function getHTMLMusiqueDevelopped($musique,$sanitizePolicy= \ProjetLecteur\Controleur\ValidationUtils::SANITIZE_POLICY_ESCAPE_ENTITIES){ 
        if (\ProjetLecteur\Metier\MusiqueValidation::filterMusique($musique,false,$sanitizePolicy) === false){ 
            return "Musique Incorrecte"; 
        }
        
        $htmlCode=$musique->titre."<br/>"; 
        return $htmlCode; 
    }
}
