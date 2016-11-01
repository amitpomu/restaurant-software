<?php include ('inc/header.php'); ?>
<?php if( !user_cook() ){ ?>
<h2 class="page-title">Create Order</h2>
<hr>
	<form class="form-inline" method="POST" style="padding:15px;">
		<label>Quantity</label> 
		<input class="form-control" type="number" name="qty" min="1" value="1" required>
		<br>
		<label>Order Code</label>
		<input class="form-control" type="number" name="code" value="<?php echo random_password(); ?>" required>
		<br>
		<label>Delivery Type</label>
		<select class="form-control" name="delivery-type" >
		<option>Eat In</option>
		<option>Take Away</option>
		<option>Home Delivery</option>
		</select>
		<br>	
		<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check"></i>Approve</button>
		<a class="btn btn-warning filter-btn" href="shop"><i class="fa fa-times"></i>Cancel</a>
		<?php if(!user_staff()){ ?>
		<hr>
		<h3 class="page-title">For Employee Meal</h3>
		<label>Employee Name</label>
		<select class="chosen-select form-control"  tabindex="2" name="employee" data-placeholder="Select Employee">
		<option></option>
		<?php  
			$query = "SELECT id, name FROM employee ORDER BY name";
			$result = query($query);
			while( $row = fetch($result)) {
				echo "<option value='".$row['id']."'>".$row['name']."</option>";
			}
		?>
		</select>
		<br>
		<button type="submit" name="emp-meal" class="btn btn-info"><i class="fa fa-check"></i>Approve</button>
		<?php } ?>
	</form>
	

	
<?php include ('inc/footer.php'); ?>	


<?php 

if (isset($_POST['qty']) && isset($_POST['code']) && isset($_POST['delivery-type']) && $_POST['qty'] != null && $_POST['code'] != null && $_POST['delivery-type'] != null){

$qty = 	abs($_POST['qty']);
$code = $_POST['code'];
$delivery = $_POST['delivery-type'];
$user = $_SESSION['username'];
$user_id = $_SESSION['user_id'];

$id = encrypt_decrypt('decrypt', $_GET['val']);	
$id_qry = "SELECT * FROM subject WHERE id = {$id} LIMIT 1";
$sel_id = query($id_qry);
$row = fetch($sel_id);

$name = $row['name'];
$price = $row['price'];
$till = $_SESSION['till'];

$dt = new DateTime("now", new DateTimeZone('Asia/Kathmandu'));
$from_time = $dt->format('H:i:s');
$date = $dt->format("Y/m/d");
$year = $dt->format("Y");
$month = $dt->format("F");

$query = "INSERT INTO shop (id,code,name,price,quantity,delivery_type,order_time) VALUES (null,{$code},'{$name}',{$price},{$qty},'{$delivery}','{$from_time}')";
			$row = query($query);
			if($row){
				echo "success";
				
			}else {
				echo "failed";
			}


if (isset($_POST['emp-meal'])){
$emp_id = $_POST['employee'];
$id_qry = "SELECT * FROM employee WHERE id = {$emp_id} LIMIT 1";
$sel_id = query($id_qry);
$row = fetch($sel_id);
$employee = $row['name'];
	
//employee_meal
$query = "INSERT INTO employee_meal (id,year,month,meal_date,employee,emp_id,meal,quantity,price) VALUES (null,{$year},'{$month}','{$date}','{$employee}',{$emp_id},'{$name}',{$qty},{$price}*{$qty})";
			$row = query($query);
			if($row){
				echo "success";
				redirect_to("shop");
			} else {
				echo "failed";
			}	

} elseif (isset($_POST['submit'])) {


// report
$query = "INSERT INTO report (id,report_date,visible,code,name,price,quantity,total_sales,delivery_type,from_time,user_id,user) VALUES (null,'{$date}',1,{$code},'{$name}',{$price},{$qty},{$price}*{$qty},'{$delivery}','{$from_time}', {$user_id}, '{$user}')";
			$row = query($query);
			if($row){
				echo "success";				
			}else {
				echo "failed";
			}	

//cart
$query = "INSERT INTO cart (id,till,code,name,price,quantity,total_price) VALUES (null,{$till},{$code},'{$name}',{$price},{$qty},{$price}*{$qty})";
			$row = query($query);
			if($row){
				echo "success";
				redirect_to("shop");

				//this js script is for server
				// echo "<script type=\"text/javascript\"> window.location='shop.php'</script>";

				// header("location: shop.php");
				// exit;
			} else {
				echo "failed";
			}					
	}
}
?>
<?php 
	} else { 
		redirect_to("index"); 

		//this js script is for server
		//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
	} 
?>