<?php include ('inc/header.php'); ?>
<?php if(!user_cook() ){ ?>
<h2 class="page-title">Payment</h2>
<?php display_success_message(); ?>
<h4 class="print-title text-center hide"><?php the_title(); ?></h4>
	<table id="print" class="table table-condensed">
		<tr class="t-head">
			<th>Code</th>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
			<!-- <th>Status</th> -->
		</tr>
			
				<?php 
					$till = $_SESSION['till'];
					$id_qry = "SELECT * FROM cart WHERE till = {$till} ORDER BY id DESC";
					$sel_id = query($id_qry);
					
					 while ($row = fetch($sel_id)) {
          echo "<tr><td>".$row['code'] ."</td><td>".$row['name'] ."</td><td>Rs. ".$row['price'] ."</td><td>".$row['quantity'] ."</td><td>Rs. ".$row['total_price']; 
          ?>
          <?php if( !user_staff() ){
          	echo " <a class='btn btn-danger btn-sm pull-right payment-delete-btn' href='payment-delete.php?val=".encrypt_decrypt('encrypt',$row['id'])."'>Delete</a>"; ?>
          	 <?php } 
          	 echo "</td></tr>";
          	}
          ?>
      	
		<tr>
			<td colspan="2">
				<form class="form-inline code-form" method="POST">
					<input class="form-control" type="text" name="discount-code" placeholder="discount code">
					<input class="form-control btn btn-warning filter-btn" type="submit" name="submit" value="Submit Code">
				</form>				
			</td>
			<td colspan="2">
				<b>Service Charge 10%</b>
			</td>
			<td>
				<?php 
					$query = "SELECT SUM(total_price) AS sum FROM cart WHERE till = {$till}"; 						 
					$result = query($query);
					// Print out result
					while($row = fetch($result)){
						$amount = $row['sum'];
						$service_charge = round($amount*10/100);

						echo "Rs. ". $service_charge;											
					}											
				?>
				
			</td>
		</tr>

		<tr>
			<td colspan="2">				
			</td>
			<td colspan="2">
				<b>VAT 13%</b>
			</td>
			<td>
				<?php 
					$vat = round($amount*13/100);
					echo "Rs. ". $vat;																						
				?>				
			</td>
		</tr>

		<tr>
			<td colspan="2">				
			</td>
			<td colspan="2">
				<b>Total Amount</b>
			</td>
			<td>
				<?php 	
					$sum_total = $amount+$service_charge+$vat;				
					echo "Rs. ". $sum_total;								
				?>
				
			</td>
		</tr>


		<?php if (isset($_POST['discount-code']) && $_POST['discount-code'] != null) { ?>
		<tr>
			<td colspan="2">				
			</td>
			<td colspan="2">
				<b>Discount Amount</b>
			</td>
			<td>
				<?php 
					$query = "SELECT SUM(total_price) AS sum FROM cart WHERE till = {$till}"; 						 
					$result = query($query);
					// Print out result
					if($row = fetch($result)){
						$discount_amt = round($row['sum']*discount($_POST['discount-code']));						
						echo "Rs. ".$discount_amt;				
					}						
				?>				
			</td>
		</tr>		

		<tr>
			<td colspan="2"></td>
			<td colspan="2">
				<b>Net Total</b>
			</td>
			<td>
				<?php  
					$total = round($sum_total-$discount_amt);
					echo "Rs. ".$total;
				?>
			</td>
		</tr>	
		<?php } ?>	
		<tr>
			<td colspan="3">
				<p id="demo" class="hide print-date"></p>

				<script>
				var d = new Date();
				document.getElementById("demo").innerHTML = d.toDateString();
				</script>
			</td>
			<td colspan="2" class="print-btns">
				<?php  if(isset($_POST['discount-code']) && $_POST['discount-code'] != null) { ?>
				<a class="btn btn-success pull-right" onclick="return confirm('Are you sure you want to confirm payment?');" href="payment-delete-all.php?val=<?php echo encrypt_decrypt('encrypt',$discount_amt); ?>"><i class="fa fa-check"></i>Clear Bill</a>
				<?php } else { ?>
				<a class="btn btn-success pull-right" onclick="return confirm('Are you sure you want to confirm payment?');" href="payment-delete-all.php"><i class="fa fa-check"></i>Clear Bill</a>
				<?php } ?>

				<a class="btn btn-info pull-right" href="javascript:window.print()"><i class="fa fa-print"></i>Print Bill</a>		
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