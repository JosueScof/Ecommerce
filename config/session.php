<?php
include"connection_db.php";
session_start();

$login_session=$_SESSION["username"];

if (isset($_POST["logout"])) {
    

    $query= ("SELECT *FROM account WHERE username='$login_session'");
            $result = $con->query($query);
            $row = $result->fetch_assoc();

            $login_session=$row["username"];

            if (!isset($login_session)) {
            	mysqli_close($con);
            	 header("Location:../index.php");
            }

			
}

?>