<?php require_once ('inc/session.php'); ?>
<?php include("connection.php"); ?>
<?php include ('inc/function.php'); ?>

<?php 

if (isset($_GET['val'])) {
	$dt = new DateTime("now", new DateTimeZone('Asia/Kathmandu'));
	$date = $dt->format("Y/m/d");
	$user = $_SESSION['username'];
	$user_id = $_SESSION['user_id'];

	$amount = encrypt_decrypt('decrypt',$_GET['val']);
	$query = "INSERT INTO discount_amount (id,user_id,user,discount_date,visible,amount) VALUES (null, {$user_id}, '{$user}','{$date}',1,{$amount})";
	$row = query($query);
			if($row){
				echo "success";
				
			}else {
				echo "failed";
			}

}

$till = $_SESSION['till'];
$query = "DELETE FROM cart WHERE till = {$till}";
$row = query($query);
			if($row){
				echo "success";
				redirect_to("shop");

				//this js script is for server
				//echo "<script type=\"text/javascript\"> window.location='shop.php'</script>";

				// header("location: report.php");
				// exit;
			}else {
				echo "failed";
			}


?>