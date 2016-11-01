<?php 
ob_start();
session_start();

	function logged_in(){
		return isset($_SESSION['user_id']);
	}

	function confirm_logged_in() {
		if (!logged_in()){
			header("location: login");
			exit;

			//this js script is for server
			// echo "<script type=\"text/javascript\"> window.location='login.php'</script>";

		}
	}

?>