<?php require_once('inc/session.php'); ?>
<?php confirm_logged_in(); ?>
<?php include("connection.php"); ?>
<?php include("inc/function.php"); ?>
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
	<link rel="stylesheet" type="text/css" href="css/chosen.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="container main">
<div class="row">
<h2 class="logo"><?php the_title(); ?> 
	<?php the_notice(); ?>
	<small class="pull-right"><?php include('nepali-time.php'); ?></small>
</h2>

	<div class="col-sm-12 content-nomenu">
<a href="index" class="btn btn-info back-home pull-right" style="margin-top:15px;">Home</a>
