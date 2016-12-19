<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ProjetLecteur\Auth;

/**
 * Description of AuthUtils
 *
 * @author alexd
 */
class AuthUtils {

    public static function isStrongPassword($wouldBePasswd) {
        $lengthCondition = ( strlen($wouldBePasswd) >= 8 &&
                strlen($wouldBePasswd) <= 35);

        $CharacterDiversityCondition = preg_match( "/[a−z]/" ,$wouldBePasswd)
        && preg_match( "/[A−Z]/" ,$wouldBePasswd)
        && preg_match( "/[0−9]/",$wouldBePasswd) ; 
        return $lengthCondition ;
    }

}
