<?php  

function random_password($chars = 3) {
   $letters = '1234567890';
   return substr(str_shuffle($letters), 0, $chars);
}

function captcha($chars = 5) {
   $letters = '12345abcdef';
   return substr(str_shuffle($letters), 0, $chars);
}

function redirect_to($location = NULL){
	if($location != NULL){
		header("Location: {$location}");
		exit;
	}	
}

function escape_value($value){
    $magic_quotes_active = get_magic_quotes_gpc();
    $new_enough_php = function_exists("mysqli_real_escape_string");
    //i.e. PHP >= v4.3.0
    if($new_enough_php){
        //PHP v4.3.0 or higher
        //undo any magic quote effects fo mysql_real_escape_string can dothe work
        if($magic_quotes_active){
            $value = stripslashes($value);
        } else {
            // before PHP v4.3.0
            //if magic quotes aren't already on then add slashes manually
            if(!$magic_quotes_active) {
                $value = addslashes($value);
            }
            // if magic quotes are active, then the slashes already exist
            return $value;
        }   
    }
}

function query($str) {
    global $connection;
    $sel_query = mysqli_query($connection,$str);
    return $sel_query;
}

function fetch($str) {
    $row = mysqli_fetch_array($str);
    return $row;
}

function query_close() {
    global $connection;
    $query = mysqli_close($connection);
    return $query;
}

function num_rows($str) {
    $total_records = mysqli_num_rows($str);
    return $total_records;
}

function the_title(){
    $query = "SELECT name FROM details";
    $result = query($query);
    if($row = fetch($result)){
        echo $row['name'];
    }
}

function the_image(){
    $query = "SELECT image FROM details";
    $result = query($query);
    if($row = fetch($result)){
        echo $row['image'];
    }
}

function the_notice(){
    $query = "SELECT * FROM notice WHERE user_category = '{$_SESSION['user_category']}' OR user_category = 'all'";
    $result = query($query);
    if($row = fetch($result)){
        echo '<small><a class="notice" href="notice" title="notice"><i class="fa fa-bell white"></i></a></small>';
    }
}

function user_staff(){
	if ($_SESSION['user_category'] == 'staff') {
		return "hide";
	}
}

function user_cook(){
   if ($_SESSION['user_category'] == 'cook') {
        return "hide";
    }
}

function user_manager(){
  if ($_SESSION['user_category'] == 'manager') {
        return "hide";
    }
}

function discount($val){
    global $connection;
    $query = "SELECT discount_percent FROM discount WHERE discount_code = '{$val}'";
    $result = query($query);
    if ($row = fetch($result)) { 
        return $row['discount_percent']/100; 
    } 
}

function month_id($string) {
    $a = array('Janauary', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $b = array(1,2,3,4,5,6,7,8,9,10,11,12);
    $val = str_replace($a, $b, $string);
    return $val;
}

function encrypt_decrypt($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'Your Secret Key key';
    $secret_iv = 'Your Secret Key iv';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

function stock_editor($string) {
    $a = array('admin','cook','manager');
    $b = array('<span class="text-info">Admin</span>','<span class="text-warning">Cook</span>','<span class="text-success">Manager</span>');
    $string = str_replace($a, $b, $string);
    return $string;
}

function success_message($str) {
    $_SESSION['create'] = $str;
}

function display_success_message() {
    if (isset($_SESSION['create'])){
        echo "<p class='alert alert-success text-center' style='cursor:pointer;' onClick='$(this).slideUp();'><i class='fa fa-times'></i> ".$_SESSION['create']."</p>";
        unset($_SESSION['create']);
    }
}


?>
