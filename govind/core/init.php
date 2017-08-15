<?php
/**
 * Created by PhpStorm.
 * User: rnsdk
 * Date: 8/15/2017
 * Time: 2:50 PM
 */
session_start();
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'phptest',
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => '604800',
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    ),
    'site' => array(
        'name' => 'Guest Login-Registration System',
        'slogan' => 'Register your account instantly',
        'version' => 'Beta Release',
        'copy' => 'Developed by: Ronash Dhakal | Project: Guest Registration System | E-Commerce | DIT-III/II',
    ),
);
spl_autoload_register(function($class) {
    require_once 'classes/' . $class . '.php';
});

require_once 'functions/sanitize.php';

if (Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
    $hash = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck = DB::getIntance()->get('user_session', array('hash', '=', $hash));
    if ($hashCheck->count()) {
        $user = new User($hashCheck->first()->user_id);
        $user->fast_login();
    }
}