<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
<h2 class="page-title">Add Product</h2>
<hr>
	<form class="form-inline" action="create.php" method="POST" style="padding:15px;">
		<label>Product Category</label>
		<select class="chosen-select form-control"  tabindex="2" name="category-code" data-placeholder="Select Product Category" required>
		<option></option>
		<?php  
			$query = "SELECT name, category_code from category ORDER BY name";
			$result = query($query);
			while( $row = fetch($result)) {
				echo "<option value='".$row['category_code']."'>".$row['name']."</option>";
			}
		?>
		</select>
		<br>
				
		<label>Product Name</label>
		<input class="form-control" type="text" name="name" required>
		<br>
		<label>Product price</label>
		<input class="form-control" type="number" name="price" required>
		<br>
		<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Submit</button>
		<a href="display" class="btn btn-info filter-btn"><i class="fa fa-undo"></i>Back</a>
	</form>

<?php include ('inc/footer.php'); ?>	
<?php 
	} else { 
		redirect_to("index"); 

		//this js script is for server
		//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
	} 
?>