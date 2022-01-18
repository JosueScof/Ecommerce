<?php 
include '../config/connection_db.php';
$employee="";
$prod_name="";
$prod_des="";
$prod_quality="";
$prod_quality1="";
$prod_quantity="";
$prod_quantity1="";
$qnt=0;
$message="";
$date;
$user_id=1;
$prod_des1='';

$unit_price=0;
$amount=0.0;
$customer="";

 $select_pn="SELECT prod_name FROM stock_items";
         $result_sel2=$con->query($select_pn);
         if ($result_sel2->num_rows > 0) {}
 

 $select_emp="SELECT fname FROM account";
         $result_sel1=$con->query($select_emp);
         if ($result_sel1->num_rows > 0){}



$select_pd="SELECT prod_description FROM stock_items";
         $result_sel3=$con->query($select_pd);
         if ($result_sel3->num_rows > 0) {}


$select_pql="SELECT prod_quality FROM stock_items";
         $result_sel4=$con->query($select_pql);
         if ($result_sel4->num_rows > 0) {
         	
         }


  if (isset($_POST["save_in"])) {

  	$prod_quality1=$_POST["quality"];
  	$qnt=$_POST["quantity"];
  	$prod_name=$_POST["prod_name"];
  	$prod_des=$_POST["prod_des"];
  	$employee=$_POST["name_agent"];
  	$customer=$_POST["customer"];


   $select_pqnt="SELECT prod_description,prod_quantity,unit_price FROM stock_items WHERE prod_quality='$prod_quality1'";
   	 $result_sel5=$con->query($select_pqnt);
         if ($result_sel5->num_rows > 0) {// selecting forn the database prod_quantity and unit_price.

         	  while ($row=$result_sel5->fetch_assoc()) {
   				 $prod_des1=$row["prod_description"];
   				$prod_quantity=$row["prod_quantity"];
   				 $unit_price=$row["unit_price"];

  			 }
  	
          }
 // var_dump($prod_quantity);die();
   if($qnt>$prod_quantity){

   	$message="<script>alert('insufficient quantity in  the store')</script>".$con->error;

   }
   elseif($qnt<1){

   	$message="<script>alert('no quantity specified')</script>".$con->error;
   }
   else{
   	 // var_dump($prod_quantity);die();
   $prod_quantity1=$prod_quantity-$qnt;
   $amount=$unit_price*$qnt;
   // echo $amount."  ".$prod_quantity1;

   $select1="SELECT user_id FROM account WHERE fname='$employee'";
         $result_sel7=$con->query($select1);
         if ($result_sel7->num_rows > 0) {
          while ($row7=$result_sel7->fetch_assoc()) {
            $user_id=$row7["user_id"];
            // var_dump($user_id);
            // die();
          }
          
         }

   $upd="UPDATE stock_items SET prod_quantity='$prod_quantity1' WHERE prod_quality='$prod_quality1'";
   $con->query($upd);
   if (isset($_POST["save_in"])) {
	 $sql_in="INSERT INTO `stockout`(  `prod_name`, `prod_description`, `prod_quality`, `prod_quantity`, `amount`, `empl_name`, `user_id`, `selling_date`) VALUES ('$prod_name','$prod_des','$prod_quality1',$qnt,$amount,'$employee',$user_id,NOW())";
	 if ($con->query($sql_in)) {
	 	$message="<script>alert('saved successfully in stockout db')</script>";
	 }
	 else{
	 		$message="<script>alert('failure while saving due to ')</script>".$con->error;
	 }
	}
	

}}
else{
			$message="<script>alert('Please Click on save button after recording dat')</script>";
	}



?>