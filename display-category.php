<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
<h2 class="page-title">Product Categories
<a href="create-category" class="btn btn-info pull-right"><i class="fa fa-plus"></i>Add New</a>
</h2>
<?php display_success_message(); ?>
	<table class="table table-condensed table-hover">
		<tr class="t-head">			
			<th>Name</th>
			<th>Category Code</th>
			<th>Option</th>			
		</tr>
		

			
				<?php 
					$id_qry = "SELECT * FROM category ORDER BY name";
					 $sel_id = query($id_qry);
					
					 while ($row = fetch($sel_id)) 
					 {
          echo "<tr><td>".$row['name'] ."</td><td>".$row['category_code'] ."</td><td>";
          ?>
          	<a class="btn btn-warning btn-sm" href="edit-cat.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>"><i class="fa fa-pencil"></i>Edit</a>
      		<a class="btn btn-danger btn-sm" href="delete-cat.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i>Delete</a>
       <?php
        echo "</td></tr>";

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