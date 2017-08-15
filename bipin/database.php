<?php
/**
 * Created by PhpStorm.
 * User: rnsdk
 * Date: 8/12/2017
 * Time: 12:18 PM
 */
 CONST host = 'localhost';
 CONST username = 'root';
 CONST password = '';
 CONST port	= '';
 CONST DB	= 'bipin';
 CONST USER_TABLE = 'user';
 $conn = mysqli_connect(host, username, password, DB)OR die('error in database connection');
 
 $sql = "CREATE ".USER_TABLE ;
 
 