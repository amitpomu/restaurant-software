<?php require_once ('inc/session.php'); ?>
<?php include("connection.php"); ?>
<?php include ('inc/function.php'); ?>

<?php  
if (isset($_POST['name']) && isset($_POST['year']) && isset($_POST['month']) && isset($_POST['salary']) && isset($_POST['allowance']) && !empty($_POST['allowance']) && $_POST['name'] != null && $_POST['year'] != null && $_POST['month'] != null && $_POST['salary'] != null) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$year = $_POST['year'];
		$month = $_POST['month'];
		$salary = $_POST['salary'];
		$allowance = $_POST['allowance'];
		$month_id = month_id($month);
		if (isset($_POST['note']) && !empty($_POST['note'])){
			$note = $_POST['note'];
		} else {
			$note = 'salary Paid!';
		}
		
	
			$query = "INSERT INTO salary (id,emp_id,name,salary_year,salary_month,salary,month_id,allowance,note) VALUES (null,{$id},'{$name}',{$year},'{$month}', {$salary}, {$month_id}, {$allowance}, '{$note}')";
			$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully created.');
				redirect_to("salary-display");

				//this js script is for server
				// echo "<script type=\"text/javascript\"> window.location='salary-display.php'</script>";

				// header("location: salary-display.php");
				// exit;
			}else {
				echo "failed";
			}
	
	} else {
	redirect_to("salary-create");

	//this js script is for server
	// echo "<script type=\"text/javascript\"> window.location='create-product.php'</script>";
}

?>