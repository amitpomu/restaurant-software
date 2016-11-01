<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
<h2 class="page-title">Products
<a href="create-product" class="btn btn-info pull-right"><i class="fa fa-plus"></i>Add New</a>
</h2>
<?php display_success_message(); ?>
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
          		href="display.php?val=<?php echo encrypt_decrypt('encrypt',$row['category_code']); ?>"><?php echo $row['name']; ?></a></li>     		
       <?php }?>
       </ul>
     
</div>
<hr>
<?php if (isset($_GET['val'])) { ?>
	<table id="example" class="table table-condensed table-hover">
	<thead>
		<tr class="t-head">
			<th class="sort" data-sort="string">Name <i class="fa fa-sort pull-right"></i></th>
			<th>Price</th>
			<th>Option</th>
		</tr>
	</thead>
		
	<tbody>
		<?php 
					$code = encrypt_decrypt('decrypt',$_GET['val']);
					$id_qry = "SELECT * FROM subject WHERE cat_code = {$code} ORDER BY name";
					 $sel_id = query($id_qry);
					
					 while ($row = fetch($sel_id)) 
					 {
          echo "<tr><td>".$row['name'] ."</td><td>Rs. ".$row['price'] ."</td><td>";
          ?>
          	<a class="btn btn-warning btn-sm" href="edit.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>"><i class="fa fa-pencil"></i>Edit</a>
      		<a class="btn btn-danger btn-sm" href="delete.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i>Delete</a>
       <?php
        echo "</td></tr>";

    }					
				?>
	</tbody>	
	
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