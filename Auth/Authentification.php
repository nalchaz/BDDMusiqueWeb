<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ProjetLecteur\Auth;

/**
 * Description of Authentification
 *
 * @author alexd
 */
class Authentification {
    public static function checkAndInitiateSession ($login,$password,$dataError){ 
        if (!empty($dataError)){ 
            return new \ProjetLecteur\Modele\Model($dataError); 
        }
        $hashedPassword=hash("sha512",$password); 
        $userModel= ModelUser::getModelUser($login, $hashedPassword); 
        if ($userModel->getError() !== false){ 
            return $userModel; 
        }
        SessionUtils::createSession($userModel->getEmail(),$userModel->getRole());
        session_write_close(); 
        return $userModel; 
    }
    
    public static function restoreSession (){ 
        $dataError=array(); 
        if (!isset($_COOKIE['session-id']) || !preg_match("/^[0-9a-fA-F]{20}$/", $_COOKIE['session-id'])) { 
            $dataError['no-cookie']="Votre cookie a peut-être expiré, "."Merci de vous connecter à nouveau ..."; 
            $userModel=new \ProjetLecteur\Modele\Model($dataError); 
        }
        else { 
            $mySid=$_COOKIE['session-id']; 
            session_id($mySid); 
            session_start(); 
            if (!isset($_SESSION['email']) || !isset($_SESSION['role']) || !isset($_SESSION['ipAddress']) 
                    || ($_SESSION['ipAddress']) != $_SERVER['REMOTE_ADDR']) { 
                $dataError['session']= "Unable to recover user session"; 
                $userModel=new \ProjetLecteur\Modele\Model($dataError);
            }
            else { 
                $userModel= ModelUser::getModelUserFromSession($_SESSION['email'], $_SESSION['role']);
            }
            $backupSessionEmail=$_SESSION['email']; 
            $backupSessionRole=$_SESSION['role']; 
            @SessionUtils::createSession($backupSessionEmail, $backupSessionRole); 
            session_write_close();
        }
        return $userModel; 
            
        }
    
    
    public static function deconnexion (){ 
        SessionUtils::endSession(); 
    }
}
 
