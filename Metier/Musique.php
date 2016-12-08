<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lecteur\Metier;

/**
 * Description of Musique
 *
 * @author alexd
 */
class Musique {
    //put your code here
    public $idMusique; 
    
    public $titre; 
    
    public $idAuteur; 
    
    public $couverture_album; 
    
    public $nom_album; 
    
    public $annee_parution; 
    
    public $duree; 
    
    public $nbavis_favorables; 
    
    public $nbavis_indifferents; 
    
    public $nbavis_defavorables; 
    
    public $periode_mel; 
    
    public $chemin_audio; 
    
    public function __construct($idMusique,$idAuteur,$couverture_album,$nom_album, $annee_parution,$duree,$periode_mel, $chemin_audio) {
        if ($idMusique=='auto'){ 
            $idMusique = uniqid(); 
        }
        else {
            $this->idMusiqued=$idMusique; 
        }
        $this->idAuteur= $idAuteur;
        $this->couverture_album =$couverture_album;
        $this->nom_album= $nom_album; 
        $this->annee_parution=$annee_parution;
        $this->duree=$duree;
        $this->periode_mel= $periode_mel;   
        $this->chemin_audio=$chemin_audio;      
        $this->nbavis_defavorables=0; 
        $this->nbavis_favorables=0; 
        $this->nbavis_indifferents=0; 
    }
}
