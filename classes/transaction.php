<?php
$mysqli = new mysqli("localhost","my_user","my_password","my_db");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// Turn autocommit off
$mysqli -> autocommit(FALSE);

// Insert some values
$mysqli -> query("INSERT INTO Persons (FirstName,LastName,Age)
VALUES ('Peter','Griffin',35)");
$mysqli -> query("INSERT INTO Persons (FirstName,LastName,Age)
VALUES ('Glenn','Quagmire',33)");

// Commit transaction
if (!$mysqli -> commit()) {
  echo "Commit transaction failed";
  exit();
}

// Rollback transaction
$mysqli -> rollback();

$mysqli -> close();
?>