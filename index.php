<!DOCTYPE html>
<html>
<head>
	<title>Insert data in MySQL database using Ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="error-message" ></div>
<div id="success-message"></div>
<div style="margin: auto;width: 60%;">
	
	<form id="fupForm" name="form1" method="post" action="javascript:void(0)">
		<div class="form-group">
			<label for="email">Name:</label>
			<input type="text" class="form-control" id="name" placeholder="Name" name="name">
		</div>
		<div class="form-group">
			<label for="pwd">Email:</label>
			<input type="email" class="form-control" id="email" placeholder="Email" name="email">
		</div>
		<div class="form-group">
			<label for="pwd">Phone:</label>
			<input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
		</div>
		<div class="form-group" >
			<label for="pwd">City:</label>
			<select name="city" id="city" class="form-control">
				<option value="">Select</option>
				<option value="Delhi">Delhi</option>
				<option value="Mumbai">Mumbai</option>
				<option value="Pune">Pune</option>
			</select>
		</div>
		<input type="button" name="save" class="btn btn-primary" value="submit" id="butsave">
	</form>
   <div id="modal">
    	<div id="modal-form">
			<h2>Edit form</h2>
			<div class="adata">
		
			</div>
		</div>   
   </div>


<div>
	<h2>User Data</h2>	
    <div id="table-data">
	</div>
</div>

    


<script>
 $(document).ready(function(){
    function loadtable(){
            $.ajax({
                url :"load.php",
                type:"Post",
                success:function(data){
                    $("#table-data").html(data);
                }
            });
	}
	loadtable();

	$("#butsave").on("click",function(e){
		e.preventDefault();
		var name = $('#name').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var city = $('#city').val();
		if(name =="" || email =="" || phone =="" || city==""){
			$("#error-message").html('Please fill all the field !').slidedown();
			$("#success-message").slideup();}
		else{
			$.ajax({
					url: "save.php",
					type: "POST",
					data: {
							name: name,
							email: email,
							phone: phone,
							city: city				
							},
					success: function(data){
						if(data==1){
							loadtable();
							$('#fupForm').trigger('reset');
							$("#success-message").html('data inserted').slidedown();
							$("#error-message").slideup();
						}else{
							$("#error-message").html('data can not insert').slidedown();
							$("#success-message").slideup();
						}
					
				}
	});
}
});
	$(document).on("click",".delete-btn",function(){
		if(confirm("Do you really want to delete this record ?")){
		var userId = $(this).data("id");
		var element = this;
	
		$.ajax({
			url: "delete.php",
			type: "POST",
			data: {id : userId},
			success :function(data){
				if(data==1){
					$(element).closest("tr").fadeOut();
				}else{
					$("#error-message").html('cannot delete data').slidedown();
					$("#success-message").slideup();
				}
			}

		});
	}
});

	$(document).on("click",".edit-btn",function(){
		$('#modal').show();
		var userId = $(this).data("eid");
		
		$.ajax({
			url:"update.php",
			type: "POST",
			data: {id : userId},
			success :function(data){
				$("#modal-form .adata").html(data);
			
			}
		});

	});
	$("#close-btn").on("click",function(){
		$('#modal').hide();
	});


	$(document).on("click","#edit-submit",function(){
		var userId = $('#edit-id').val();
		var name = $('#cname').val();
		var email = $('#cemail').val();
		var phone = $('#cphone').val();
		var city = $('#ccity').val();

		$.ajax({
			url: "ajax-update.php",
			type: "POST",
			data: {
					id : userId,
					name: name,
					email: email,
					phone: phone,
					city: city,				
				},
			success: function(data){
				if(data==1){
				$('#modal').hide();
				loadtable();
			}
			}
		});


	});
});



</script>
</body>
</html>
  