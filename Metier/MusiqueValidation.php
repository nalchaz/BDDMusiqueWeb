<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lecteur\Metier;
use ProjetLecteur\Controleur\ValidationUtils as VU; 
/**
 * Description of AdresseValidation
 * Validation initiale des données d'une musique
 * @author alexd
 */
class MusiqueValidation {
    public static function filterMusique($musique,$reversed,$policy){ 
        VU::filterString($musique->idmusiques,$reversed,$policy); 
        VU::filterString($musique->idauteur,$reversed,$policy); 
        VU::filterString($musique->nom_album,$reversed,$policy); 
        VU::filterString($musique->chemin_audio,$reversed,$policy); 
        VU::filterString($musique->couverture_album,$reversed,$policy); 
        VU::filterString($musique->duree,$reversed,$policy);
        VU::filterString($musique->annee_parution,$reversed,$policy);
        VU::filterString($musique->periode_mel,$reversed,$policy);
    }
    
    public static function validationInput ($inputArray,&$musique,$policy){ 
        $musique->idmusiques=$inputArray['idmusiques']; 
        $musique->idauteur=$inputArray['idauteur']; 
        $musique->chemin_audio=$inputArray['chemin_audiov']; 
        $musique->nom_album=$inputArray['nom_album']; 
        $musique->couverture_album=$inputArray['couverture_album']; 
        $musique->periode_mel=$inputArray['periode_mel']; 
        $musique->duree=$inputArray['duree']; 
        $musique->annee_parution=$inputArray['annee_parution']; 
        $musique->nbavis_favorables=$inputArray['nbavis_favorables']; 
        $musique->nbavis_indifferents=$inputArray['nbavis_indifferents']; 
        $musique->nbavis_defavorables=$inputArray['nbavis_defavorables']; 
        self::filterMusique($musique, $reversed, $policy);
    }
}
