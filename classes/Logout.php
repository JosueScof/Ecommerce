 <?php 
 include '../config/connection_db.php';
session_start();
// $log="";
// $_SESSION["username"];
if (isset($_POST["logout1"])) {
	session_unset();
     session_destroy();
 header("Location:../index.php");
 // $log="logged out successfully";
}
elseif (!$_SESSION["username"]) {
	 header("Location:../index.php");
}
else{
    // $log="<script>alert('not loged in ')</script>";
}
$con->close();

?>