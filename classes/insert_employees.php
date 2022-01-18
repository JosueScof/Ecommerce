<?php

include"../config/connection_db.php";
	// $employee_id="";
	 $fname1="";
	$lname1="";
	$sex1="";
	$Telephone1="";
	$Duty1="";
	$register_date1="";
	$error="";
	$success="";
	$del="";
	$not_set="";
	




if (isset($_POST["insert_emp"])) {
	
    $employee_id=$_POST["empl_id"];
	$fname=$_POST["Fname"];
	$lname=$_POST["Lname"];
	$sex=$_POST["Sex"];
	$Telephone=$_POST["Telephone"];
	$Duty=$_POST["Duty"];
	if ( !empty($_POST["empl_id"]) && !empty($_POST["Fname"]) && !empty($_POST["Lname"])&& !empty($_POST["Sex"])&& !empty($_POST["Telephone"])&& !empty($_POST["Duty"])) {
		
   $query_ins="INSERT INTO employees(empl_id,first_name, last_name, sexe, telephone, duty, Registration_empl_Date)
    VALUES ($employee_id,'$fname','$lname','$sex','$Telephone','$Duty',NOW())";


   if ($con->query($query_ins)==TRUE) {
   	   $success="<script>alert('inserted successfully!!')</script>";
   	   
   }
    else {
  		
  		$success="<script>alert('not inserted successfully!!')</script>";
   }
	
	}
	else{
		$success="<script>alert('not inserted because some field are empty!!')</script>";
	}
}
elseif (isset($_POST["delete_emp"])) {

	 $employee_id=$_POST["empl_id"];
   $query_del="DELETE FROM employees WHERE empl_id='$employee_id'";
   
   if ($con->query($query_del)==TRUE) {
   	$error="<script>alert('Deletedsuccessfully!!')</script>";
   }
    else {
   $error="<script>alert('id not found!!')</script>".$con->error;
   }
   


	
	}

elseif (isset($_POST["update_emp"])  && !empty($_POST["empl_id"]) ) {
   	
   	 $employee_id=$_POST["empl_id"];
	$fname=$_POST["Fname"];
	$lname=$_POST["Lname"];
	$sex=$_POST["Sex"];
	$Telephone=$_POST["Telephone"];
	$Duty=$_POST["Duty"];

   $query_up="UPDATE employees SET first_name='$fname',last_name='$lname',sexe='$sex',telephone='$Telephone',duty='$Duty',Registration_empl_Date=NOW() WHERE empl_id='$employee_id' ";

   if($con->query($query_up) == TRUE){
   		$success="<script>alert('Updated successfully!!')</script>";
   }
   else{
   		 echo"<script>alert('Not updated!!')</script>".$con->error;
   }

	
}

 else {
	$not_set='Not set!!'.$con->error;
}

 ?>