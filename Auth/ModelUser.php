<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ProjetLecteur\Auth;

/**
 * Description of ModelUser
 *
 * @author alexd
 */
class ModelUser extends \ProjetLecteur\Modele\Model{
    private $email; 
    
    private $role; 
    public function __contruct ($dataError){ 
        parent::__construct($dataError);
    }
    
    public function getEmail(){ 
        return $this->email; 
    }
    
    public function getRole(){ 
        return $this->role; 
    }
    
    public static function getModelUser ($email,$hashedPassword){ 
        $model=new self(array()); 
        $model->role=UserGateway::getRoleByPassword($model->dataError,$email,$hashedPassword); 
        if ($model->role !== false){ 
            $model->email=$email; 
        } 
        else { 
            $model->dataError['login']="Login ou mot de passe incorrect"; 
        } 
        return $model; 
    }
    
    public static function getModelUserFromSession ($email,$role){ 
        $model=new self(array());
        $model->role=$role; 
        $model->email=$email; 
        return $model; 
    }
        
    
}
