<?php require_once ('inc/session.php'); ?>
<?php include("connection.php"); ?>
<?php include ('inc/function.php'); ?>
<?php 

$id = encrypt_decrypt('decrypt', $_GET['val']);
$query = "DELETE FROM stock_category WHERE id = {$id} LIMIT 1";
$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully deleted.');
				redirect_to("stock-category-display");

				//this js script is for server
				//echo "<script type=\"text/javascript\"> window.location='stock-category-display.php'</script>";

				// header("location: index.php");
				// exit;
			}else {
				echo "failed";
			}


?>
