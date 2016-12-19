<?php


namespace ProjetLecteur\Metier;
use ProjetLecteur\Controleur\ValidationUtils as VU; 
/**
 * Description of MusiqueValidation
 * Validation initiale des données d'une musique
 * @author alexd
 */
class MusiqueValidation {
    public static function filterMusique($musique,$reversed,$policy){ 
        VU::filterString($musique->titre,$reversed,$policy);
        VU::filterString($musique->nomAuteur,$reversed,$policy); 
        VU::filterString($musique->nom_album,$reversed,$policy); 
        VU::filterString($musique->chemin_audio,$reversed,$policy); 
        VU::filterString($musique->couverture_album,$reversed,$policy); 
        VU::filterString($musique->duree,$reversed,$policy);
        VU::filterString($musique->annee_parution,$reversed,$policy);
        VU::filterString($musique->periode_mel,$reversed,$policy);
         
    }
    
    public static function validationInput ($inputArray,&$musique,$policy){ 
        @$musique->id_musique= $inputArray['id_musique']; 
        $musique->titre =$inputArray['titre']; 
        $musique->nomAuteur=$inputArray['nomAuteur']; 
        $musique->chemin_audio=$inputArray['chemin_audio']; 
        $musique->nom_album=$inputArray['nom_album']; 
        $musique->couverture_album=$inputArray['couverture_album']; 
        $musique->periode_mel=$inputArray['periode_mel']; 
        $musique->duree=$inputArray['duree']; 
        $musique->annee_parution=$inputArray['annee_parution']; 
        $musique->nbavis_favorables=$inputArray['nbavis_favorables'];
        $musique->nbavis_indifferents=$inputArray['nbavis_indifferents'];
        $musique->nbavis_defavorables=$inputArray['nbavis_defavorables'];
        self::filterMusique($musique, true, $policy);
    }
}
