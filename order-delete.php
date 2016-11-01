<?php require_once ('inc/session.php'); ?>
<?php include("connection.php"); ?>
<?php include ('inc/function.php'); ?>

<?php 

$id = encrypt_decrypt('decrypt', $_GET['val']);
$code = encrypt_decrypt('decrypt', $_GET['val2']);
$dt = new DateTime("now", new DateTimeZone('Asia/Kathmandu'));
$to_time = $dt->format('H:i:s');

$query = "UPDATE report SET to_time = '{$to_time}' WHERE code = {$code} AND visible = 1";
$row = query($query);
			if($row){
				echo "success";
				
			}else {
				echo "failed";
			}



$query = "DELETE FROM shop WHERE id = {$id} LIMIT 1";
$row = query($query);
			if($row){
				echo "success";
				redirect_to("order-display");

				//this js script is for server
				//echo "<script type=\"text/javascript\"> window.location='order-display.php'</script>";

				// header("location: order-display.php");
				// exit;
			}else {
				echo "failed";
			}


?>