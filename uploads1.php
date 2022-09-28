<?php
    session_start();
    $email_r = $_SESSION['email'];
    $password_r = $_SESSION['password'];
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
        header("location:sign_in.php");
        exit;
    }
?>

<?php
  $conn = new mysqli('localhost','root','','netflix');
if($conn->connect_error){
  die("Connection failed: " .$conn->connect_error);
}
else{
  $query= "SELECT id from sign_up WHERE email='$email_r' && password = '$password_r'";
  // echo $query;
  // exit;
  $sqln = mysqli_query($conn, $query);
  $array = mysqli_fetch_assoc($sqln);
  // print_r ($array);
  // exit;
  $id = $array['id'];
  if(isset($_POST["submit"])){
    $movie_name = $_POST['movie_name'];
    $genre=implode($_POST["genre"],",");
    $date = $_POST['date'];
    $description = $_POST['description'];
    $file1_name = $_FILES['file1']['name'];
		$file1_type = $_FILES['file1']['type'];
		$file1_size = $_FILES['file1']['size'];
		$file1_tem_loc = $_FILES['file1']['tmp_name'];
    $file1_store = "Images/".$file1_name;
		move_uploaded_file($file1_tem_loc, $file1_store);

    $file_name = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];
		$file_size = $_FILES['file']['size'];
		$file_tem_loc = $_FILES['file']['tmp_name'];
    $file_store = "Movies/".$file_name;
		move_uploaded_file($file_tem_loc, $file_store);
		echo "Profile picture uploaded successfully.....";
  }
  else{
    echo"Profile picture failed to upload......";
  }

  if(isset($_POST['save_multiple_checkbox']))
  {
    $genre=implode(",",$_POST["genre"]);
      // echo $genre;
      // exit;
  
      foreach($genre as $item)
      {
          // echo $item . "<br>";
          $query = "INSERT INTO movies (name) VALUES ('$item')";
          echo $query_run = mysqli_query($conn, $query);
          array_push($genre,",");
      }
    }
$sql = "INSERT INTO movies (movie_name,file,genre,date,description,id,thumb) VALUES('$movie_name','$file_name','$genre','$date','$description','$id','$file1_name')";
  $data = mysqli_query($conn,$sql);
if ($data) {
	echo "<script>alert('Your Movie has been uploaded')</script>";
	// header ("Location:upload.php");
	?>
	<meta http-equiv='refresh' content ='0; url=http://localhost/test/project/upload.php'/>
	<?php
}
else{
	echo "<script>alert('Your Movie has failed to uoload Try Again!!')</script>";
}
}
?>