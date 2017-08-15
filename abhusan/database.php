<?php
/**
 * Created by PhpStorm.
 * User: rnsdk
 * Date: 8/12/2017
 * Time: 12:18 PM
 */
 
 //created variables to set up database connection
 $host= "localhost"; //name of the server
 $dbname = "form";	//name of the database
 $dbuser = "root"; //name of the user
 $dbpass = "";	//password
 
 //connection creation
 $conn = mysqli_connect($host,$dbuser,$dbpass,$dbname);