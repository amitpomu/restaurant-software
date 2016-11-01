<?php require_once ('inc/session.php'); ?>
<?php include("connection.php"); ?>
<?php include ('inc/function.php'); ?>

<?php 

$price = encrypt_decrypt('decrypt',$_GET['val']);
$dt = new DateTime("now", new DateTimeZone('Asia/Kathmandu'));
$date = $dt->format("Y/m/d");
// $date = date("Y/m/d");

$query = "INSERT INTO report_archive (id, report_date, amount) VALUES (null,'{$date}',{$price})";
			$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully cleared report. You can check reports in report history and sales history.');
				
			}else {
				echo "failed";
			}

// $query = "DELETE FROM discount_amount";
$query = "UPDATE discount_amount SET visible = 0 WHERE visible = 1";			
$row = query($query);
			if($row){
				echo "success";
				
			}else {
				echo "failed";
			}

// $query = "DELETE FROM report_cancel";
$query = "UPDATE report_cancel SET visible = 0 WHERE visible = 1";
$row = query($query);
			if($row){
				echo "success";
				
			}else {
				echo "failed";
			}			

// $query = "DELETE FROM report";
$query = "UPDATE report SET visible = 0 WHERE visible = 1";
$row = query($query);
			if($row){
				echo "success";
				redirect_to("report");

				//this js script is for server
				//echo "<script type=\"text/javascript\"> window.location='report.php'</script>";

				// header("location: report.php");
				// exit;
			}else {
				echo "failed";
			}


?>