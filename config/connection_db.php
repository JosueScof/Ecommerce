<?php 
$servername="localhost";
$UserName="root";
$ServerPassword="";
$db_name="db_inventory";


	$con=new mysqli($servername,$UserName, $ServerPassword,$db_name);
	if ($con) {
		 echo "";
	
				}
	

else{
	echo "connection failed".$e->getMessage();
	}
?>