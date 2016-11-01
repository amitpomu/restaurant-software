<?php require_once('inc/session.php'); ?>
<?php confirm_logged_in(); ?>
<?php include("connection.php"); ?>
<?php include('inc/function.php'); ?>
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
	<link rel="stylesheet" type="text/css" href="css/datepicker.css">
	<link rel="stylesheet" type="text/css" href="css/chosen.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

<div class="container">
<div class="row">
<h2 class="logo"><?php the_title(); ?>
	<?php the_notice(); ?> 
	<small class="pull-right"><?php include('nepali-time.php'); ?></small>
</h2>
<div class="col-xs-2">
<div id="main" class="menu">
	<ul class="list-group">

	<li class="list-group-item"><a href="index"><i class="fa fa-home"></i> Home</a></li>

	<?php if(!user_cook() ){ ?><li class="list-group-item"><a href="shop"><i class="fa fa-shopping-cart"></i> Take Order</a></li><?php } ?>
	<?php if(!user_cook() ){ ?><li class="list-group-item"><a href="payment"><i class="fa fa-credit-card"></i> Payment</a></li><?php } ?>
	<?php if(!user_cook() ){ ?><li class="list-group-item"><a href="payment-customer-view"><i class="fa fa-eye"></i> Customer Payment View</a></li><?php } ?>	
	
	<?php if(!user_staff() ){ ?><li class="list-group-item"><a href="order-display"><i class="fa fa-hand-o-right"></i> Order Display</a></li><?php } ?>
	
	<!-- report dropdown -->
	<?php if( !user_staff() && !user_cook() ){ ?>
	<li class="list-group-item"><p id="reports"><i class="fa fa-area-chart"></i> Report <i class="fa fa-angle-down"></i></p></li>
	<div id="report-list">
		<li class="list-group-item"><a href="report"><i class="fa fa-file-text"></i> Daily Report</a></li>
		<li class="list-group-item"><a href="report-sales"><i class="fa fa-history"></i> Sales Report</a></li>
		<li class="list-group-item"><a href="report-employee-sales"><i class="fa fa-heartbeat"></i> Employee Sales Report</a></li>
		<li class="list-group-item"><a href="report-cancel"><i class="fa fa-ban"></i> Cancel Report</a></li>
		<li class="list-group-item"><a href="report-meal"><i class="fa fa-paw"></i> Employee Meal Report</a></li>
		<?php if(!user_manager()){ ?>
		<li class="list-group-item"><a href="report-archive"><i class="fa fa-calendar"></i> Report History</a></li>
		<?php } ?>
	</div>	
	<?php } ?>

	<!-- products dropdown -->
	<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
	<li class="list-group-item"><p id="products"><i class="fa fa-th-large"></i> Product <i class="fa fa-angle-down"></i></p></li>
	<div id="product-list">
      <li class="list-group-item"><a href="display"><i class="fa fa-archive"></i> Products</a></li>
      <li class="list-group-item"><a href="display-category"><i class="fa fa-archive"></i> Product Category</a></li>
	</div>
	<?php } ?>

	<!-- stocks dropdown -->
	<?php if( !user_staff() ){ ?>
	<li class="list-group-item"><p id="stocks"><i class="fa fa-bar-chart"></i> Stock <i class="fa fa-angle-down"></i></p></li>
	<div id="stock-list">
      <li class="list-group-item"><a href="stock-display"><i class="fa fa-archive"></i> Stocks</a></li>
      <?php if(!user_cook() && !user_manager() ){ ?><li class="list-group-item"><a href="stock-category-display"><i class="fa fa-archive"></i> Stock Category</a></li><?php } ?>
	</div>
	<?php } ?>

	<!-- discount dropdown -->
	<?php if( !user_staff() && !user_cook() ){ ?>
	<li class="list-group-item"><a href="discount-display"><i class="fa fa-star-half-o"></i> Discount</a></li>
	<?php } ?>

	<!-- employee dropdown -->
	<?php if( !user_staff() && !user_cook() ){ ?>
	<li class="list-group-item"><a href="employee-display"><i class="fa fa-cube"></i> Employee</a></li>
	<?php } ?>

	<!-- salary Dropdown -->
	<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
	<li class="list-group-item"><p id="salaries"><i class="fa fa-money"></i> Salary <i class="fa fa-angle-down"></i></p></li>
	<div id="salary-list">
		<li class="list-group-item"><a href="salary-display"><i class="fa fa-info-circle"></i> Salary Details</a></li>
		<li class="list-group-item"><a href="salary-create"><i class="fa fa-envelope-square"></i> Salary Generate</a></li>
	</div>
	<?php } ?>	
	
	<!-- users Dropdown -->
	<li class="list-group-item"><a href="users"><i class="fa fa-user"></i> User</a></li>
	
	<!-- customize -->
	<?php if(!user_cook() && !user_staff() && !user_manager() ){ ?>
	<li class="list-group-item"><a href="notice"><i class="fa fa-bell"></i> Notice</a></li>
	<li class="list-group-item"><a href="customize"><i class="fa fa-cog"></i> Customize</a></li>
	<?php } ?>

	<!-- logout -->
	<li class="list-group-item"><a href="logout" onclick="return confirm('Are you sure you want to logout?');"><i class="fa fa-sign-out"></i> Logout</a></li>


</ul>

<!-- <p class="white author"><b>Developed By:</b><br>Amit Subba Pomu</p> -->
</div>
<div class="menu-bg"></div>

	</div>	
	<div class="col-xs-10 content">	

