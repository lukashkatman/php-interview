<?php
/**
 * Created by PhpStorm.
 * User: rnsdk
 * Date: 8/12/2017
 * Time: 12:38 PM
 */
// header("Location: index.php"

include "database.php";

$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$contact = mysqli_real_escape_string($conn, $_REQUEST['contact']);

//
$query = ("insert into table1 (name, email, contact) values ('$name','$email','$contact') ");

if(mysqli_query($conn, $query)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// close connection
mysqli_close($conn);