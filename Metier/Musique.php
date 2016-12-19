<?php

namespace ProjetLecteur\Metier;

/**
 * Description of Musique
 *
 * @author alexd
 */
class Musique {
    public $id_musique; 
    
    public $titre; 
    
    public $nomAuteur; 
    
    public $couverture_album; 
    
    public $nom_album; 
    
    public $annee_parution; 
    
    public $duree; 
    
    public $nbavis_favorables; 
    
    public $nbavis_indifferents; 
    
    public $nbavis_defavorables; 
    
    public $periode_mel; 
    
    public $chemin_audio; 
    
    public function __construct($idMusique,$titre, $nomAuteur,$couverture_album,$nom_album, $annee_parution,$duree,$periode_mel, $chemin_audio,$nbavisind,$nbavisdef,$nbavisfav) {
        $this->id_musique = $idMusique;        
        $this->titre=$titre;
        $this->nomAuteur= $nomAuteur;
        $this->couverture_album =$couverture_album;
        $this->nom_album= $nom_album; 
        $this->annee_parution=$annee_parution;
        $this->duree=$duree;
        $this->periode_mel= $periode_mel;   
        $this->chemin_audio=$chemin_audio;      
        $this->nbavis_defavorables=$nbavisdef; 
        $this->nbavis_favorables=$nbavisfav; 
        $this->nbavis_indifferents=$nbavisind; 
    }
    
    public static function getDefaultInstance(){ 
        $musique = new self (uniqid(),"","","","","","","","",0,0,0); 
        return $musique; 
    }
}
