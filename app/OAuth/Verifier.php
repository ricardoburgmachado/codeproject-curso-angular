<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 20/05/16
 * Time: 08:48
 */

namespace CodeProject\OAuth;



class Verifier {

    public function ferify($username, $password){

        $credentials= [
            'email'=> $username,
            'password'=>$password
        ];

        if(Auth::once($credentials)){
            return Auth::user()->id;
        }

        return false;
    }

}