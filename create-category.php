<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
<h2 class="page-title">Add Product Category</h2>
<hr>
	<form class="form-inline" action="create-cat.php" method="POST" style="padding:15px;">
		
		
		<label>Category Name</label>
		<input class="form-control" type="text" name="name" required>
		<br>
		<label>Category Code</label>	
		<input class="form-control" type="number" name="category-code" required>
		<br>
		<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Submit</button>
		<a href="display-category" class="btn btn-info filter-btn"><i class="fa fa-undo"></i>Back</a>
	</form>

<?php include ('inc/footer.php'); ?>	
<?php 
	} else { 
		redirect_to("index"); 

		//this js script is for server
		//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
	} 
?>