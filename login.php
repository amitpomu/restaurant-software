<?php require_once('inc/session.php'); ?>
<?php include("connection.php"); ?>
<?php include ('inc/function.php'); ?>
<?php
 if (logged_in()) {
	redirect_to("index");
	} 
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php the_title(); ?></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">	
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container main">
<div class="row">
	<div class="col-sm-4 col-sm-offset-4">
	<h1 class="cursive intro text-center"><?php the_title(); ?></h1>
	<div class="well login text-center">	

		<form class="form-group" action="" method="POST" >
		<input class="form-control hide" type="text" name="gap">
		<h2 class="cursive text-center">Login</h2>
		<br>
		<b><i class="fa fa-flag"></i> Till No.</b> 
		<input class="form-control" type="number" name="till" min="0" max="5" required>
		<br>
		<b><i class="fa fa-user"></i> Username</b> 
		<input class="form-control" type="text" name="username" required>
		<br>
		<b><i class="fa fa-unlock-alt"></i> Password</b>	
		<input class="form-control" type="password" name="password" required>
		<br>	
		<input class="btn btn-primary" type="submit" name="submit" value="Login">
	</form>
	</div>
	
	</div>
</div>
<?php include ('inc/footer.php'); ?>	

<?php  

if (isset($_POST['till']) && isset($_POST['username']) && isset($_POST['password']) && $_POST['till'] != null && $_POST['username'] != null && $_POST['password'] != null && $_POST['gap'] == null){

$till = $_POST['till'];
$username = escape_value($_POST['username']);
$password = escape_value(encrypt_decrypt('encrypt',$_POST['password']));
	if($till <= 5 ){
		$query = "SELECT * FROM user WHERE username = '{$username}' AND hashed_password = '{$password}' LIMIT 1";
		$result = query($query);
			
		if ($result) {
			if( $found_user = fetch($result) ) {
				$_SESSION['user_id'] = $found_user['id'];
				$_SESSION['username'] = $found_user['username'];
				$_SESSION['user_category'] = $found_user['user_category'];
				$_SESSION['till'] = $till;

				redirect_to("index");

				//this js script is for server
				//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
			} else {
				echo "<div class=\"alert alert-danger text-center\" role=\"alert\">Username and Password incorrect!</div>";
			}
			
		} 
	} else {
				echo "<div class=\"alert alert-danger text-center\" role=\"alert\">More than 5 tills are not allowed!</div>";
	}	
	
	// mysqli_close($connnection);  
}
?>