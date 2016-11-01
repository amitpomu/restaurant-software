<?php require_once ('inc/session.php'); ?>
<?php include("connection.php"); ?>
<?php include ('inc/function.php'); ?>
<?php 

$id = encrypt_decrypt('decrypt',$_GET['val']);
$query = "DELETE FROM discount WHERE id = {$id} LIMIT 1";
$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully deleted.');
				redirect_to("discount-display");

				//this js script is for server
				//echo "<script type=\"text/javascript\"> window.location='discount-display.php'</script>";

				// header("location: index.php");
				// exit;
			}else {
				echo "failed";
			}


?>
