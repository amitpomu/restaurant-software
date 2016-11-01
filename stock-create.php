<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
<h2 class="page-title">Add Stock</h2>
<hr>
	<form class="form-inline" action="sto-create.php" method="POST" style="padding:15px;">
		<label>Stock Category</label>
		<select class="chosen-select form-control" tabindex="2" name="category-code" data-placeholder="Select Stock Category" required>
		<option></option>
		<?php  
			$query = "SELECT name, category_code from stock_category ORDER BY name";
			$sel_query = query($query);
			while( $row = fetch($sel_query)) {
				echo "<option value='".$row['category_code']."'>".$row['name']."</option>";
			}
		?>
		</select>
		<br>	
		<label>Stock Name</label>
		<input class="form-control" type="text" name="name" required>
		<br>
		<label>Stock Quantity</label>
		<input class="form-control" type="text" name="qty" required>
		<br>
		<label>Select Unit</label>
		<select class="form-control" name="unit">
			<option>kg</option>
			<option>gram</option>
			<option>piece</option>
		</select>
		<br>
		<button class="btn btn-success" type="submit"><i class="fa fa-check"></i>Submit</button>
		<a href="stock-display" class="btn btn-info filter-btn"><i class="fa fa-undo"></i>Back</a>
	</form>

<?php include ('inc/footer.php'); ?>	
<?php 
	} else { 
		redirect_to("index"); 

		//this js script is for server
		//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
	} 
?>