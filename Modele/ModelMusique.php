<?php


namespace ProjetLecteur\Modele;

/**
 * Description of ModelMusique
 *
 * @author alexd
 */
class ModelMusique extends Model{
    private $musique; 
    private $title;
    private $commentaires; 
    
    public function getData () { 
        return $this->musique; 
    }
    
    public function getTitle () { 
        return $this->title; 
    }
    
    public function getCommentaires (){ 
        return $this->commentaires; 
    }
    
    public static function getModelDefaultMusique (){ 
        $model =new self (array()); 
        $model->musique= \ProjetLecteur\Metier\Musique::getDefaultInstance();
        $model->title= "Saisie d'une musique"; 
        return $model;     
    }
    
    public static function getModelMusique ($idmusique){ 
        $model = new self (array()); 
        $model->musique = \ProjetLecteur\Persistance\MusiqueGateway::getMusiqueById($model->dataError, $idmusique); 
        $model->commentaires=\ProjetLecteur\Modele\ModelCollectionCommentaire::getModelCommentaireMusique($idmusique);
        $model->title="Affichage d'une musique"; 
        return $model; 
    }
    
    public static function getModelMusiqueCreate($inputArray) { 
        $model= new self(array()); 
        $model->musique= \ProjetLecteur\Persistance\MusiqueGateway::createMusique($model->dataError,$inputArray); 
        $model->title="La musique a été insérée"; 
        return $model; 
    }
    
    public static function getModelMusiqueUpdate($inputArray){ 
        $model= new self (array()); 
        $model->musique= \ProjetLecteur\Persistance\MusiqueGateway::updateMusique($model->dataError,$inputArray); 
        $model->title= "La musique a été mise à jour"; 
        return $model; 
    }
    
    public static function deleteMusique ($idMusique){ 
        $model= new self (array()); 
        @$model->musique= \ProjetLecteur\Persistance\MusiqueGateway::deleteMusique($model->dataError,$idMusique); 
        $model->title="Musique supprimée"; 
        return $model; 
    }
    
    public static function addAvisFavorable ($idMusique) { 
        $model= new self (array()); 
        @$model->musique= \ProjetLecteur\Persistance\MusiqueGateway::addAvisFavorable($model->dataError,$idMusique); 
        $model->title="Avis positif ajouté"; 
        return $model;
    }
    
    public static function addAvisDefavorable ($idMusique) { 
        $model= new self (array()); 
        @$model->musique= \ProjetLecteur\Persistance\MusiqueGateway::addAvisDefavorable($model->dataError,$idMusique); 
        $model->title="Avis positif ajouté"; 
        return $model;
    }
    
    public static function addAvisIndifferent ($idMusique) { 
        $model= new self (array()); 
        @$model->musique= \ProjetLecteur\Persistance\MusiqueGateway::addAvisIndifferent($model->dataError,$idMusique); 
        $model->title="Avis positif ajouté"; 
        return $model;
    }
}
