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
    
    public static function getHtmlCompactAdmin($com) {
        $htmlCode= "<div class=\"unCom\">";
        $htmlCode.= "<a class=\"deleteCom\" href=\"?action=deleteCom&idCommentaire=" . $com->idCommentaire . "\">Supprimer ce commentaire</a>";
        $htmlCode.= "<p class=\"logincom\">" . $com->login . " le " . $com->dateInsertion . " à " . $com->heureInsertion . " : </p>";
        $htmlCode.= "<p class=\"textcom\">" . $com->texte . "</p>";
        $htmlCode.= "</div><br/>";
        return $htmlCode; 
    }
    
    public static function getHtmlCompactVisitorAuth($com) {
        $htmlCode= "<div class=\"unCom\">";
        $htmlCode.= "<p class=\"logincom\">" . $com->login . " le " . $com->dateInsertion . " à " . $com->heureInsertion . " : </p>";
        $htmlCode.= "<p class=\"textcom\">" . $com->texte . "</p>";
        $htmlCode.= "</div><br/>";
        return $htmlCode; 
    }

}
