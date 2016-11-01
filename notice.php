<?php include ('inc/header.php'); ?>

	<h2 class="page-title">Notice
	<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
		<a href="notice-create" class="btn btn-info pull-right"><i class="fa fa-plus"></i>Add New</a>
	<?php } ?>	
	</h2>
	<?php display_success_message(); ?>
	<div class="table-responsive">
		<table class="table table-condensed">
			<tr class="t-head">
				<th>Date</th>
				<th>To</th>
				<th>Subject</th>
				<th>Notice</th>
				<?php if( !user_cook() && !user_staff() && !user_manager()){ ?>
				<th>Option</th>
				<?php } ?>
			</tr>				
				<?php  
					if( !user_cook() && !user_staff() && !user_manager()){						
						$query = "SELECT * FROM notice";						
					} else {
						$query = "SELECT * FROM notice WHERE user_category = '{$_SESSION['user_category']}' OR user_category = 'all'";
					} 
					$result = query($query);
					while ($row = fetch($result)){
					 	echo "<tr><td>".$row['notice_date']."</td><td>".$row['user_category']."</td><td>".$row['subject']."</td><td>".$row['message']."</td>";
					 ?>
					 <?php if( !user_cook() && !user_staff() && !user_manager()){ ?>
					 <td><a class="btn btn-danger btn-sm" href="notice-delete.php?val=<?php echo encrypt_decrypt('encrypt',$row['id']); ?>" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i>Delete</a></td>
					 </tr>
					 <?php } 
					 }
				?>
		</table>
	</div>
	

<?php include ('inc/footer.php'); ?>
<?php query_close(); ?>	