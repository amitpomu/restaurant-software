<?php include ('inc/header.php'); ?>
<?php if(!user_staff() ){ ?>
<?php  
$id = encrypt_decrypt('decrypt',$_GET['val']);
$query = "SELECT * FROM stock WHERE id = {$id}";
$sel_id = query($query);
if ($row = fetch($sel_id)){
?>

<h2 class="page-title">Update Stock</h2>
<hr>
	<form class="form-inline" method="post" action="" style="padding:15px;">

		<label>Stock Category</label>
		<!-- <input class="form-control" type="text" name="category-code" value="<?php //echo $row['category_code']; ?>" required> -->
		<select class="chosen-select form-control" tabindex="2" name="category-code" >
		<option></option>
			<?php  
				$query = "SELECT name, category_code FROM stock_category";
				$sel_id = query($query);
				while ($val = fetch($sel_id)){
					echo "<option ";
					if($row['category_code'] == $val['category_code']){ echo "selected"; }
					echo " value ='".$val['category_code']."'>".$val['name']."</option>";
				}	
			?>
		</select>
		<br>
		<label>Name</label>
		<input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>" required>
		<br>
		<label>Quantity</label>
		<input class="form-control" type="text" name="qty" value="<?php echo $row['quantity']; ?>" required>
		<br>
		<label>Unit</label>
		<select class="form-control" name="unit">
			<option <?php if($row['unit'] == 'kg'){echo 'selected';} ?>>kg</option>
			<option <?php if($row['unit'] == 'gram'){echo 'selected';} ?>>gram</option>
			<option <?php if($row['unit'] == 'piece'){echo 'selected';} ?>>piece</option>
		</select>
		<br>
		<label>Note</label>
		<textarea class="form-control" name="note" required></textarea>
		<br><br>
		<button class="btn btn-success" type="submit"><i class="fa fa-check"></i>Submit</button>
		<a href="stock-display" class="btn btn-info filter-btn"><i class="fa fa-undo"></i>Back</a>
	</form>

<?php
}
// category code is not visible for cook so isset to category code is not needed
if(isset($_POST['category-code']) && isset($_POST['name']) && isset($_POST['qty']) && isset($_POST['unit']) && isset($_POST['note']) && !empty($_POST['note']) ){
$id = encrypt_decrypt('decrypt',$_GET['val']);
$category = $_POST['category-code'];
$name = $_POST['name'];
$quantity = $_POST['qty'];
$unit = $_POST['unit'];
$note = $_POST['note'];
$user = $_SESSION['user_category'];

$dt = new DateTime("now", new DateTimeZone('Asia/Kathmandu'));
$date = $dt->format('Y/m/d');	

$query = "UPDATE stock SET stock_date = '{$date}',user = '{$user}', name = '{$name}', quantity = {$quantity}, category_code = {$category}, unit = '{$unit}' , note = '{$note}' WHERE id = {$id}";
	$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully updated.');
				redirect_to("stock-display");

				//this js script is for server
				//echo "<script type=\"text/javascript\"> window.location='stock-display.php'</script>";

				// header("location: stock-display.php");
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