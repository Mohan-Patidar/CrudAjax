<?php
include 'dbcon.php';
$userId = $_POST["id"];
$sql = "SELECT * FROM crud WHERE id = {$userId } ";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
       ?>
          <form id="fupForm" name="form1" method="post" action="javascript:void(0)">
            <div class="form-group">
			<label for="email">Name:</label>
            <input type="text" class="form-control" id="cname"  name="name" value="<?php echo $row['name']; ?>" >
            <input type="hidden" class="form-control" id="edit-id"  value="<?php echo $row['id'] ?>">
		</div>
		<div class="form-group">
			<label for="pwd">Email:</label>
			<input type="email" class="form-control" id="cemail"  name="email" value="<?php echo$row['email']; ?>">
		</div>
		<div class="form-group">
			<label for="pwd">Phone:</label>
			<input type="text" class="form-control" id="cphone"  name="phone" value="<?php echo $row['phone']; ?>">
		</div>
		<div class="form-group" >
            <label for="pwd">City:</label>
            <select name="city" id="ccity" class="form-control">
            <option value="<?php echo $row['city']; ?>"><?php echo $row['city']; ?></option>
				<option value="Delhi">Delhi</option>
				<option value="Mumbai">Mumbai</option>
				<option value="Pune">Pune</option>
         </select>
        </div>
        <input type="submit"  class="btn btn-primary" value="submit" id="edit-submit">
               
		</form>
 <?php          
}else{
      echo "no record found";
}
?>