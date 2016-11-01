<?php include ('inc/header.php'); ?>
<?php if(!user_staff() && !user_cook() ){ ?>

<?php  
$id = encrypt_decrypt('decrypt',$_GET['val']);
$query = "SELECT * FROM employee WHERE id = {$id}";
$sel_id = query($query);
if ($row = fetch($sel_id)){
?>

<h2 class="page-title">Employee Details</h2>
<hr>
		<div class="row">
			<div class="col-xs-2"><h4 class="text-primary">Employee Name:</h4></div> 
			<div class="col-xs-3"><h4 class="text-warning"><?php echo $row['name'] ?></h4></div>
		</div>
		<div class="row">
			<div class="col-xs-2"><h4 class="text-primary">Date of Birth:</h4></div> 
			<div class="col-xs-3"><h4 class="text-warning"><?php echo $row['dob'] ?></h4></div>
		</div>		
		<div class="row">
			<div class="col-xs-2"><h4 class="text-primary">Sex:</h4></div> 
			<div class="col-xs-3"><h4 class="text-warning"><?php echo $row['sex'] ?></h4></div>
		</div>
		<div class="row">
			<div class="col-xs-2"><h4 class="text-primary">Date of Start:</h4></div> 
			<div class="col-xs-3"><h4 class="text-warning"><?php echo $row['dos'] ?></h4></div>
		</div>		
		<div class="row">
			<div class="col-xs-2"><h4 class="text-primary">Phone:</h4></div> 
			<div class="col-xs-3"><h4 class="text-warning"><?php echo $row['phone'] ?></h4></div>
		</div>
		<div class="row">
			<div class="col-xs-2"><h4 class="text-primary">Email:</h4></div> 
			<div class="col-xs-3"><h4 class="text-warning"><?php echo $row['email'] ?></h4></div>
		</div>
		<div class="row">
			<div class="col-xs-2"><h4 class="text-primary">Address:</h4></div> 
			<div class="col-xs-3"><h4 class="text-warning"><?php echo $row['address'] ?></h4></div>
		</div>
		<div class="row">
			<div class="col-xs-2"><h4 class="text-primary">Status:</h4></div> 
			<div class="col-xs-3"><h4 class="text-warning"><?php echo $row['status'] ?></h4></div>
		</div>
		<div class="row">
			<div class="col-xs-2"><h4 class="text-primary">Designation:</h4></div> 
			<div class="col-xs-3"><h4 class="text-warning"><?php echo $row['designation'] ?></h4></div>
		</div>
		<div class="row">
			<div class="col-xs-2"><h4 class="text-primary">Salary:</h4></div> 
			<div class="col-xs-3"><h4 class="text-warning">Rs. <?php echo $row['salary'] ?></h4></div>
		</div>
		<hr>
	<div class="row">
		<div class="col-xs-12">
			<?php if(!user_manager()){ ?><a class="btn btn-warning" href="employee-edit.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>"><i class="fa fa-pencil"></i>Edit</a><?php } ?>
			<a class="btn btn-info" href="employee-display"><i class="fa fa-undo"></i>Back</a>
		</div>
	</div>
<?php } ?>

<?php include ('inc/footer.php'); ?>
<?php query_close(); ?>	
<?php 
	} else { 
		redirect_to("index"); 

		//this js script is for server
		//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
	} 
?>