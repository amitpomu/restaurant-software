<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
<h2 class="page-title">Salary Details</h2>
<?php display_success_message(); ?>
	<form class="form-inline" method="POST" style="padding:15px;">		 

		<select class="chosen-select form-control"  tabindex="2" name="name" data-placeholder="Select Employee">  
		<option></option>
		<?php  
			$query = "SELECT DISTINCT emp_id, name FROM salary";
			$sel_query = query($query);
			while ($row = fetch($sel_query)) {
		?>	
		<option value="<?php echo $row['emp_id']; ?>"><?php echo $row['name']; ?></option>
		<?php } ?>
		</select>

		<select class="chosen-select form-control"  tabindex="2" name="year" data-placeholder="Select Year">  
				<option></option>
		<?php  
			$query = "SELECT DISTINCT salary_year FROM salary";
			$sel_query = query($query);
			while ($row = fetch($sel_query)) {
		?>	
		<option><?php echo $row['salary_year']; ?></option>
		<?php } ?>
		</select>

		<button type="submit" class="btn btn-success filter-btn"><i class="fa fa-check"></i>Submit</button>
	
	</form>

	<hr>

	<?php if(isset($_POST['name']) && isset($_POST['year']) && !empty($_POST['name']) && !empty($_POST['year'])){ ?>
	<?php  
		$name = $_POST['name'];
		$year = $_POST['year'];
		$query = "SELECT DISTINCT name FROM salary WHERE emp_id = {$name}";
			$sel_query = query($query);
			if($row = fetch($sel_query)) {
	?>
	<h3><?php echo $row['name']; ?></h3>
	<?php } ?>
	<table class="table table-condensed table-hover">
	<thead>
		<tr class="t-head">
			<th>Year</th>
			<th>Month</th>
			<th>Salary</th>
			<th>Allowance</th>
			<th>Note</th>
		</tr>
	</thead>
	<tbody>

	<?php
		$query = "SELECT DISTINCT salary_year, salary_month, salary, allowance, note FROM salary WHERE emp_id = '{$name}' AND salary_year = {$year} ORDER BY month_id";
		$sel_query = query($query);
		while ($row = fetch($sel_query)) {
		echo "<tr><td>".$row['salary_year']."</td><td>".$row['salary_month']."</td><td>Rs. ".$row['salary']."</td><td>Rs. ".$row['allowance']."</td><td>".$row['note']."</td></tr>";
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