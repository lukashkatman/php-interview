<?php
/**
 * Created by PhpStorm.
 * User: rnsdk
 * Date: 8/12/2017
 * Time: 12:38 PM
 */
 
 include('database.php');
 if(isset($_POST['submit'])){
	 $status = false;
	 $name= '';
	 $email = '';
	 $contact = '';
	 if(isset($_POST['name'])){
		$status = TRUE;
		$name = $_POST['name'];
	 }if(isset($_POST['email'])){
		$status = TRUE;
		$email = $_POST['email'];
	 }if(isset($_POST['contact'])){
		$status = TRUE;
		$contact = $_POST['contact'];
	 }
	 $sql = "INSERT INTO ".USER_TABLE." (`name`, `email`, `contact`) values('$name', '$email', '$contact');";
	 
	 $query = mysqli_query($conn, $sql);
	 if($query){
		echo "Success!";
	 }else{
		 echo mysqli_error($conn);
	 }
}
if(isset($_GET['submit'])){
	 $status = false;
	$search = $_GET['search'];
	$sql = "SELECT * FROM `user` WHERE name  LIKE '%$search%';";
}

function show_user(){
	global $conn; 

	$query =  mysqli_query($conn, "SELECT * FROM `user`");
	if($query){
		
		while($row =  mysqli_fetch_assoc($query) ){
			echo "<tr><td>".$row['name']. "</td><td>" .$row['email']."</td><td>".$row['contact']."</td>";
		}
	}
}















