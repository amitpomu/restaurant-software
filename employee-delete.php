<?php require_once ('inc/session.php'); ?>
<?php include("connection.php"); ?>
<?php include ('inc/function.php'); ?>
<?php 

$id = encrypt_decrypt('decrypt',$_GET['val']);

$query = "DELETE FROM salary WHERE emp_id = {$id}";
$row = query($query);
			if($row){
				echo "success";
			}else {
				echo "failed";
			}

$query = "DELETE FROM employee WHERE id = {$id} LIMIT 1";
$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully deleted.');
				redirect_to("employee-display");

				//this js script is for server
				//echo "<script type=\"text/javascript\"> window.location='employee-display.php'</script>";

				// header("location: employee-display.php");
				// exit;
			}else {
				echo "failed";
			}


?>
