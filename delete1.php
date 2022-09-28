<?php
include_once('connect.php');
error_reporting(0);
$movie_id =$_GET['movie_id'];
$query = "DELETE FROM movies WHERE movie_id = '$movie_id'";
$sql = "SELECT * FROM movies WHERE movie_id ='$movie_id'";
$result = mysqli_query($conn,$sql) or die("Connection failed:");
$row = mysqli_fetch_assoc($result);
// print_r($row);
// exit();
unlink("Images/".$row['thumb']);
unlink("Movies/".$row['file']);
$data = mysqli_query($conn,$query);

if ($data) {
	echo "<script>alert('Record deleted from database')</script>";
	// header ("Location:adminTable.php");
	?>
	<meta http-equiv='refresh' content ='0; url=http://localhost/test/project/upload.php'/>
	<?php
}
else{
	echo "<script>alert('Record failed to delete from database')</script>";
}
?>