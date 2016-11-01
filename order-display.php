<?php include ('inc/header-without-menu.php'); ?>
<?php if( !user_staff() ){ ?>
<h2 class="page-title">Order Display</h2>
	<table id="order" class="table table-condensed table-hover">
		<tr class="t-head">
			<th>Code</th>
			<th>Name</th>
			<th>Quantity</th>
			<th>Order Time</th>
			<th>Delivery Type</th>
			<th>Status</th>
		</tr>
		

			
				<?php 
					$id_qry = "SELECT * FROM shop ORDER BY id DESC";
					 $sel_id = query($id_qry);
					
					 while ($row = fetch($sel_id)) 
					 {
          echo "<tr><td>".$row['code'] ."</td><td>".$row['name'] ."</td><td>".$row['quantity'] ."</td><td>".$row['order_time'] ."</td><td>".$row['delivery_type'] ."</td><td>";
          ?>
      		<a class="btn btn-success" href="order-delete.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>&val2=<?php echo encrypt_decrypt('encrypt',$row['code']); ?>">Done</a>
       <?php
        echo "</td></tr>";

    }					
				?>
						
		
	</table>

<?php include ('inc/footer.php'); ?>

<script>

     var time = new Date().getTime();
     $(document.body).bind("mousemove keypress", function(e) {
         time = new Date().getTime();
     });

     function refresh() {
         if(new Date().getTime() - time >= 10000) 
            // window.location=window.location;
	        location.reload();
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