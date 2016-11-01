<?php include ('inc/header.php'); ?>
<?php if(!user_cook() ){ ?>
<h2 class="page-title">Take Order</h2>
<div class="row">
	
		<?php 
			$id_qry = "SELECT * FROM category";
		 $sel_id = query($id_qry);
			echo "<ul class=\"shop-nav\">";	
		 while ($row = fetch($sel_id)) {  ?>       
          		<li><a class="btn btn-primary 
          		<?php 
          		if(!empty($_GET['val'])) {
          			if(encrypt_decrypt('decrypt',$_GET['val']) == $row['category_code']) {
          			 echo 'active';
          			}
          		} 
          		?>" 
          		href="shop.php?val=<?php echo encrypt_decrypt('encrypt',$row['category_code']); ?>"><?php echo $row['name']; ?></a></li> 		
       <?php }?>
       </ul>
     
</div>

<hr>
<?php if (isset($_GET['val'])) { ?>
<div class="row">
	<table class="table table-condensed table-hover">
		<tr class="t-head">			
			<th>Name</th>
			<th>Price</th>			
			<th>Order</th>
		</tr>			
				<?php 
					$code = encrypt_decrypt('decrypt',$_GET['val']);
					$id_qry = "SELECT * FROM subject WHERE cat_code = {$code} ORDER BY name";
					 $sel_id = query($id_qry);
					
					 while ($row = fetch($sel_id)) 
					 {
          echo "<tr><td>".$row['name'] ."</td><td>Rs. ".$row['price'] ."</td><td>";
          ?>          
          	<a class="btn btn-success btn-sm" href="order-create.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>"><i class="fa fa-cutlery"></i>Place Order</a>
      		
       <?php
        echo "</td></tr>";
   		 }					
		?>
						
		
	</table>
</div>
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