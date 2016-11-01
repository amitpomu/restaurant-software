<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() ){ ?>
<h2 class="page-title">Discounts
<?php if(!user_manager()){ ?>
<a href="discount" class="btn btn-info pull-right"><i class="fa fa-plus"></i>Add New</a>
<?php } ?>
</h2>
<?php display_success_message(); ?>
	<table class="table table-condensed table-hover">
		<tr class="t-head">			
			<th>Discount Code</th>
			<th>Discount Percent</th>
			<?php if(!user_manager()){ ?>
			<th>Option</th>
			<?php } ?>			
		</tr>	
				<?php 
					$id_qry = "SELECT * FROM discount";
					 $result = query($id_qry);
					
					 while ($row = fetch($result)) 
					 {
          echo "<tr><td>".$row['discount_code'] ."</td><td>".$row['discount_percent'] ." %</td>";
          ?>
          <?php if( !user_manager() ){ ?>
          <td>
          	<a class="btn btn-warning btn-sm" href="discount-edit.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>"><i class="fa fa-pencil"></i>Edit</a>
      		<a class="btn btn-danger btn-sm" href="discount-delete.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i>Delete</a>
       	  </td>
       <?php
       	}
        echo "</tr>";

    }					
				?>
						
		
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