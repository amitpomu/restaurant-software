<?php include ('inc/header.php'); ?>
<?php if( !user_cook() && !user_staff() && !user_manager()){ ?>
<h2 class="page-title">Create Notice</h2>
<form id="filter" class="form-inline" method="POST" style="padding:15px;">		 
			<label>Notice To</label>
			<select class="chosen-select form-control"  tabindex="2" name="empcategory" data-placeholder="Select User Category">  
			<option></option>
			<option>all</option>
			<?php  
				$query = "SELECT name FROM user_category";
				$sel_query = query($query);
				while ($row = fetch($sel_query)) {
					echo "<option>".$row['name']."</option>";
				} 
			?>
			</select>
			<br>
			<label>Subject</label>
			<input type="text" class="form-control" name="subject" required>
			<br>
			<label>Message</label>
			<textarea class="form-control" name="message" required></textarea>
			<br><br>

		<button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Submit</button>

	</form>
	
	<?php  
		if (isset($_POST['empcategory']) && isset($_POST['subject']) && isset($_POST['message']) && !empty($_POST['empcategory']) && !empty($_POST['subject']) && !empty($_POST['message'])) {
			$dt = new DateTime("now", new DateTimeZone('Asia/Kathmandu'));
			$date = $dt->format("Y/m/d");
			$empcategory = $_POST['empcategory'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];
			
			$query = "INSERT INTO notice (id, notice_date, user_category, subject, message) VALUES (null, '{$date}', '{$empcategory}', '{$subject}', '{$message}')";
			$result = query($query);
			if($result){
				success_message('You have successfully created.');
				redirect_to("notice");
			}
		}
	?>

<?php include ('inc/footer.php'); ?>
<?php query_close(); ?>	
<?php 
	} else { 
		redirect_to("index"); 

		//this js script is for server
		//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
	} 
?>