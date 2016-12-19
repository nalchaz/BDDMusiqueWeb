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
        VU::filterString($musique->nomAlbum,$reversed,$policy); 
        VU::filterString($musique->cheminAudio,$reversed,$policy); 
        VU::filterString($musique->couvertureAlbum,$reversed,$policy); 
        VU::filterString($musique->duree,$reversed,$policy);
        VU::filterString($musique->anneeParution,$reversed,$policy);
        VU::filterString($musique->periodeMel,$reversed,$policy);
         
    }
    
    public static function validationInput ($inputArray,&$musique,$policy){ 
        @$musique->idMusique= $inputArray['idMusique']; 
        $musique->titre =$inputArray['titre']; 
        $musique->nomAuteur=$inputArray['nomAuteur']; 
        $musique->cheminAudio=$inputArray['cheminAudio']; 
        $musique->nomAlbum=$inputArray['nomAlbum']; 
        $musique->couvertureAlbum=$inputArray['couvertureAlbum']; 
        $musique->periodeMel=$inputArray['periodeMel']; 
        $musique->duree=$inputArray['duree']; 
        $musique->anneeParution=$inputArray['anneeParution']; 
        $musique->nbavisFavorables=$inputArray['nbavisFavorables'];
        $musique->nbavisIndifferents=$inputArray['nbavisIndifferents'];
        $musique->nbavisDefavorables=$inputArray['nbavisDefavorables'];
        self::filterMusique($musique, true, $policy);
    }
}
