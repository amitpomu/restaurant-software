<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() ){ ?>
<h2 class="page-title">Employee Meal Report</h2>
<!-- <h4 class="page-title">Select Date</h4> -->
	<form class="form-inline" method="POST" style="padding:15px;">	
		<label class="report-date">Employee</label>	
		<select class="chosen-select form-control"  tabindex="2" name="employee" data-placeholder="Select Employee" required>
		<option></option>
		<?php  
			$query = "SELECT id, name FROM employee ORDER BY name";
			$result = query($query);
			while( $row = fetch($result)) {
				echo "<option value='".$row['id']."'>".$row['name']."</option>";
			}
		?>
		</select>
		<label class="report-date">From Date </label>			
		<input class="form-control datepicker" type="text" name="from" data-date-format="yyyy/mm/dd"  placeholder="yyyy/mm/dd" required>
		<label class="report-date">To Date </label>
		<input class="form-control datepicker" type="text" name="to" data-date-format="yyyy/mm/dd" placeholder="yyyy/mm/dd" required>
		<input class="btn btn-success filter-btn" type="submit" name="submit" value="Submit">
	</form>

	<?php if(isset($_POST['employee']) && isset($_POST['from']) && $_POST['from'] != null && isset($_POST['to'])) { ?>
	<?php
		$from = $_POST['from'];
		 $to = $_POST['to'];
		 $employee = $_POST['employee'];
		 
		$query = "SELECT DISTINCT employee FROM employee_meal WHERE emp_id = {$employee}";
			$sel_query = query($query);
			if($row = fetch($sel_query)) {
	?>
	<h3><?php echo $row['employee']; ?></h3>
	<?php } ?>

	<table class="table table-condensed table-hover">
		<tr class="t-head">			
			<th>Date</th>
			<th>Meal</th>
			<th>Quantity</th>
			<th>Amount</th>						
		</tr>
	
		<?php 
		 
			$id_qry = "SELECT * FROM employee_meal WHERE emp_id = {$employee} AND meal_date >= '{$from}' AND meal_date <= '{$to}'";
			 $sel_id = query($id_qry);
			
			 while ($row = fetch($sel_id)) 
			 {
          		echo "<tr><td>".$row['meal_date'] ."</td><td>".$row['meal'] ."</td><td>".$row['quantity'] ."</td><td>Rs. ".$row['price'] ."</td></tr>"; 
  			}	
      	?>
      	<tr>
      		<td class="text-right" colspan="3"><b>Total Amount</b></td>
      		<td>
      			<?php  
      				$id_qry = "SELECT sum(price) as total FROM employee_meal WHERE emp_id = {$employee} AND meal_date >= '{$from}' AND meal_date <= '{$to}'";
			 $sel_id = query($id_qry);
			 if($row = fetch($sel_id)){
			 	echo "Rs. ". $row['total'];
			 }
      			?>
      		</td>
      	</tr>
          	
		
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