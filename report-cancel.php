<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() ){ ?>
<h2 class="page-title">Cancel Report</h2>
<?php if( !user_manager() ){ ?>
<form class="form-inline" method="POST" style="padding:15px;">		
		<label class="report-date">Select Date </label>			
		<input class="form-control datepicker" type="text" name="date" data-date-format="yyyy/mm/dd"  placeholder="yyyy/mm/dd" required>
		<input class="btn btn-success filter-btn" type="submit" name="submit" value="Submit">
	</form>
<?php } ?>
<?php if(isset($_POST['date'])) { 
	$date = $_POST['date'];
?>
<h4><?php echo $date; ?></h4>
	<table class="table table-condensed table-hover">
		<tr class="t-head">
			<th>User</th>
			<th>Code</th>
			<th>Product Name</th>
			<th>Price</th>
			<th>Total Quantity</th>
			<th>Total Amount</th>			
		</tr>
		
				<?php 
					
					$qry = "SELECT * FROM report_cancel WHERE cancel_date = '{$date}'";
					 $sel_qry = query($qry);
					
					 while ($row = fetch($sel_qry)) 
					 {
          echo "<tr><td>".$row['user'] ."</td><td>".$row['code'] ."</td><td>".$row['name'] ."</td><td>Rs. ".$row['price'] ."</td><td>".$row['quantity'] ."</td><td>Rs ".$row['total_price']."</td></tr>";
          
   			 }		

   			$qry = "SELECT SUM(total_price) AS total FROM report_cancel WHERE cancel_date = '{$date}'";
			$sel_qry = query($qry);
					
					 if($row = fetch($sel_qry)) 
					 {
          echo "<tr><td colspan=\"5\"><b>Total Cancelled Amount</b></td><td>Rs. ".$row['total']."</td></tr>";
   			 }						
				?>	
								
		
	</table>
<?php } else { ?>	
<?php  
$dt = new DateTime("now", new DateTimeZone('Asia/Kathmandu'));
$from_time = $dt->format('H:i:s');
$today = $dt->format("Y/m/d");
?>
<h4><?php echo $today . " (Today)"; ?></h2>
<table class="table table-condensed table-hover">
		<tr class="t-head">
			<th>User</th>
			<th>Code</th>
			<th>Product Name</th>
			<th>Price</th>
			<th>Total Quantity</th>
			<th>Total Amount</th>			
		</tr>
		
				<?php 
					
					$qry = "SELECT * FROM report_cancel WHERE visible = 1";
					 $sel_qry = query($qry);
					
					 while ($row = fetch($sel_qry)) 
					 {
          echo "<tr><td>".$row['user'] ."</td><td>".$row['code'] ."</td><td>".$row['name'] ."</td><td>Rs. ".$row['price'] ."</td><td>".$row['quantity'] ."</td><td>Rs ".$row['total_price']."</td></tr>";
          
   			 }		

   			$qry = "SELECT SUM(total_price) AS total FROM report_cancel WHERE visible = 1";
			$sel_qry = query($qry);
					
					 if($row = fetch($sel_qry)) 
					 {
          echo "<tr><td colspan=\"5\"><b>Total Cancelled Amount</b></td><td>Rs. ".$row['total']."</td></tr>";
   			 }						
				?>	
								
		
	</table>
<?php } ?>
<?php include ('inc/footer.php'); ?>	
<?php query_close(); ?>
<?php 
	} else { 
		redirect_to("index"); 

		//this js script is for server
		//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
	} 
?>