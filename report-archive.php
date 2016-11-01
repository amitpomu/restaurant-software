<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
<h2 class="page-title">Report History</h2>
<!-- <h4 class="page-title">Select Date</h4> -->
	<form class="form-inline" method="POST" style="padding:15px;">		
		<label class="report-date">From Date </label>			
		<input class="form-control datepicker" type="text" name="from" data-date-format="yyyy/mm/dd"  placeholder="yyyy/mm/dd" required>
		<label class="report-date">To Date </label>
		<input class="form-control datepicker" type="text" name="to" data-date-format="yyyy/mm/dd" placeholder="yyyy/mm/dd" required>
		<input class="btn btn-success filter-btn" type="submit" name="submit" value="Submit">
	</form>

	<?php if(isset($_POST['from']) && $_POST['from'] != null && isset($_POST['to'])) { ?>

	<table class="table table-condensed table-hover">
		<tr class="t-head">			
			<th>Date</th>
			<th>NET Total Sales</th>						
		</tr>
	
		<?php 
		 $from = $_POST['from'];
		 $to = $_POST['to'];
			$id_qry = "SELECT * FROM report_archive WHERE report_date >= '{$from}' AND report_date <= '{$to}'";
			 $sel_id = query($id_qry);
			
			 while ($row = fetch($sel_id)) 
			 {
          		echo "<tr><td>".$row['report_date'] ."</td><td>Rs. ".$row['amount'] ."</td></tr>"; 
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