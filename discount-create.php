<?php require_once ('inc/session.php'); ?>
<?php include("connection.php"); ?>
<?php include ('inc/function.php'); ?>

<?php  
if (isset($_POST['discount-code']) && isset($_POST['discount-percent']) && $_POST['discount-code'] != null && $_POST['discount-percent'] != null ) {
		$code = $_POST['discount-code'];
		$percent = $_POST['discount-percent'];
	
	
			$query = "INSERT INTO discount (id,discount_code,discount_percent) VALUES (null,'{$code}',{$percent})";
			$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully created.');
				redirect_to("discount-display");

				//this js script is for server
				// echo "<script type=\"text/javascript\"> window.location='discount-display.php'</script>";

				// header("location: discount.php");
				// exit;
			}else {
				echo "failed";
			}
	
	} else {
	redirect_to("discount-create");

	//this js script is for server
	// echo "<script type=\"text/javascript\"> window.location='discount-create.php'</script>";

}

?>