<?php

namespace ProjetLecteur\Metier;

/**
 * Description of Musique
 *
 * @author alexd
 */
class Musique {
    public $idMusique; 
    
    public $titre; 
    
    public $nomAuteur; 
    
    public $couvertureAlbum; 
    
    public $nomAlbum; 
    
    public $anneeParution; 
    
    public $duree; 
    
    public $nbavisFavorables; 
    
    public $nbavisIndifferents; 
    
    public $nbavisDefavorables; 
    
    public $periodeMel; 
    
    public $cheminAudio; 
    
    public $commentaires; 
    
    public function __construct($idMusique,$titre, $nomAuteur,$couverture_album,$nom_album, $annee_parution,$duree,$periode_mel, $chemin_audio,$nbavisind,$nbavisdef,$nbavisfav) {
        $this->idMusique = $idMusique;        
        $this->titre=$titre;
        $this->nomAuteur= $nomAuteur;
        $this->couvertureAlbum =$couverture_album;
        $this->nomAlbum= $nom_album; 
        $this->anneeParution=$annee_parution;
        $this->duree=$duree;
        $this->periodeMel= $periode_mel;   
        $this->cheminAudio=$chemin_audio;      
        $this->nbavisDefavorables=$nbavisdef; 
        $this->nbavisFavorables=$nbavisfav; 
        $this->nbavisIndifferents=$nbavisind; 
 
    }
    
    public static function getDefaultInstance(){ 
        $musique = new self (uniqid(),"","","","","","","","",0,0,0); 
        return $musique; 
    }
}
