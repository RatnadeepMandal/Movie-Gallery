<?php
  $conn = new mysqli('localhost','root','','netflix');
if($conn->connect_error){
  die("Connection failed: " .$conn->connect_error);
}
else{
  if(isset($_POST["submit"])){
    $name = $_POST['name'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $file_name = $_FILES['file']['name'];
		$file_type = $_FILES['file']['type'];
		$file_size = $_FILES['file']['size'];
		$file_tem_loc = $_FILES['file']['tmp_name'];
    $file_store = "Upload/".$file_name;
		move_uploaded_file($file_tem_loc, $file_store);
		// echo "Profile picture uploaded successfully.....";
  }
  else{
    echo"Profile picture failed to upload......";
  }
  $sql = "INSERT INTO sign_up (name,date,gender,email,phone_no,password,cpassword,file) VALUES('$name','$date','$gender','$email','$phone_no','$password','$cpassword','$file_name')";
  $data = mysqli_query($conn,$sql);
  if($data){
    echo "<script> alert ('Sign Up was successfull....') </script>";
    ?>
    <meta http-equiv="refresh" content="0; url = 'http://localhost/test/project/sign_in.php'">
    <?php
  }
  else{
    echo "<script>alert('Sign Up failed......') </script>";
  }
}

?>