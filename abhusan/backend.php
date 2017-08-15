<?php
/**
 * Created by P(hpStorm.
 * User: rnsdk
 * Date: 8/12/2017
 * Time: 12:38 PM
 */
 
 include("database.php")
 
 
 //header("Location: index.php");
 
 //Checking if the form submitted with a value of "submit" .
 if(isset($_POST["submit"]))
	 {
		 //storing the values passed from the form in variables
		$username = $_POST["name"];
		$email = $_POST["email"];
		$contact = $_POST["contact"];
		
		
		//sql query to insert data into the table "test"
		$sqlquery = "insert into test (name,email,contact) values ('$username','$email','$contact')";
		//executes the query
		$sqlexecute = mysqli_query($conn,$sqlquery);
		
		if($sqlexecute)
		{
			header("Location: index.php");
		}
		
		
	 }
	 