<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
<h2 class="page-title">Salary Generate</h2>

	<form id="filter" class="form-inline" method="POST" style="padding:15px;">		 

			<select class="chosen-select form-control"  tabindex="2" name="empname" data-placeholder="Select Employee">  
			<option></option>
			<?php  
				$query = "SELECT id,name FROM employee";
				$sel_query = query($query);
				while ($row = fetch($sel_query)) {
					echo "<option value='".$row['id']."'>".$row['name']."</option>";
				} 
			?>
			</select>

		<button type="submit" class="btn btn-success filter-btn"><i class="fa fa-check"></i>Submit</button>

	</form>

	<hr>

	<?php if(isset($_POST['empname'])) {
		$name = $_POST['empname'];
		$dt = new DateTime("now", new DateTimeZone('Asia/Kathmandu'));
		$year = $dt->format("Y");
		$month = $dt->format("F");
		$query = "SELECT * FROM employee WHERE id = '{$name}'";
		$sel_query = query($query);
		if($row = fetch($sel_query)){ ?>

		<form id="generate" class="form-inline" action="sal-create.php" method="POST" style="padding:15px;">
			
			<label>Name</label>
			<input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>" required>	
			<label>ID</label>
			<input class="form-control" type="number" name="id" value="<?php echo $row['id']; ?>" required>
			<br>
			<label>Year</label>
			<input class="form-control" type="number" name="year" value="<?php echo $year; ?>" required>
			<label>Month</label>
			<select class="form-control" name="month" required>
				<option <?php if($month == 'January'){echo 'selected';} ?>>Janauary</option>
				<option <?php if($month == 'February'){echo 'selected';} ?>>February</option>
				<option <?php if($month == 'March'){echo 'selected';} ?>>March</option>
				<option <?php if($month == 'April'){echo 'selected';} ?>>April</option>
				<option <?php if($month == 'May'){echo 'selected';} ?>>May</option>
				<option <?php if($month == 'June'){echo 'selected';} ?>>June</option>
				<option <?php if($month == 'July'){echo 'selected';} ?>>July</option>
				<option <?php if($month == 'August'){echo 'selected';} ?>>August</option>
				<option <?php if($month == 'September'){echo 'selected';} ?>>September</option>
				<option <?php if($month == 'October'){echo 'selected';} ?>>October</option>
				<option <?php if($month == 'November'){echo 'selected';} ?>>November</option>
				<option <?php if($month == 'December'){echo 'selected';} ?>>December</option>
			</select>
			<br>
			<label>Salary</label>
			<input class="form-control" type="number" name="salary" value="<?php echo $row['salary']; ?>" required>
			<label>Allowance</label>
			<input class="form-control" type="number" name="allowance" value="000" required>
			<br>
			<label>Note</label>
			<textarea class="form-control" name="note"></textarea>
			<br><br>
			<button type="submit" class="btn btn-info clearfix"><i class="fa fa-check"></i>Generate</button>
		</form>

		<?php } 
			}
		?>

<?php include ('inc/footer.php'); ?>
	
<?php 
	} else { 
		redirect_to("index"); 

		//this js script is for server
		//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
	} 
?>