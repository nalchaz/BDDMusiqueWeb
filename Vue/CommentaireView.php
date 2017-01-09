<?php
namespace ProjetLecteur\Vue ; 


class CommentaireView {
    public static function getHtmlDevelopped ($commentaire){ 
        $htmlCode="<p>de ".$commentaire->login."</p>"; 
        $htmlCode.="<p>Contenu : ".$commentaire->texte."</p>";
        $modele= \ProjetLecteur\Modele\ModelMusique::getModelMusique($commentaire->idMusique);
        $titre=$modele->getData()->titre;  
        $htmlCode.="<p>Sur la musique : ".$titre."</p>"; 
        return $htmlCode; 
    }
    
 
}
