<?php include ('inc/header.php'); ?>
<?php if(!user_staff() && !user_cook() ){ ?>
<h2 class="page-title">Employees
<?php if(!user_manager()){ ?>
<a href="employee-create" class="btn btn-info pull-right"><i class="fa fa-plus"></i>Add New</a>
<?php } ?>
</h2>
<?php display_success_message(); ?>
<?php 
	$num_rec_per_page=10;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
?>		
<div class="row">
	<table id="example" class="table table-condensed table-hover">
	<thead>
		<tr class="t-head">	
			<th class="sort" data-sort="string">Employee Name <i class="fa fa-sort pull-right"></i></th>
			<th>Designation</th>		
			<th>Phone</th>
			<th>Email</th>
			<th>Address</th>
			<th>Option</th>		
		</tr>
	</thead>
	<tbody>				
				<?php					
					$id_qry = "SELECT * FROM employee ORDER BY salary DESC, designation, name LIMIT $start_from, $num_rec_per_page";
					 $sel_id = query($id_qry);					
					 while ($row = fetch($sel_id)) 
					 {
          echo "<tr><td>".$row['name'] ."</td><td>". stock_editor($row['designation']) ."</td><td>".$row['phone'] ."</td><td>".$row['email'] ."</td><td>".$row['address']."</td><td>";
          ?>    
          <a class="btn btn-info btn-sm" href="employee-details.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>"><i class="fa fa-child"></i>View</a>
          <?php if(!user_manager() ){ ?>      
          	<a class="btn btn-warning btn-sm" href="employee-edit.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>"><i class="fa fa-pencil"></i>Edit</a>
      		
      		<a class="btn btn-danger btn-sm" href="employee-delete.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i>Delete</a>
      		<?php } ?>
       <?php
        echo "</td></tr>";
   		 }					
		?>
						
		</tbody>
	</table>
	<div class="clearfix col-xs-12 text-center">	
	<ul class="pagination">
	<?php
			$id_qry = "SELECT * FROM employee ORDER BY salary DESC, designation, name";
			$sel_id = query($id_qry);
			$total_records = num_rows($sel_id);  //count number of records
			$total_pages = ceil($total_records / $num_rec_per_page); 
			$previous = ($page - 1);
			$next = ($page + 1);
			echo "<li><a href='employee-display.php?page=1'>"."<i class='fa fa-fast-backward text-primary'></i>"."</a></li> "; // Goto 1st page  
			if ($page > 1) {
				echo "<li><a href='employee-display.php?page={$previous}'>"."<i class='fa fa-step-backward text-primary'></i>"."</a></li> "; 
			}
			for ($i=1; $i<=$total_pages; $i++) { 
	            echo "<li class='";
	            if($page == $i) { echo 'active'; }
	            echo "'><a class='text-primary' href='employee-display.php?page=".$i."'>".$i."</a><li> "; 
			}; 
			if ($page < $total_pages) {
				echo "<li><a href='employee-display.php?page={$next}'>"."<i class='fa fa-step-forward text-primary'></i>"."</a></li> ";
			}
			echo "<li><a href='employee-display.php?page=$total_pages'>"."<i class='fa fa-fast-forward text-primary'></i>"."</a></li> "; // Goto last page
	?>
	</ul>
	</div>	
</div>
	
<?php include ('inc/footer.php'); ?>
<?php query_close(); ?>	
<?php 
	} else { 
		redirect_to("index"); 

		//this js script is for server
		//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
	} 
?>