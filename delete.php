<?php
include_once('connect.php');
error_reporting(0);
$id =$_GET['id'];
$query = "DELETE FROM sign_up WHERE id = '$id'";
$sql = "SELECT * FROM sign_up WHERE id ='$id'";
$result = mysqli_query($conn,$sql) or die("Connection failed:");
$row = mysqli_fetch_assoc($result);
// print_r($row);
// exit();
unlink("Upload/".$row['file']);
$data = mysqli_query($conn,$query);

if ($data) {
	echo "<script>alert('Record deleted from database')</script>";
	// header ("Location:adminTable.php");
	?>
	<meta http-equiv='refresh' content ='0; url=http://localhost/test/project/adminTable.php'/>
	<?php
}
else{
	echo "<script>alert('Record failed to delete from database')</script>";
}
?>