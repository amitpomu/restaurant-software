<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() ){ ?>
<h2 class="page-title">Employee Sales Report</h2>
<?php if(!user_manager()){ ?>
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
			<th>Cashier</th>
			<th>Sales</th>
			<th>Total Discount</th>	
			<th>Total Sales</th>		
		</tr>
		
				<?php 	
					$qry = "SELECT r.user AS username, sum(r.total_sales) AS 'total sales', COALESCE(dis.total_discount,0) AS 'total discount' FROM report AS r LEFT JOIN ( SELECT d.user_id, d.visible, d.discount_date, sum(d.amount) AS total_discount FROM discount_amount AS d WHERE d.discount_date = '{$date}' GROUP BY d.user_id ) AS dis ON r.user_id = dis.user_id WHERE r.report_date = '{$date}' GROUP BY username";
					 $sel_qry = query($qry);
					
					 while ($row = fetch($sel_qry)) 
					 {
          echo "<tr><td>".$row['username'] ."</td><td> Rs. ".$row['total sales'] ."</td><td>Rs. ".$row['total discount'] ."</td><td>Rs. ".($row['total sales']-$row['total discount'])."</td></tr>";
          
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
			<th>Cashier</th>
			<th>Sales</th>
			<th>Total Discount</th>	
			<th>Total Sales</th>		
		</tr>
		
				<?php 
					$qry = "SELECT r.user AS username, sum(r.total_sales) AS 'total sales',COALESCE(dis.total_discount,0) AS 'total discount' FROM report AS r LEFT JOIN ( SELECT d.user_id, d.visible, sum(d.amount) AS total_discount FROM discount_amount AS d WHERE d.visible = 1 GROUP BY d.user_id ) AS dis ON r.user_id = dis.user_id  WHERE r.visible = 1 GROUP BY username";
					 $sel_qry = query($qry);
					
					 while ($row = fetch($sel_qry)) 
					 {
          echo "<tr><td>".$row['username'] ."</td><td> Rs. ".$row['total sales'] ."</td><td>Rs. ".$row['total discount'] ."</td><td>Rs. ".($row['total sales']-$row['total discount'])."</td></tr>"; 
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