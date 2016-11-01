<?php require_once ('inc/session.php'); ?>
<?php include("connection.php"); ?>
<?php include ('inc/function.php'); ?>

<?php  
if (isset($_POST['category-code']) && isset($_POST['name']) && isset($_POST['price']) && $_POST['category-code'] != null && $_POST['name'] != null && $_POST['price'] != null) {
		$category = $_POST['category-code'];
		$name = $_POST['name'];
	$price = $_POST['price'];
	
			$query = "INSERT INTO subject (id,cat_code,name,price) VALUES (null,{$category},'{$name}',{$price})";
			$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully created.');
				redirect_to("display");

				//this js script is for server
				// echo "<script type=\"text/javascript\"> window.location='display.php'</script>";

				// header("location: display.php");
				// exit;
			}else {
				echo "failed";
			}
	
	} else {
	redirect_to("create-product");

	//this js script is for server
	// echo "<script type=\"text/javascript\"> window.location='create-product.php'</script>";
}

?>