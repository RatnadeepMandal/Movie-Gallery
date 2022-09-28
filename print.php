<?php
include_once('connect.php');
?>

<?php
    // session_start();
    $email_r = $_SESSION['email'];
    $password_r = $_SESSION['password'];
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
        header("location:sign_in.php");
        exit;
    }
?>

<?php
$sql = "SELECT * FROM sign_up WHERE email = '$email_r' && password = '$password_r'";
$data = mysqli_query($conn,$sql);
$array = mysqli_fetch_assoc($data);
// print_r($array);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="icon" href="logo.png">
	<title>Netflix | Your info</title>
	<style type="text/css">
		.root{
			margin-top: 30px;
		}
		.col-md-8{
			/*text-align: center;*/
			justify-content: center;
		}
		.col-md-4{
			text-align: right;
		}
		.container{
			border: 1px solid black;
		}
		@media only screen and (max-width: 768px) {
      /* For mobile phones: */
      [class*="col-"] {
        width: 100%;
      }
  }
	</style>
</head>
<body>
	<div class="root">
	
	<div class="container">
	<div class="col-md-4">
			<br><br><br>
			<img src ='Upload/<?php echo $array['file'];?>'height='70px'width='70px'>
		</div>
		<div class="col-md-8">
			<br><br>
			<div class="panel">
			<label style="font-size: 20px; font-family: Helvetica Neue;">Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;
			<label style="font-size: 16px; font-family: Helvetica Neue;"><?php echo $array['name'];?></label>
			</div>
			<div class="panel">
			<label style="font-size: 20px; font-family: Helvetica Neue;">Date Of Birth (yyyy-mm-dd):</label>&nbsp;&nbsp;&nbsp;&nbsp;
			<label style="font-size: 16px; font-family: Helvetica Neue;"><?php echo $array['date'];?></label>
			</div>
			<div class="panel">
			<label style="font-size: 20px; font-family: Helvetica Neue;">Gender:</label>&nbsp;&nbsp;&nbsp;&nbsp;
			<label style="font-size: 16px; font-family: Helvetica Neue;"><?php echo $array['gender'];?></label>
			</div>
			<div class="panel">
			<label style="font-size: 20px; font-family: Helvetica Neue;">Email:</label>&nbsp;&nbsp;&nbsp;&nbsp;
			<label style="font-size: 16px; font-family: Helvetica Neue;"><?php echo $array['email'];?></label>
			</div>
			<div class="panel">
			<label style="font-size: 20px; font-family: Helvetica Neue;">Phone Number:</label>&nbsp;&nbsp;&nbsp;&nbsp;
			<label style="font-size: 16px; font-family: Helvetica Neue;"><?php echo $array['phone_no'];?></label>
			</div>
			<div class="panel">
			<label style="font-size: 20px; font-family: Helvetica Neue;">Password:</label>&nbsp;&nbsp;&nbsp;&nbsp;
			<label style="font-size: 16px; font-family: Helvetica Neue;"><?php echo $array['password'];?></label>
			</div>
		</div>
	</div>
	</div>
	<script>
         function display() {
            window.print(print.php);
         }
      </script>
</body>
</html>