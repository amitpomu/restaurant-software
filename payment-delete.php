<?php require_once ('inc/session.php'); ?>
<?php include("connection.php"); ?>
<?php include ('inc/function.php'); ?>

<?php 

$id = encrypt_decrypt('decrypt', $_GET['val']);
$dt = new DateTime("now", new DateTimeZone('Asia/Kathmandu'));
$from_time = $dt->format('H:i:s');
$date = $dt->format("Y/m/d");
$user = $_SESSION['username'];
$till = $_SESSION['till'];
$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM cart WHERE id = {$id} LIMIT 1";
$sel_query = query($query);
	if($row = fetch($sel_query)) {
		$code = $row['code'];
		$quantity = $row['quantity'];
		$name = $row['name'];
		$price = $row['price'];
		$total = $row['total_price'];
	}

$query = "INSERT INTO report_cancel (id,user_id, user, cancel_date, visible, name, price, code, quantity, total_price) VALUES (null, {$user_id}, '{$user}', '{$date}', 1, '{$name}', {$price}, {$code}, {$quantity}, {$total})";
$row = query($query);
			if($row){
				echo "success";				
			}else {
				echo "failed";
			}

$query = "DELETE FROM report WHERE code = {$code} AND visible = 1 LIMIT 1";
$row = query($query);
			if($row){
				echo "success";				
			}else {
				echo "failed";
			}

$query = "DELETE FROM shop WHERE code = {$code} LIMIT 1";
$row = query($query);
			if($row){
				echo "success";				
			}else {
				echo "failed";
			}

$query = "DELETE FROM cart WHERE id = {$id} LIMIT 1";
$row = query($query);
			if($row){
				echo "success";
				success_message('You have successfully deleted.');
				redirect_to("payment");

				//this js script is for server
				//echo "<script type=\"text/javascript\"> window.location='order-display.php'</script>";

				// header("location: order-display.php");
				// exit;
			}else {
				echo "failed";
			}


?>