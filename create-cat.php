<?php require_once ('inc/session.php'); ?>
<?php include("connection.php"); ?>
<?php include ('inc/function.php'); ?>

<?php  
if (isset($_POST['name']) && isset($_POST['category-code']) && $_POST['name'] != null && $_POST['category-code'] != null) {
		$name = $_POST['name'];
	$code = $_POST['category-code'];
	
			$query = "INSERT INTO category (id,name,category_code) VALUES (null,'{$name}',{$code})";
			$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully created.');
				redirect_to("display-category");

				//this js script is for server
				// echo "<script type=\"text/javascript\"> window.location='display-category.php'</script>";

				// header("location: display.php");
				// exit;
			}else {
				echo "failed";
			}
	
	} else {
	redirect_to("create-category");
	
	//this js script is for server
	// echo "<script type=\"text/javascript\"> window.location='create-category.php'</script>";
}

?>