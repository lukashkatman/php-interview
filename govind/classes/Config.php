<?php
/**
 * Created by PhpStorm.
 * User: rnsdk
 * Date: 8/15/2017
 * Time: 2:45 PM
 */

class Config {

    public static function get($path = NULL) {
        if ($path) {
            $config = $GLOBALS['config'];
            $path = explode('/', $path);

            foreach ($path as $key) {

                if (isset($config[$key])) {

                    $config = $config[$key];
                }
            }
            return $config;
        }
        return FALSE;
    }

}
