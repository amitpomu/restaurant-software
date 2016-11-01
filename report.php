<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() ){ ?>
<h2 class="page-title">Daily Report</h2>
<?php display_success_message(); ?>
	<table class="table table-condensed table-hover">
		<tr class="t-head">
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>			
			<th>Delivery Type</th>
			<th>Order Time</th>
			<th>Deliver Time</th>
			<th>Cashier</th>
			<th>Total</th>			
			<!-- <th>Status</th> -->
		</tr>
		
				<?php 
					
					$id_qry = "SELECT * FROM report WHERE visible = 1 ORDER BY id DESC";
					 $sel_id = query($id_qry);
					
					 while ($row = fetch($sel_id)) 
					 {
          echo "<tr><td>".$row['name'] ."</td><td>Rs. ".$row['price'] ."</td><td>".$row['quantity'] ."</td><td>".$row['delivery_type'] ."</td><td>".$row['from_time'] ."</td><td>".$row['to_time'] ."</td><td>".$row['user'] ."</td><td>Rs. ".$row['quantity']*$row['price'] ."</td>";
          ?>
      		<!-- <td><a class="btn btn-danger" onclick="return confirm('Are you sure?');" href="report-delete.php?val=<?php// echo encrypt_decrypt('encrypt',$row['id']); ?>">Delete</a></td> -->
       	</tr>
       	<?php }	?>	
				<tr>
			<td colspan="7">
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
			<!-- <td></td> -->
		</tr>
		<tr>
			<td colspan="7">
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
			<!-- <td></td> -->
		</tr>	
		<tr>
			<td colspan="7">
				<b>Total Service Charge</b>
			</td>
			<td>
				<?php 
					$total_servicecharge = round($gross_total*10/100);					
					echo "Rs. ". $total_servicecharge;
				?>
			</td>
			<!-- <td></td> -->
		</tr>
		<tr>
			<td colspan="7">
				<b>Total VAT</b>
			</td>
			<td>
				<?php 
					$total_vat = round($gross_total*13/100);					
					echo "Rs. ". $total_vat;
				?>
			</td>
			<!-- <td></td> -->
		</tr>		
		<tr>
			<td colspan="7">
				<b>Net Total</b>
			</td>
			<td>
				<?php 					
					$net_total = round($gross_total-$total_discount+$total_servicecharge+$total_vat);
					echo "Rs. ". $net_total;
				?>
			</td>
			<!-- <td></td> -->
		</tr>	
				<tr>
					<td colspan="8">
						<!-- this btn will insert into report archive and delete all reports -->
						<?php if( !user_manager() ){ ?>
						<a class="btn btn-warning pull-right" onclick="return confirm('Are you sure you want to delete all?');" href="report-delete-all.php?val=<?php echo encrypt_decrypt('encrypt',$net_total) ?>"><i class="fa fa-check"></i>Clear Report</a>
						<?php } ?>
					</td>
				</tr>					
		
	</table>
	
<?php include ('inc/footer.php'); ?>	
<?php query_close(); ?>
<?php 
	} else { 
		redirect_to("index"); 

		//this js script is for server
		//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
	} 
?>