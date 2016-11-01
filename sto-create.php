<?php require_once ('inc/session.php'); ?>
<?php include("connection.php"); ?>
<?php include ('inc/function.php'); ?>

<?php  
if (isset($_POST['category-code']) && isset($_POST['name']) && isset($_POST['qty']) && isset($_POST['unit']) && $_POST['category-code'] != null && $_POST['name'] != null && $_POST['qty'] != null) {
		$category = $_POST['category-code'];
		$name = $_POST['name'];
		$quantity = $_POST['qty'];
		$unit = $_POST['unit'];
	
			$query = "INSERT INTO stock (id,category_code,name,quantity,unit) VALUES (null,{$category},'{$name}',{$quantity},'{$unit}')";
			$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully created.');
				redirect_to("stock-display");

				//this js script is for server
				// echo "<script type=\"text/javascript\"> window.location='stock-display.php'</script>";

				// header("location: stock-display.php");
				// exit;
			}else {
				echo "failed";
			}
	
	} else {
	redirect_to("stock-create");

	//this js script is for server
	// echo "<script type=\"text/javascript\"> window.location='stock-create.php'</script>";
}

?>