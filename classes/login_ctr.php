<?php
 
session_start();
include '../config/connection_db.php';
$error="";
$notify="";
if(isset($_POST["connect"]) && !empty($_POST["username"]) && !empty($_POST["password"])){

			 $username=$_POST["username"];
			$password=$_POST["password"];

			$query= ("SELECT *FROM account WHERE username='$username' AND password='$password'");
            $result = $con->query($query);

			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {
			   
				 	
			  
			  if ($row["Role"]=="Admin" && $username==$row["username"] &&$password==$row["password"]) {
			  	$_SESSION["username"]=$row["username"];
			  	$_SESSION["id"]=$row["user_id"];
			  header("Location:../views/container.php");
			  }
			  elseif($row["Role"]=="Normal" && $username==$row["username"] &&$password==$row["password"]){
			  	$_SESSION["username"]=$row["username"];
			  	$_SESSION["id"]=$row["user_id"];
			  	header("Location:../views/container_user.php");
			  }
			  else{
			  		echo"<script>alert('The username or password is incorrect')</script>";
			  }

			  }
			}
			  
			else {
			  echo"<script> confirm(' user does not exist')</script>".$con->error;          
			   header("Location:../index.php");
			   }
			

		}
else{

    $error=' you press the button or enter something the fields'.$con->error;
   // header("Location:../index.php?error= $error");
}
$con->close();

?>