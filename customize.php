<?php include ('inc/header.php'); ?>
<?php if( !user_staff() && !user_cook() && !user_manager() ){ ?>
<h2 class="page-title">Customize</h2>
<form class="form-inline" action="" method="POST" style="padding:15px;" enctype="multipart/form-data">
<label>Restaurant Title</label>
<input class="form-control" type="text" name="name" value="<?php the_title(); ?>">
<br>
    <label>Update Dashboard Image:</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Submit</button>
</form>

<?php
if (isset($_POST['name']) && !empty($_POST['name'])) {
$title = $_POST['name'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    	
         echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
	$query = "SELECT * FROM details";
	$result = query($query);
	if ($row = fetch($result)) {
		$id = $row['id'];
	}
	
	 $image = basename($_FILES["fileToUpload"]["name"]);
         $query = "UPDATE details SET name = '{$title}',image = '{$image}' WHERE id = {$id}";
	
        $result = query($query);
        if($result){
        	redirect_to('index');

        	//this js script is for server
			//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
        }

 }
?> 
<?php include ('inc/footer.php'); ?>
<?php query_close(); ?>
<?php 
	} else { 
		redirect_to("index.php"); 

		//this js script is for server
		//echo "<script type=\"text/javascript\"> window.location='index.php'</script>";
	} 
?>
