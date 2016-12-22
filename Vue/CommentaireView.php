<?php
namespace ProjetLecteur\Vue ; 


class CommentaireView {
    public static function getHtmlDevelopped ($commentaire){ 
        $htmlCode="<p>de ".$commentaire->login."</p>"; 
        $htmlCode.="<p>Contenu : ".$commentaire->texte."</p>";
        $musique= \ProjetLecteur\Modele\ModelMusique::getModelMusique($commentaire->idMusique);
        $titre=$musique->getData()->titre;  
        $htmlCode.="<p>Sur la musique : ".$titre."</p>"; 
        return $htmlCode; 
    }
}
