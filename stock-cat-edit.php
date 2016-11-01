<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
<?php  
$id = encrypt_decrypt('decrypt', $_GET['val']);
$query = "SELECT * FROM stock_category WHERE id = {$id}";
$sel_id = query($query);
if ($row = fetch($sel_id)){
?>

<h2 class="page-title">Edit Stock Category</h2>
<hr>
	<form class="form-inline" method="post" action="" style="padding:15px;">
		
		<label>Stock Category Name</label>
		<input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>" required>
		<br>
		<label>Stock Category Code</label>	
		<input class="form-control" type="text" name="category-code" value="<?php echo $row['category_code']; ?>" required>
		<br>
		<button class="btn btn-success" type="submit"><i class="fa fa-check"></i>Submit</button>
		<a href="stock-category-display" class="btn btn-info filter-btn"><i class="fa fa-undo"></i>Back</a>
	</form>


<?php	
}
if(isset($_POST['name']) && isset($_POST['category-code']) && !empty($_POST['name']) && !empty($_POST['category-code']) ){
$id = encrypt_decrypt('decrypt', $_GET['val']);
$name = $_POST['name'];
$code = $_POST['category-code'];

$query = "UPDATE stock_category SET name = '{$name}', category_code = {$code}	WHERE id = {$id}";
	$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully updated.');
				redirect_to("stock-category-display");

				//this js script is for server
				//echo "<script type=\"text/javascript\"> window.location='stock-category-display.php'</script>";

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