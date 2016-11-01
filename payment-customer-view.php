<?php include ('inc/header-without-menu.php'); ?>
<?php if(!user_cook() ){ ?>
<div class="row">
	<div class="col-sm-6">
		<div class="row clearfix">
			<h2 class="page-title">Menu</h2>
				<?php 
				$id_qry = "SELECT * FROM category";
			 	$sel_id = query($id_qry);
				echo "<ul class=\"shop-nav\">";	
			 	while ($row = fetch($sel_id)) {  ?>       
	          		<li><a class="btn btn-primary btn-sm" href="payment-customer-view.php?val=<?php echo encrypt_decrypt('encrypt',$row['category_code']); ?>"><?php echo $row['name']; ?></a></li>     		
	       <?php } ?>
	       </ul>
     
		</div>
	
		<?php if (isset($_GET['val'])) { ?>
		<div class="row customer-menu">
			<div class="col-sm-12">
			<table class="table table-condensed">
				<tr class="t-head">			
					<th>Name</th>
					<th>Price</th>		
					
				</tr>			
						<?php 
							$code = encrypt_decrypt('decrypt',$_GET['val']);
							$id_qry = "SELECT * FROM subject WHERE cat_code = {$code}";
							 $sel_id = query($id_qry);
							
							 while ($row = fetch($sel_id)) 
							 {
		          echo "<tr><td>".$row['name'] ."</td><td>Rs. ".$row['price'] ."</td></tr>";
		          
		   		 }					
				?>
								
				
			</table>
			</div>
		</div>
		<?php } ?>
			
	</div>	
	<div class="col-sm-6">
	<div class="row">
		<h2 class="page-title">Payment Details</h2>
	<table class="table table-condensed">
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
          echo "<tr><td>".$row['code'] ."</td><td>".$row['name'] ."</td><td>Rs. ".$row['price'] ."</td><td>".$row['quantity'] ."</td><td>Rs. ".$row['total_price'] ."</td></tr>";
          	}
          ?>
      		<!-- <a class="btn btn-success" href="payment-delete.php?val=<?php// echo $row['id'] ?>">Remove</a> -->
       	
		<tr>
			<td colspan="4">
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
			<td colspan="4">
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
			<td colspan="4">
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
			<td colspan="4">
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
				
						
		
	</table>
	</div>
		
	</div>
</div>


<?php include ('inc/footer.php'); ?>
<script>

     var time = new Date().getTime();
     $(document.body).bind("mousemove keypress", function(e) {
         time = new Date().getTime();
     });

     function refresh() {
         if(new Date().getTime() - time >= 10000) 
           window.location=window.location;
         else 
             setTimeout(refresh, 1000);
     }

     setTimeout(refresh, 1000);
    
</script>	
<?php query_close(); ?>
<?php 
	} else { 
		redirect_to("index"); 

		//this js script is for server
		//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
	} 
?>