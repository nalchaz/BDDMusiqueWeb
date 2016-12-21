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
        if (isset($_SESSION['role'])){
            $htmlCode.="<td ><a class=\"titre\" href=\"?action=infos&idMusique=".$musique->idMusique."\">".$musique->titre."</a></td>"; 
        }
        else { 
            $htmlCode.="<td><p class=\"titre\">".$musique->titre."</p></td>"; 
        }
        $htmlCode.="<td class=\"couv\"><image src=".$musique->couvertureAlbum."</image></td>"; 
        $htmlCode.="<td><p class=\"periodeMel\">".$musique->periodeMel."</p></td>"; 
        $htmlCode.="<td><p class=\"avpos\" >".$musique->nbavisFavorables."</p></td>"; 
        return $htmlCode; 
    }
    
    
    public static function getHTMLDevelopped($musique,$sanitizePolicy= \ProjetLecteur\Controleur\ValidationUtils::SANITIZE_POLICY_ESCAPE_ENTITIES){  
        if (\ProjetLecteur\Metier\MusiqueValidation::filterMusique($musique,false,$sanitizePolicy) === false){ 
            return "Musique Incorrecte"; 
        }
       
        $htmlCode="<p class=\"titreI\">".$musique->titre."</p>"; 
        if ($musique->nomAuteur!=""){
            $htmlCode.="<p class=\"auteur\"> ".$musique->nomAuteur."</p>";
        }
        else { 
            $htmlCode.=""; 
        }
        $htmlCode.="<p><image src=".$musique->couvertureAlbum."</image></p>"; 
        if (!empty($musique->nomAlbum)){
        $htmlCode.="<p class=\"nomAlbumI\"> Album :".$musique->nomAlbum."</p>";
        }
        else { 
            $htmlCode.=""; 
        }
        
        if ($musique->duree!=""){
            $htmlCode.="<p class=\"duree\">".$musique->duree."secondes</p>";
        }
        else { 
            $htmlCode.=""; 
        }
        if ($musique->anneeParution!=""){
            $htmlCode.="<p class=\"annee\">".$musique->anneeParution."</p>";
        }
        else { 
            $htmlCode.=""; 
        }
        $htmlCode.="<p class=\"periodeMelI\">Mise en ligne le : ".$musique->periodeMel."</p>"; 
        return $htmlCode; 
    } 
    
    public static function getHTMLInfos($musique,$sanitizePolicy= \ProjetLecteur\Controleur\ValidationUtils::SANITIZE_POLICY_ESCAPE_ENTITIES){ 
        if (\ProjetLecteur\Metier\MusiqueValidation::filterMusique($musique,false,$sanitizePolicy) === false){ 
            return "Musique Incorrecte"; 
        }
       
        $htmlCode="<p class=\"titreI\">".$musique->titre."</p>"; 
        if ($musique->nomAuteur!=""){
            $htmlCode.="<p class=\"auteur\"> ".$musique->nomAuteur."</p>";
        }
        else { 
            $htmlCode.=""; 
        }
        $htmlCode.="<p><image src=".$musique->couvertureAlbum."</image></p>"; 
        if (!empty($musique->nomAlbum)){
        $htmlCode.="<p class=\"nomAlbumI\"> Album :".$musique->nomAlbum."</p>";
        }
        else { 
            $htmlCode.=""; 
        }
        
        if ($musique->duree!=""){
            $htmlCode.="<p class=\"duree\">".$musique->duree."secondes</p>";
        }
        else { 
            $htmlCode.=""; 
        }
        if ($musique->anneeParution!=""){
            $htmlCode.="<p class=\"annee\">".$musique->anneeParution."</p>";
        }
        else { 
            $htmlCode.=""; 
        }
        $htmlCode.="<p class=\"periodeMelI\">Mise en ligne le : ".$musique->periodeMel."</p>"; 
        $htmlCode.="<table class=\"avis\">";
        $htmlCode.="<th>Avis positifs </th>"; 
        $htmlCode.="<th>Avis Indifférents </th>"; 
        $htmlCode.="<th >Avis Défavorables </th>";
        $htmlCode .="<tr>"; 
        $htmlCode.="<td>".$musique->nbavisFavorables."</td>";
        $htmlCode.="<td>".$musique->nbavisIndifferents."</td>";
        $htmlCode.="<td>".$musique->nbavisDefavorables."</td>";
        $htmlCode.="</tr>"; 
        $htmlCode.="<tr>"; 
        $htmlCode.="<td><form action=\"?action=jaime&idMusique=".$musique->idMusique."\" method=\"post\"><input type=\"submit\" value=\"+\"/></form></td>"; 
        $htmlCode.="<td><form action=\"?action=indiffere&idMusique=".$musique->idMusique."\" method=\"post\"><input type=\"submit\" value=\"+\"/></form></td>";
        $htmlCode.="<td><form action=\"?action=jaimepas&idMusique=".$musique->idMusique."\" method=\"post\"><input type=\"submit\" value=\"+\"/></form></td>";
        $htmlCode.="</tr></table>"; 
        return $htmlCode; 
    }
}
