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

    
    public function getData () { 
        return $this->musique; 
    }
    
    public function getTitle () { 
        return $this->title; 
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
    
    public static function getModelMusiqueDelete ($idMusique){ 
        $model= new self (array()); 
        @$model->musique= \ProjetLecteur\Persistance\MusiqueGateway::deleteMusique($model->dataError,$idMusique); 
        $model->title="Musique supprimée"; 
        return $model; 
    }
    
    
    
    public static function getModelMusiqueAjoutAvisFavorable ($idMusique) { 
        $model= new self (array());
        $verif=true;  
        // Pour tester si l'avis a déjà été donné par cet utilisateur sur cette musique
        \ProjetLecteur\Persistance\MusiqueUserGateway::addAvis($_SESSION['email'],$idMusique, $model->dataError);  
        if (!empty($model->dataError)){  
            $verif=false; 
        }
        $model->musique=\ProjetLecteur\Persistance\MusiqueGateway::addAvisFavorable($model->dataError,$idMusique,$verif); 
        $model->title="Avis positif ajouté"; 
        return $model;
        
    }
    
    public static function getModelMusiqueAjoutAvisDefavorable ($idMusique) { 
        $model= new self (array());
        $verif=true;  
        // Pour tester si l'avis a déjà été donné par cet utilisateur sur cette musique
        \ProjetLecteur\Persistance\MusiqueUserGateway::addAvis($_SESSION['email'],$idMusique, $model->dataError);  
        if (!empty($model->dataError)){ 
            $verif=false; 
        }
        $model->musique=\ProjetLecteur\Persistance\MusiqueGateway::addAvisDefavorable($model->dataError,$idMusique,$verif); 
        $model->title="Avis Négatif ajouté"; 
        return $model;
    }
    
    public static function getModelMusiqueAjoutAvisIndifferent  ($idMusique) { 
        $model= new self (array());
        $verif=true;  
        // Pour tester si l'avis a déjà été donné par cet utilisateur sur cette musique
        \ProjetLecteur\Persistance\MusiqueUserGateway::addAvis($_SESSION['email'],$idMusique, $model->dataError);  
        if (!empty($model->dataError)){ 
            $verif=false; 
        }
        //si la vérif est false l'incrémentation ne se fera pas, la requête sql ne sera pas exécutée
        $model->musique=\ProjetLecteur\Persistance\MusiqueGateway::addAvisIndifferent($model->dataError,$idMusique,$verif); 
        $model->title="Avis Indifférent ajouté"; 
        return $model;
    }
}
