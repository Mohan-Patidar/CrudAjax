<?php
	include 'dbcon.php';
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];
	$sql = "INSERT INTO `crud`( `name`, `email`, `phone`, `city`) 
	VALUES ('$name','$email','$phone','$city')";
	if (mysqli_query($conn, $sql)) {
		echo 1;
	} 
	else {
		echo 0;
	}
	mysqli_close($conn);
?>
 
