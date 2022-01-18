<?php 
include"../config/connection_db.php";

$prod_name="";
 $prod_descri="";
$quality="";
$quantity="";
$price="";
$message="";
$answer="";
$user_id=1;

		
		$message="";
		 $answer="";
		 $select="SELECT fname,lname,user_id FROM account";
         $result_sel=$con->query($select);
         if ($result_sel->num_rows > 0) {

         	
         }


if (isset($_POST["insert_btn"])&&!empty($_POST["prod_name"])&&!empty($_POST["prod_descr"])&&!empty($_POST["quality"])
	&&!empty($_POST["price"])&& !empty($_POST["answer"]))  {
        $prod_name=$_POST["prod_name"];
		$prod_descri=$_POST["prod_descr"];
		$quality=$_POST["quality"];
		$quantity=$_POST["quantity"];
		$price=$_POST["price"];
		$answer=$_POST["answer"];
		 
		$select1="SELECT user_id FROM account WHERE fname='$answer'";
         $result_sel7=$con->query($select1);
         if ($result_sel->num_rows > 0) {
         	while ($row7=$result_sel7->fetch_assoc()) {
         		$user_id=$row7["user_id"];
         	
         	}
         	
         }
        
		$sql_insert="INSERT INTO stock_items(prod_name,prod_description,prod_quality,prod_quantity,unit_price,Empl_name,user_id,Register_date)
			 VALUES ('$prod_name','$prod_descri','$quality',$quantity,$price,'$answer',$user_id,NOW())";
		 
		if($con->query($sql_insert)==TRUE){
			$message="<p class='w3-text-red'>inserted successfully!!</p>";
		}
		else{
			$message="</script>alert('Fail to inserted!!')</script>".$con->error;
		}
	
		} 

elseif (isset($_POST["delete_btn"])) {// delete record on stock_items.
	$quality=$_POST["quality"];
	// var_dump($quality);
	// die();
	$delete_rec="DELETE FROM stock_items WHERE prod_quality='$quality'";
	// var_dump($delete_rec);
	// die();
	if ($con->query($delete_rec)==TRUE) {
		$message="<script>alert('Deleted successfully!!')</script>";
		}
		else{
        $message="<script>alert( 'record not found!!')</script>".$con->error;
		}
		}

 elseif (isset($_POST["update_btn"])&&!empty($_POST["quality"])) {
 		 $prod_name=$_POST["prod_name"];
		$prod_descri=$_POST["prod_descr"];
		$quality=$_POST["quality"];
		$quantity=$_POST["quantity"];
		$price=$_POST["price"];
		$answer=$_POST["answer"];
        
		$update_insert="UPDATE  stock_items SET prod_name='$prod_name',prod_description='$prod_descri',prod_quality='$quality',prod_quantity='$quantity',unit_price='$price',Empl_name='$answer',Register_date=NOW() WHERE prod_quality='$quality'";
			
		if($con->query($update_insert)==TRUE){
			$message="<script>alert('Updated Successfully!!')</script>";
		}
		else{
			$message="<script>alert('record to update is not found!!')</script>".$con->error;
		}
 		}
else {
	$message="<p class='w3-text-red '>Please insert data and press any button!!</p>".$con->error;
	}

?>