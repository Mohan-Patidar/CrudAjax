<?php
    include 'dbcon.php';
	$userId = $_POST["id"];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
    $city=$_POST['city'];
 
    $sql ="UPDATE `crud` 
	SET `name`='$name',
	`email`='$email',
	`phone`='$phone',
	`city`='$city' WHERE id=$userId";

  
if (mysqli_query($conn, $sql)) {
		echo 1;
	} 
	else {
		echo 0;
	}
	mysqli_close($conn);
?>
 
