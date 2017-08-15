<?php
/**
 * Created by PhpStorm.
 * User: rnsdk
 * Date: 8/15/2017
 * Time: 2:55 PM
 */

function escape($string){
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}
