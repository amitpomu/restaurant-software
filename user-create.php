<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
	<h2 class="page-title">Create User</h2>
	<hr>
	<form class="form-inline" action="" method="POST" style="padding:15px;">
	
		<label>User Type</label>
		<select class="form-control" name="user-type">
		<option>Admin</option>
		<option>Manager</option>
		<option>Staff</option>
		<option>Cook</option>
		</select>
		<br>
		<label>Username</label>
		<input class="form-control" type="text" name="username" required>
		<br>
		<label>Password</label>
		<input class="form-control" type="password" name="password" required>
		<br>
		<label>Re-type Password</label>
		<input class="form-control" type="password" name="re-password" required>
		<br>			
		<button class="btn btn-success" type="submit"><i class="fa fa-check"></i>Create</button>
		<a href="users" class="btn btn-info filter-btn"><i class="fa fa-undo"></i>Back</a>
	</form>



<?php  

if (isset($_POST['user-type']) && isset($_POST['username']) && isset($_POST['password']) && $_POST['user-type'] != null && $_POST['username'] != null && $_POST['username'] != null){
$usertype = strtolower($_POST['user-type']);
$username = $_POST['username'];
$password = encrypt_decrypt('encrypt', $_POST['password']);
$re_password = encrypt_decrypt('encrypt', $_POST['re-password']);




	if ($password == $re_password) {
			$query = "INSERT INTO user (id,username,hashed_password,user_category) VALUES (null,'{$username}','{$password}','{$usertype}')";
			$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully created.');
				redirect_to("users");

				//this js script is for server
				// echo "<script type=\"text/javascript\"> window.location='users.php'</script>";

				// header("location: users.php");
				// exit;
			}else {
				echo "failed";
			}
		} else {
		echo "<div class=\"alert alert-danger text-center\" role=\"alert\">Password not matched.</div>";

	}
	// mysqli_close($connnection);  
}
?>	
<?php 
	} else { 
		redirect_to("index"); 

		//this js script is for server
		//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
	} 
?>
<?php include ('inc/footer.php'); ?>