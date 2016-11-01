<?php require_once ('inc/session.php'); ?>
<?php include("connection.php"); ?>
<?php include ('inc/function.php'); ?>

<?php  
if (isset($_POST['name']) && isset($_POST['designation']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['salary']) && isset($_POST['dob']) && isset($_POST['dos']) && isset($_POST['sex']) && isset($_POST['email']) && isset($_POST['status']) &&  $_POST['name'] != null && $_POST['designation'] != null && $_POST['phone'] != null && $_POST['address'] != null && $_POST['salary'] != null && !empty($_POST['dob']) && !empty($_POST['dos']) && !empty($_POST['email'])) {
		$name = $_POST['name'];
		$designation = $_POST['designation'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$salary = $_POST['salary'];
		$dob = $_POST['dob'];
		$dos = $_POST['dos'];
		$email = $_POST['email'];
		$sex = $_POST['sex'];
		$status = $_POST['status'];
	
			$query = "INSERT INTO employee (id,name,designation,phone,address,salary,dob,dos,email,sex,status) VALUES (null,'{$name}', '{$designation}', '{$phone}', '{$address}', {$salary}, '{$dob}', '{$dos}', '{$email}', '{$sex}', '{$status}')";
			$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully created.');
				redirect_to("employee-display");

				//this js script is for server
				// echo "<script type=\"text/javascript\"> window.location='employee-display.php'</script>";

				// header("location: employee-display.php");
				// exit;
			}else {
				echo "failed";
			}
	
	} else {
	redirect_to("employee-create");

	//this js script is for server
	// echo "<script type=\"text/javascript\"> window.location='employee-create.php'</script>";
}

?>