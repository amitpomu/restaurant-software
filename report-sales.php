<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() ){ ?>
<h2 class="page-title">Sales Report</h2>
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
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>	
			<th>Total</th>			

		</tr>
			<?php 	
				$id_qry = "SELECT name,price, SUM(quantity) as quantity FROM report WHERE report_date = '{$date}' GROUP BY name ORDER BY quantity DESC";
				 $sel_id = query($id_qry);
				 while ($row = fetch($sel_id)) 
				 {
          echo "<tr><td>".$row['name'] ."</td><td>Rs. ".$row['price'] ."</td><td>".$row['quantity'] ."</td><td>Rs. ".$row['quantity']*$row['price'] ."</td>";
          ?>
       	<?php
	        echo "</tr>";
	    	}					
		?>	
		<tr>
			<td colspan="3">
				<b>Gross Total</b>
			</td>
			<td>
				<?php 
					$query = "SELECT SUM(total_sales) AS total FROM report WHERE report_date = '{$date}'";
					$result = query($query);
					if($row = fetch($result)){
						$gross_total = $row['total'];	
						echo "Rs. ". $row['total'];						
					}					
				?>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<b>Total Discount</b>
			</td>
			<td>
				<?php 
					$query = "SELECT SUM(amount) AS sum FROM discount_amount WHERE discount_date = '{$date}'"; 
					$result = query($query);
					if($row = fetch($result)){
						$total_discount = $row['sum'];	
						echo "Rs. ". $row['sum'];						
					}					
				?>
			</td>
		</tr>	
		<tr>
			<td colspan="3">
				<b>Total Service Charge</b>
			</td>
			<td>
				<?php 
					$total_servicecharge = round($gross_total*10/100);					
					echo "Rs. ". $total_servicecharge;
				?>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<b>Total VAT</b>
			</td>
			<td>
				<?php 
					$total_vat = round($gross_total*13/100);					
					echo "Rs. ". $total_vat;
				?>
			</td>
		</tr>		
		<tr>
			<td colspan="3">
				<b>Net Total</b>
			</td>
			<td>
				<?php 					
					$net_total = round($gross_total-$total_discount+$total_servicecharge+$total_vat);
					echo "Rs. ". $net_total;
				?>
			</td>
		</tr>	
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
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>	
			<th>Total</th>			

		</tr>
			<?php 	
				$id_qry = "SELECT name,price, SUM(quantity) as quantity FROM report WHERE visible = 1 GROUP BY name ORDER BY quantity DESC";
				 $sel_id = query($id_qry);
				
				 while ($row = fetch($sel_id)) 
				 {
          echo "<tr><td>".$row['name'] ."</td><td>Rs. ".$row['price'] ."</td><td>".$row['quantity'] ."</td><td>Rs. ".$row['quantity']*$row['price'] ."</td>";
          ?>
       	<?php
	        echo "</tr>";
	    	}					
		?>	
		<tr>
			<td colspan="3">
				<b>Gross Total</b>
			</td>
			<td>
				<?php 
					$query = "SELECT SUM(total_sales) AS total FROM report WHERE visible = 1";
					$result = query($query);
					if($row = fetch($result)){
						$gross_total = $row['total'];	
						echo "Rs. ". $row['total'];						
					}					
				?>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<b>Total Discount</b>
			</td>
			<td>
				<?php 
					$query = "SELECT SUM(amount) AS sum FROM discount_amount WHERE visible = 1"; 
					$result = query($query);
					if($row = fetch($result)){
						$total_discount = $row['sum'];	
						echo "Rs. ". $row['sum'];						
					}					
				?>
			</td>
		</tr>	
		<tr>
			<td colspan="3">
				<b>Total Service Charge</b>
			</td>
			<td>
				<?php 
					$total_servicecharge = round($gross_total*10/100);					
					echo "Rs. ". $total_servicecharge;
				?>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<b>Total VAT</b>
			</td>
			<td>
				<?php 
					$total_vat = round($gross_total*13/100);					
					echo "Rs. ". $total_vat;
				?>
			</td>
		</tr>		
		<tr>
			<td colspan="3">
				<b>Net Total</b>
			</td>
			<td>
				<?php 					
					$net_total = round($gross_total-$total_discount+$total_servicecharge+$total_vat);
					echo "Rs. ". $net_total;
				?>
			</td>
		</tr>	
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