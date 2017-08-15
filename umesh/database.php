<?php
/**
 * Created by PhpStorm.
 * User: rnsdk
 * Date: 8/12/2017
 * Time: 12:18 PM
 */
 
 
 
 $username ="root";
 $password ="";
 $servername = "localhost";
 $dbname= "umesh";
 
 //connecting to database
 $conn = mysqli_connect($servername,$username,$password,$dbname);
 
 if($conn) {
	 echo "Connected succesfully";
 } else
	 echo ("Not connected".mysqli_connect_error);