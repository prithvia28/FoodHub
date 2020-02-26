<?php
error_reporting(0);
echo "<a href='db_data.php'>Got to database Page</a><br><br>";
include("connection.php");
$img = $_GET['i'];
$id = $_GET['w'];
if($img!=NULL)
{
	die("Image exists...<br><br>Delete The existing Image....");
}
?>

<html>
	<body>
		<form action="" method="POST" enctype="multipart/form-data">
		<input name="w" type="number" min=1 value="">
			<input type="file" value="" name="i" />
			<input type="submit" name="e" value="Upload Image"/>
		</form>
	</body>
</html>

<?php
if($_POST['e'])
{
	$id = $_POST['w'];
	$pic = $_FILES['i'];
	print_r($_FILES['i']);
	$filename = $_FILES['i']['name'];
	$imgt = $_FILES['i']['tmp_name'];
	$folder = "images/".$filename;
	$quer = "Update food set food_image='$folder' where food_id='$id'";
	$result = mysqli_query($conn,$quer);
	move_uploaded_file($imgt,$folder);
	if($result)
	{
		echo "Image Uploaded Successfully....";
	}
	else
	{
		echo "Error in upload of Image....";
	}
}

?>