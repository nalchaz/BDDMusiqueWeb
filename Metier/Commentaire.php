<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ProjetLecteur\Metier;

/**
 * Description of Commentaire
 *
 * @author alexd
 */
class Commentaire {
    public $idCommentaire ; 
    
    public $idMusique; 
    
    public $texte; 
    
    public $login; 
    
    public $dateInsertion; 
    
    public $heureInsertion; 
    
    public function __construct($idCommentaire,$idMusique, $texte,$login,$dateIns,$heureIns) {
        $this->idCommentaire=$idCommentaire; 
        $this->idMusique = $idMusique;        
        $this->texte=$texte;
        $this->login=$login;
        $this->dateInsertion=$dateIns; 
        $this->heureInsertion=$heureIns; 
    
    }
}
