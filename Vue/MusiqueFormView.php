<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ProjetLecteur\Vue; 
/**
 * Description of MusiqueFormView
 *
 * @author alexd
 */
class MusiqueFormView {
    public static function getDefaultFormHtml ($action){ 
        return self::getFormHtml($action, \ProjetLecteur\Metier\Musique::getDefaultInstance()); 
    }
    
    public static function getFormHtml ($action, $musique, $filteringPolicy= \ProjetLecteur\Controleur\ValidationUtils::SANITIZE_POLICY_NONE){ 
        \ProjetLecteur\Metier\MusiqueValidation::filterMusique($musique, false, $filteringPolicy); 
        $htmlCode= FormManager::beginForm("post", $action); 
        $htmlCode.= FormManager::addHiddenInput("id_musique", "id_musique", $musique->id_musique);
        $htmlCode.= FormManager::addHiddenInput("nbavis_favorables", "nbavis_favorables", 0);
        $htmlCode.= FormManager::addHiddenInput("nbavis_indifferents", "nbavis_indifferents", 0);
        $htmlCode.= FormManager::addHiddenInput("nbavis_defavorables", "nbavis_defavorables", 0);
        $htmlCode.= FormManager::addTextInput("Titre", "titre", "titre", 4, $musique->titre); 
        $htmlCode.= FormManager::addTextInput("Nom Auteur", "nomAuteur", "nomAuteur", 4,$musique->nomAuteur); 
        $htmlCode.= FormManager::addTextInput("Nom Album", "nom_album", "nom_album", 4,$musique->nom_album);
        $htmlCode.= FormManager::addTextInput("Couverture Album", "couverture_album", "couverture_album", 4,$musique->couverture_album);
        $htmlCode.= FormManager::addInput("Année Parution","number", "annee_parution", "annee_parution",$musique->annee_parution);
        $htmlCode.= FormManager::addInput("Durée en secondes","number", "duree", "duree",$musique->duree);
        $htmlCode.= FormManager::addTextInput("Periode mise en ligne", "periode_mel", "periode_mel", 4,$musique->periode_mel);
        $htmlCode.= FormManager::addTextInput("Chemin Audio", "chemin_audio", "chemin_audio", 4,$musique->chemin_audio);
        $htmlCode.= FormManager::addSubmitButton("Ajouter"); 
        $htmlCode.= FormManager::endForm(); 
        return $htmlCode; 
    }
    
    public static function addErrorsMsgs ($dataError, $fieldName){ 
        $htmlCode=""; 
        if (!empty($dataError[$fieldName])){ 
            $htmlCode.="<span class=\"errorMsg\">".htmlentities($dataError[$fieldName], ENT_COMPAT,"UTF-8")."</span>"; 
        }
        return $htmlCode; 
    }
    
    public static function getFormErrorsHtml ($action, $musique, $dataError,$filteringPolicy=
            \ProjetLecteur\Controleur\ValidationUtils::SANITIZE_POLICY_NONE ){
        \ProjetLecteur\Metier\MusiqueValidation::filterMusique($musique, false, $filteringPolicy);
        $htmlCode= FormManager::beginForm("post", $action);
        $htmlCode.= FormManager::addHiddenInput("id_musique", "id_musique", $musique->id_musique);
        $htmlCode.= FormManager::addHiddenInput("nbavis_favorables", "nbavis_favorables", 0);
        $htmlCode.= FormManager::addHiddenInput("nbavis_indifferents", "nbavis_indifferents", 0);
        $htmlCode.= FormManager::addHiddenInput("nbavis_defavorables", "nbavis_defavorables", 0);
        $htmlCode.= self::addErrorsMsgs($dataError, "titre"); 
        $htmlCode.= FormManager::addTextInput("Titre", "titre", "titre", 4,$musique->titre); 
        $htmlCode.= self::addErrorsMsgs($dataError, "nomAuteur"); 
        $htmlCode.= FormManager::addTextInput("Nom Auteur", "nomAuteur", "nomAuteur", 4,$musique->nomAuteur); 
        $htmlCode.= self::addErrorsMsgs($dataError, "nom_album"); 
        $htmlCode.= FormManager::addTextInput("Nom Album", "nom_album", "nom_album", 4,$musique->nom_album);
        $htmlCode.= self::addErrorsMsgs($dataError, "couverture_album"); 
        $htmlCode.= FormManager::addTextInput("Couverture Album", "couverture_album", "couverture_album", 4,$musique->couverture_album);
        $htmlCode.= self::addErrorsMsgs($dataError, "annee_parution"); 
        $htmlCode.= FormManager::addInput("Année Parution","number", "annee_parution", "annee_parution", $musique->annee_parution);
        $htmlCode.= self::addErrorsMsgs($dataError, "duree"); 
        $htmlCode.= FormManager::addInput("Duree","number", "duree", "duree", $musique->duree);
        $htmlCode.= self::addErrorsMsgs($dataError, "periode_mel"); 
        $htmlCode.= FormManager::addTextInput("Periode mise en ligne", "periode_mel", "periode_mel", 4,$musique->periode_mel);
        $htmlCode.= self::addErrorsMsgs($dataError, "chemin_adio"); 
        $htmlCode.= FormManager::addTextInput("Chemin Audio", "chemin_audio", "chemin_audio", 4,$musique->chemin_audio);
        
        $htmlCode.= FormManager::addSubmitButton("Ajouter"); 
        $htmlCode.= FormManager::endForm(); 
        return $htmlCode; 
    }
}
