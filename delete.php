<?php
    include 'dbcon.php';
    
	$userId = $_POST["id"];
	
$sql = "DELETE FROM `crud` WHERE id = {$userId } ";
	if (mysqli_query($conn, $sql)) {
		echo 1;
	} 
	else {
		echo 0;
	}
	mysqli_close($conn);
?>
 
