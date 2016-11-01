<?php include ('inc/header.php'); ?>

<h2 class="page-title">Users
<?php if(!user_staff() && !user_cook() && !user_manager()){ ?>
<a href="user-create" class="btn btn-info pull-right"><i class="fa fa-plus"></i>Add New</a>
<?php } ?>
</h2>
<?php display_success_message(); ?>
<?php 
	$num_rec_per_page=10;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
?>
	<table class="table table-condensed table-hover">
		<tr class="t-head">
			<th>Name</th>	
			<th>User Type</th>				
			<th>Status</th>
		</tr>

			<?php if( !user_staff() && !user_cook() && !user_manager() ){ 
					$id_qry = "SELECT * FROM user ORDER BY user_category LIMIT $start_from, $num_rec_per_page";
					 $sel_id = query($id_qry);
					
					 while ($row = fetch($sel_id)) 
					 {
          echo "<tr><td>".$row['username'] ."</td><td>".$row['user_category'] ."</td><td>";
          ?>
          	<a class="btn btn-warning btn-sm" href="user-edit.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>"><i class="fa fa-pencil"></i>Edit</a>
          	
      		<a class="btn btn-danger btn-sm" href="user-delete.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i>Delete</a>

       	<?php
        	echo "</td></tr>";
	    	}					
		?>	
		<?php } else { ?>
			<?php 
					$userid = $_SESSION['user_id'];
					$id_qry = "SELECT * FROM user where id = $userid";
					 $sel_id = query($id_qry);
					
					 while ($row = fetch($sel_id)) 
					 {
          echo "<tr><td>".$row['username'] ."</td><td>".$row['user_category'] ."</td><td>";
          ?>
          	<a class="btn btn-warning" href="user-edit.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>"><i class="fa fa-pencil"></i>Edit</a>

       	<?php
        	echo "</td></tr>";
	    	}	
	    }					
		?>						
		
	</table>
<div class="clearfix col-xs-12 text-center pagination">	
<ul class="pagination">
<?php
	if( !user_staff() && !user_cook() && !user_manager() ){  
		$id_qry = "SELECT * FROM user ORDER BY user_category";
		$sel_id = query($id_qry);
		$total_records = num_rows($sel_id);  //count number of records
		$total_pages = ceil($total_records / $num_rec_per_page); 
$previous = ($page - 1);
			$next = ($page + 1);
			echo "<li><a href='users.php?page=1'>"."<i class='fa fa-fast-backward text-primary'></i>"."</a></li> "; // Goto 1st page  
			if ($page > 1) {
				echo "<li><a href='users.php?page={$previous}'>"."<i class='fa fa-step-backward text-primary'></i>"."</a></li> "; 
			}
			for ($i=1; $i<=$total_pages; $i++) { 
	            echo "<li class='";
	            if($page == $i) { echo 'active'; }
	            echo "'><a class='text-primary' href='users.php?page=".$i."'>".$i."</a><li> "; 
			}; 
			if ($page < $total_pages) {
				echo "<li><a href='users.php?page={$next}'>"."<i class='fa fa-step-forward text-primary'></i>"."</a></li> ";
			}
			echo "<li><a href='users.php?page=$total_pages'>"."<i class='fa fa-fast-forward text-primary'></i>"."</a></li> "; // Goto last page
	}
?>
</ul>
</div>	
<?php include ('inc/footer.php'); ?>	
<?php query_close(); ?>
