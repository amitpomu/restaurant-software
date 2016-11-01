<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
<?php  
$id = encrypt_decrypt('decrypt',$_GET['val']);
$query = "SELECT * FROM discount WHERE id = {$id}";
$sel_id = query($query);
if ($row = fetch($sel_id)){
?>

<h2 class="page-title">Edit Discount</h2>
<hr>

	<form class="form-inline" method="post" action="" style="padding:15px;">
		<label>Discount Code</label>
		<input class="form-control" type="text" name="discount-code" value="<?php echo $row['discount_code']; ?>" required>
		<br>
		<label>Discount Percent</label>
		<input class="form-control" type="number" name="discount-percent" value="<?php echo $row['discount_percent']; ?>" required>
		
		<br><br>	
		<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Submit</button>
		<a href="discount-display" class="btn btn-info filter-btn"><i class="fa fa-undo"></i>Back</a>
	</form>


<?php	
}
if(isset($_POST['discount-code']) && isset($_POST['discount-percent']) ){
$id = encrypt_decrypt('decrypt',$_GET['val']);
$discount = $_POST['discount-code'];
$percent = $_POST['discount-percent'];

$query = "UPDATE discount SET discount_code = '{$discount}',  discount_percent = {$percent}	WHERE id = {$id}";
	$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully updated.');
				redirect_to("discount-display");

				//this js script is for server
				//echo "<script type=\"text/javascript\"> window.location='discount-display.php'</script>";

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