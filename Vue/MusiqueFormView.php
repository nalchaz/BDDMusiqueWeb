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
        $htmlCode.= FormManager::addHiddenInput("idMusique", "idMusique", $musique->idMusique);
        $htmlCode.= FormManager::addHiddenInput("nbavisFavorables", "nbavisFavorables", 0);
        $htmlCode.= FormManager::addHiddenInput("nbavisIndifferents", "nbavisIndifferents", 0);
        $htmlCode.= FormManager::addHiddenInput("nbavisDefavorables", "nbavisDefavorables", 0);
        $htmlCode.= FormManager::addTextInput("Titre", "titre", "titre", 4, $musique->titre); 
        $htmlCode.= FormManager::addTextInput("Nom Auteur", "nomAuteur", "nomAuteur", 4,$musique->nomAuteur); 
        $htmlCode.= FormManager::addTextInput("Nom Album", "nomAlbum", "nomAlbum", 4,$musique->nomAlbum);
        $htmlCode.= FormManager::addTextInput("Couverture Album", "couvertureAlbum", "couvertureAlbum", 4,$musique->couvertureAlbum);
        $htmlCode.= FormManager::addTextInput("Année Parution", "anneeParution", "anneeParution",$musique->anneeParution);
        $htmlCode.= FormManager::addTextInput("Durée en secondes", "duree", "duree",$musique->duree);
        $htmlCode.= FormManager::addTextInput("Periode mise en ligne", "periodeMel", "periodeMel", 4,$musique->periodeMel);
        $htmlCode.= FormManager::addTextInput("Chemin Audio", "cheminAudio", "cheminAudio", 4,$musique->cheminAudio);
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
        $htmlCode.= FormManager::addHiddenInput("idMusique", "idMusique", $musique->idMusique);
        $htmlCode.= FormManager::addHiddenInput("nbavisFavorables", "nbavisFavorables", 0);
        $htmlCode.= FormManager::addHiddenInput("nbavisIndifferents", "nbavisIndifferents", 0);
        $htmlCode.= FormManager::addHiddenInput("nbavisDefavorables", "nbavisDefavorables", 0);
        $htmlCode.= self::addErrorsMsgs($dataError, "titre"); 
        $htmlCode.= FormManager::addTextInput("Titre", "titre", "titre", 4,$musique->titre); 
        $htmlCode.= self::addErrorsMsgs($dataError, "nomAuteur"); 
        $htmlCode.= FormManager::addTextInput("Nom Auteur", "nomAuteur", "nomAuteur", 4,$musique->nomAuteur); 
        $htmlCode.= self::addErrorsMsgs($dataError, "nomAlbum"); 
        $htmlCode.= FormManager::addTextInput("Nom Album", "nomAlbum", "nomAlbum", 4,$musique->nomAlbum);
        $htmlCode.= self::addErrorsMsgs($dataError, "couvertureAlbum"); 
        $htmlCode.= FormManager::addTextInput("Couverture Album", "couvertureAlbum", "couvertureAlbum", 4,$musique->couvertureAlbum);
        $htmlCode.= self::addErrorsMsgs($dataError, "anneeParution"); 
        $htmlCode.= FormManager::addTextInput("Année Parution", "anneeParution", "anneeParution",$musique->anneeParution);
        $htmlCode.= self::addErrorsMsgs($dataError, "duree"); 
        $htmlCode.= FormManager::addTextInput("Durée en secondes", "duree", "duree",$musique->duree);
        $htmlCode.= self::addErrorsMsgs($dataError, "periodeMel"); 
        $htmlCode.= FormManager::addTextInput("Periode mise en ligne", "periodeMel", "periodeMel", 4,$musique->periodeMel);
        $htmlCode.= self::addErrorsMsgs($dataError, "cheminAudio"); 
        $htmlCode.= FormManager::addTextInput("Chemin Audio", "cheminAudio", "cheminAudio", 4,$musique->cheminAudio);
        
        $htmlCode.= FormManager::addSubmitButton("Ajouter"); 
        $htmlCode.= FormManager::endForm(); 
        return $htmlCode; 
    }
}
