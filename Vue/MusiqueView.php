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
    
    
    public static function getHTMLMusiqueRow($musique,$sanitizePolicy= \ProjetLecteur\Controleur\ValidationUtils::SANITIZE_POLICY_ESCAPE_ENTITIES){ 
        if (\ProjetLecteur\Metier\MusiqueValidation::filterMusique($musique,false,$sanitizePolicy) === false){ 
            return "Musique Incorrecte"; 
        }
        if ($musique->cheminAudio!=""){ 
            $htmlCode="<td class=\"play\"><audio src=".$musique->cheminAudio."></audio></td>";
        }
        else { 
            $htmlCode="<td></td>"; 
        }
        $htmlCode.="<td class=\"titre\">".$musique->titre."</td>"; 
        $htmlCode.="<td class=\"couv\"><image src=".$musique->couvertureAlbum."</image></td>"; 
        $htmlCode.="<td class=\"periodeMel\">".$musique->periodeMel."</td>"; 
        $htmlCode.="<td class=\"avpos\">".$musique->nbavisFavorables."</td>"; 
        return $htmlCode; 
    }
    
    
    public static function getHTMLDevelopped($musique,$sanitizePolicy= \ProjetLecteur\Controleur\ValidationUtils::SANITIZE_POLICY_ESCAPE_ENTITIES){ 
        if (\ProjetLecteur\Metier\MusiqueValidation::filterMusique($musique,false,$sanitizePolicy) === false){ 
            return "Musique Incorrecte"; 
        }
        $htmlCode="<strong>Musique</strong>"; 
        $htmlCode.="<p class=\"titre\"> Titre : ".$musique->titre."</p>"; 
        $htmlCode.="<image src=".$musique->couvertureAlbum."</image>"; 
        $htmlCode.="<p class=\"periodeMel\">Période mise en ligne : ".$musique->periodeMel."</p>"; 
        if (!empty($musique->nomAlbum)){
        $htmlCode.="<p> Album :".$musique->nomAlbum."</p>";
        }
        else { 
            $htmlCode.=""; 
        }
        if ($musique->nomAuteur!=""){
            $htmlCode.="<p> Auteur :".$musique->nomAuteur."</p>";
        }
        else { 
            $htmlCode.=""; 
        }
        if ($musique->duree!=""){
            $htmlCode.="<p>Durée : ".$musique->duree."secondes</p>";
        }
        else { 
            $htmlCode.=""; 
        }
        if ($musique->anneeParution!=""){
            $htmlCode.="<p>".$musique->anneeParution."</p>";
        }
        else { 
            $htmlCode.=""; 
        }
        return $htmlCode; 
    }
}
