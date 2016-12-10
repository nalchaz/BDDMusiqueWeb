<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lecteur\Vue;

/**
 * Description of MusiqueView
 *  Retourner le code HTML de l'affichage d'une musique 
 * @author alexd
 */
class MusiqueView {
    
    
    public static function getHTMLMusique($musique,$sanitizePolicy = \ProjetLecteur\Controleur\ValidationUtils::SANITIZE_POLICY_ESCAPE_ENTITIES){ 
        if (\ProjetLecteur\Metier\MusiqueValidation::filterMusique($musique,$sanitizePolicy) == false){ 
            return "Musique Incorrecte"; 
        }
        $htmlCode= "<strong>Musique :</strong><br/> \n"; 
        $htmlCode.=$musique->titre."<br/>"; 
        return $htmlCode; 
    }
}
