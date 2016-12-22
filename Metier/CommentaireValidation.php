<?php

namespace ProjetLecteur\Metier;
use ProjetLecteur\Controleur\ValidationUtils as VU;
/**
 * Description of CommentaireValidation
 *
 * @author alexd
 */
class CommentaireValidation {
    public static function filterCommentaire($commentaire,$reversed,$policy){ 
        VU::filterString($commentaire->texte,$reversed,$policy); 
        VU::filterString($commentaire->login,$reversed,$policy); 
        VU::filterString($commentaire->idMusique,$reversed,$policy); 
        VU::filterString($commentaire->idCommentaire,$reversed,$policy); 
    }
    
    public static function validationInput ($inputArray,&$commentaire,$policy){ 
        @$commentaire->idCommentaire=$inputArray['idCommentaire']; 
        $commentaire->texte=$inputArray['texte'];
        $commentaire->login=$inputArray['login']; 
        $commentaire->idMusique=$inputArray['idMusique']; 
        $commentaire->dateInsertion=$inputArray['dateInsertion'];
        $commentaire->heureInsertion=$inputArray['heureInsertion']; 
        self::filterCommentaire($commentaire, true, $policy);
    }
}
