<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
<h2 class="page-title">Add Employee</h2>
<hr>
	<form class="form-inline" action="emp-create.php" method="POST" style="padding:15px;">
	
		<label>Employee Name</label>
		<input class="form-control" type="text" name="name" required>
		<label>Date of Birth</label>
		<input class="form-control datepicker" type="text" name="dob" data-date-format="yyyy/mm/dd"  placeholder="yyyy/mm/dd" required>
		<br>		
		<label>Sex</label>
		<select class="form-control" name="sex">
			<option>Male</option>
			<option>Female</option>
		</select>
		<label>Date of Start</label>
		<input class="form-control datepicker" type="text" name="dos" data-date-format="yyyy/mm/dd"  placeholder="yyyy/mm/dd" required>
		<br>		
		<label>Phone</label>
		<input class="form-control" type="text" name="phone" required>
		<label>Email</label>
		<input class="form-control" type="email" name="email" required>
		<br>
		<label>Address</label>
		<input class="form-control" type="text" name="address" required>
		<label>Status</label>
		<select class="form-control" name="status">
			<option>Single</option>
			<option>Married</option>
		</select>
		<br>
		<label>Designation</label>
		<input class="form-control" type="text" name="designation" required>
		<label>Salary</label>
		<input class="form-control" type="number" name="salary" required>
		<br>
		<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Submit</button>
		<a href="employee-display" class="btn btn-info filter-btn"><i class="fa fa-undo"></i>Back</a>
	</form>

<?php include ('inc/footer.php'); ?>	
<?php 
	} else { 
		redirect_to("index"); 

		//this js script is for server
		//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
	} 
?>