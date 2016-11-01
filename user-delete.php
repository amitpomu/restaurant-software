<?php require_once ('inc/session.php'); ?>
<?php include("connection.php"); ?>
<?php include ('inc/function.php'); ?>

<?php 

$id = encrypt_decrypt('decrypt', $_GET['val']);
$query = "DELETE FROM user WHERE id = {$id} LIMIT 1";
$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully deleted.');
				//this js script is for server
				//echo "<script type=\"text/javascript\"> window.location='users.php'</script>";

				redirect_to("users");

				// header("location: users.php");
				// exit;
			}else {
				echo "failed";
			}


?>