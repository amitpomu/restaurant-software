<?php include ('inc/header.php'); ?>

<?php  
$id = encrypt_decrypt('decrypt',$_GET['val']);
$query = "SELECT * FROM user WHERE id = {$id}";
$sel_id = query($query);
if ($row = fetch($sel_id)){
?>

<h2 class="page-title">Edit User</h2>
<hr>
	<form class="form-inline" method="post" action="" style="padding:15px;">
	
		<label>User Name</label>
		<input class="form-control" type="text" name="name" value="<?php echo $row['username']; ?>" required>
		<br>
		<label>Old Password</label>
		<input class="form-control" type="password" name="password" placeholder="password"  required>
		<br>
		<button class="btn btn-success" name="first-form" type="submit"><i class="fa fa-check"></i>Submit</button>
		<a href="users" class="btn btn-info filter-btn"><i class="fa fa-undo"></i>Back</a>
	</form>

<?php if(isset($_POST['first-form']) && isset($_POST['name']) && isset($_POST['password']) && !empty($_POST['name']) && !empty($_POST['password'])){
	$old_password = encrypt_decrypt('encrypt', $_POST['password']);
	$password = $row['hashed_password'];
	if ($old_password == $password) {
?>	
	
	<hr>
	<form class="form-inline" method="post" action="" style="padding:15px;">
		
		<label>New Password</label>
		<input class="form-control" type="password" name="new-password" placeholder="new password" required>
		<br>
		<label>Re-type New Password</label>
		<input class="form-control" type="password" name="retype-new-password" placeholder="re-type new password" required>
		<br>
		<button class="btn btn-success" name="second-form" type="submit"><i class="fa fa-check"></i>Submit</button>
	</form>
<?php
		} else {
			echo "<div class=\"alert alert-danger text-center\" role=\"alert\">Please Insert Correct Username and Password.</div>";
		}
	}	
}	

if(isset($_POST['second-form']) &&  isset($_POST['new-password']) && isset($_POST['retype-new-password']) && !empty($_POST['new-password']) && !empty($_POST['retype-new-password']) ){

	$newpassword = encrypt_decrypt('encrypt', $_POST['new-password']);
	$repassword = encrypt_decrypt('encrypt', $_POST['retype-new-password']);
	if ( $newpassword == $repassword) {
		$query = "UPDATE user SET hashed_password = '{$newpassword}' WHERE id = {$id} ";
		$row = query( $query);
			if($row){
				echo "success";
				success_message('You have successfully updated.');
				redirect_to("users");

				//this js script is for server
				//echo "<script type=\"text/javascript\"> window.location='users.php'</script>";

				// header("location: users.php");
				// exit;
			} else {
				echo "failed";
			}
	} else {
		echo "<div class=\"alert alert-danger text-center\" role=\"alert\">Password did not match.</div>";
	}
} 
?>


<?php include ('inc/footer.php'); ?>	
<?php query_close(); ?>