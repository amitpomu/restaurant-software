<?php include ('inc/header.php'); ?>
<?php if(!user_staff() ){ ?>
<h2 class="page-title">Stocks
<?php if(!user_cook() && !user_manager()){ ?>
<a href="stock-create" class="btn btn-info pull-right"><i class="fa fa-plus"></i>Add New</a>
<?php } ?>
</h2>
<?php display_success_message(); ?>
<div class="row">
	
		<?php 
			$id_qry = "SELECT * FROM stock_category";
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
          		href="stock-display.php?val=<?php echo encrypt_decrypt('encrypt',$row['category_code']); ?>"><?php echo $row['name']; ?></a></li>       
          		
       <?php }?>
       </ul>
     
</div>

<hr>
<?php if (isset($_GET['val'])) { ?>
<div class="row">
	<table class="table table-condensed table-hover">
		<tr class="t-head">	
			<th>Updated Date</th>
			<th>Updated By</th>		
			<th>Name</th>
			<th>Quantity</th>
			<th>Note</th>			
			<th>Option</th>
		</tr>			
				<?php 
					$code = encrypt_decrypt('decrypt',$_GET['val']);
					$id_qry = "SELECT * FROM stock WHERE category_code = {$code}";
					 $sel_id = query($id_qry);
					
					 while ($row = fetch($sel_id)) 
					 {
          echo "<tr><td>".$row['stock_date'] ."</td><td>". stock_editor($row['user']) ."</td><td>".$row['name'] ."</td><td>".$row['quantity'].' '.$row['unit']."</td><td>".$row['note'] ."</td><td>";
          ?>          
          	<a class="btn btn-warning btn-sm" href="stock-edit.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>"><i class="fa fa-pencil"></i>Update</a>
      		<?php if(!user_cook() && !user_manager() ){ ?>
      		<a class="btn btn-danger btn-sm" href="stock-delete.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i>Delete</a>
      		<?php } ?>
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