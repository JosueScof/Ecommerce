<?php

  include"../config/connection_db.php";
   
 
  $fname1="";
 $lname1="";
 $username="";
 $password="";

 $fl="";
 $ln="";
 $sn="";
 $pw="";
$message="";
$session=$_SESSION['username'];	

   $query= ("SELECT *FROM account WHERE username='$session'");
   $result = $con->query($query);
			
	if($result->num_rows>0){
         while($row = $result->fetch_assoc()) {
  
			 $fname1=$row["fname"];
			 $lname1=$row["lname"];
			 $username=$row["username"];
			 $password=$row["password"];
              $photo1=$row["photo"];
			 $_SESSION["id"]=$row["user_id"];;
			 
			  	
				}
			}

if (isset($_POST["update_prof"])) {
	
  $fl=$_POST["fname"];
 $ln=$_POST["lname"];
 $sn=$_POST["username1"];
 $pw=$_POST["password1"];
 
 $upd="UPDATE `account` SET `fname`='$fl',`lname`='$ln',`username`='$sn',`password`='$pw',`Registration_account_Date`=NOW() WHERE user_id={$_SESSION["id"]}";
 if($con->query($upd)==TRUE){
			$message="<script>alert('Updated Successfully!!')</script>";
		}
		else{
			$message="<script>alert('record to update is not found!!')</script>".$con->error;
		}
}

?>