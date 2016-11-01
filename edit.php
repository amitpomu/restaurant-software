<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
<?php  
$id = encrypt_decrypt('decrypt',$_GET['val']);
$query = "SELECT * FROM subject WHERE id = {$id}";
$sel_id = query($query);
if ($row = fetch($sel_id)){
?>

<h2 class="page-title">Edit Product</h2>

	<form class="form-inline" method="post" action="" style="padding:15px;">
		<label>Product Category</label>
		<!-- <input class="form-control" type="text" name="category-code" value="<?php// echo $row['cat_code']; ?>" required> -->
		<select  class="chosen-select form-control" tabindex="2" name="category-code" >
		<option></option>
			<?php  
				$query = "SELECT name, category_code FROM category";
				$sel_id = query($query);
				while ($val = fetch($sel_id)){
					echo "<option ";
					if($row['cat_code'] == $val['category_code']){ echo "selected"; }
					echo " value ='".$val['category_code']."'>".$val['name']."</option>";
				}	
			?>
		</select>
		<br>
		<label>Name</label>
		<input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>" required>
		<br>
		<label>price</label>
		<input class="form-control" type="text" name="price" value="<?php echo $row['price']; ?>" required>
		<br>
		<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Submit</button>
		<a href="display" class="btn btn-info filter-btn"><i class="fa fa-undo"></i>Back</a>
	</form>


<?php	
}
if(isset($_POST['category-code']) && isset($_POST['name']) && isset($_POST['price']) ){
$id = encrypt_decrypt('decrypt',$_GET['val']);
$category = $_POST['category-code'];
$name = $_POST['name'];
$price = $_POST['price'];

$query = "UPDATE subject SET cat_code = {$category}, name = '{$name}', price = {$price}	WHERE id = {$id}";
	$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully updated.');
				redirect_to("display");

				//this js script is for server
				//echo "<script type=\"text/javascript\"> window.location='display.php'</script>";

				// header("location: index.php");
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