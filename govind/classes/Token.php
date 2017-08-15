<?php
/**
 * Created by PhpStorm.
 * User: rnsdk
 * Date: 8/15/2017
 * Time: 2:46 PM
 */
class Token {

    public static function generate() {
        return Session::put(Config::get("session/token_name"), md5(uniqid()));
    }

    public static function check($token) {
        $tokenName = Config::get("session/token_name");
        if (Session::exists($tokenName) && $token === Session::get($tokenName)) {
            Session::delete($tokenName);
            return true;
        }
        return false;
    }

}
