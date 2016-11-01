<?php include ('inc/header.php'); ?>
<?php if(!user_staff() && !user_cook() && !user_manager() ){ ?>
<?php  
$id = encrypt_decrypt('decrypt',$_GET['val']);
$query = "SELECT * FROM employee WHERE id = {$id}";
$sel_id = query($query);
if ($row = fetch($sel_id)){
?>

<h2 class="page-title">Update Employee</h2>
<hr>
	<form class="form-inline" method="post" action="" style="padding:15px;">

		<label>Employee Name</label>
		<input class="form-control" type="text" name="name" value="<?php echo $row['name'] ?>" required>
		<label>Date of Birth</label>
		<input class="form-control datepicker" type="text" name="dob" data-date-format="yyyy/mm/dd"  value="<?php echo $row['dob'] ?>" required>
		<br>		
		<label>Sex</label>
		<select class="form-control" name="sex">
			<option <?php if($row['sex'] == 'Male'){ echo 'selected'; } ?>>Male</option>
			<option <?php if($row['sex'] == 'Female'){ echo 'selected'; } ?>>Female</option>
		</select>
		<label>Date of Start</label>
		<input class="form-control datepicker" type="text" name="dos" data-date-format="yyyy/mm/dd" value="<?php echo $row['dos'] ?>" required>
		<br>		
		<label>Phone</label>
		<input class="form-control" type="text" name="phone" value="<?php echo $row['phone'] ?>" required>
		<label>Email</label>
		<input class="form-control" type="email" name="email" value="<?php echo $row['email'] ?>" required>
		<br>
		<label>Address</label>
		<input class="form-control" type="text" name="address" value="<?php echo $row['address'] ?>" required>
		<label>Status</label>
		<select class="form-control" name="status">
			<option <?php if($row['status'] == 'Single'){ echo 'selected'; } ?>>Single</option>
			<option <?php if($row['status'] == 'Married'){ echo 'selected'; } ?>>Married</option>
		</select>
		<br>
		<label>Designation</label>
		<input class="form-control" type="text" name="designation" value="<?php echo $row['designation'] ?>" required>
		<label>Salary</label>
		<input class="form-control" type="number" name="salary" value="<?php echo $row['salary'] ?>" required>
		<br>
		<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Submit</button>
		<a class="btn btn-info filter-btn" href="employee-display"><i class="fa fa-undo"></i>Back</a>
	</form>

<?php
}

if (isset($_POST['name']) && isset($_POST['designation']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['salary']) && isset($_POST['dob']) && isset($_POST['dos']) && isset($_POST['sex']) && isset($_POST['email']) && isset($_POST['status']) &&  $_POST['name'] != null && $_POST['designation'] != null && $_POST['phone'] != null && $_POST['address'] != null && $_POST['salary'] != null && !empty($_POST['dob']) && !empty($_POST['dos']) && !empty($_POST['email'])) {
		$name = $_POST['name'];
		$designation = $_POST['designation'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$salary = $_POST['salary'];
		$dob = $_POST['dob'];
		$dos = $_POST['dos'];
		$email = $_POST['email'];
		$sex = $_POST['sex'];
		$status = $_POST['status'];

$query = "UPDATE employee SET name = '{$name}',designation = '{$designation}', phone = '{$phone}', address = '{$address}', salary = {$salary}, dob = '{$dob}', dos = '{$dos}', email = '{$email}', sex = '{$sex}', status = '{$status}' WHERE id = {$id}";
	$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully updated.');
				redirect_to("employee-display");

				//this js script is for server
				//echo "<script type=\"text/javascript\"> window.location='employee-display.php'</script>";

				// header("location: employee-display.php");
				// exit;
			}else {
				echo "failed";
			}
}

?>

<?php include ('inc/footer.php'); ?>
<?php query_close(); ?>	
<?php 
	} else { 
		redirect_to("index"); 

		//this js script is for server
		//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
	} 
?>