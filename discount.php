<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
<h2 class="page-title">Add Discount</h2>
<hr>
	<form class="form-inline" action="discount-create.php" method="POST" style="padding:15px;">
		
		<label>Discount Code</label>
		<input class="form-control" type="text" name="discount-code" required>
		<br>		
		<label>Discount Percent</label>
		<input class="form-control" type="number" name="discount-percent" required>
		<br>
		
		<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Submit</button>
		<a href="discount-display" class="btn btn-info filter-btn"><i class="fa fa-undo"></i>Back</a>
	</form>

<?php include ('inc/footer.php'); ?>	
<?php 
	} else { 
		redirect_to("index"); 

		//this js script is for server
		//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
	} 
?>