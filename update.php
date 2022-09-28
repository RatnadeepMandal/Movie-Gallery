<?php
error_reporting(0);
	include('connect.php');
	$id = $_GET['id'];
	$query = mysqli_query($conn,"SELECT * FROM sign_up WHERE id = '$id'");
	$array = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="logo.png">
    <title>Netflix | Sign up</title>
<style>
      @media only screen and (max-width: 768px) {
    /* For mobile phones: */
    [class*="col-"] {
      width: 100%;
    }  
  .btn{
    float: right;
    display: block;
  }
  }
.navbar-right{
    margin: 25px 0px;
}
.panel > .panel-heading {
    /* background-image: none; */
    background-color: brown;
    color: white;

}
.panel > .panel-body{
    border-color: brown;
}
#text{
  display: block;
  color: #000;
  font-weight: 300;
  font-style: italic;
  padding: 5px;
}

    </style>
</head>
<body>
    <!-- Image and text -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="Netflix_Logo_PMS.png" width="150" height="50" class="d-inline-block align-top" alt="">
    </a>
    <div class="navbar-right">
      <a href="sign_in.html" class="btn btn-danger">Sign in &nbsp;<span class="glyphicon glyphicon-log-in"></span></a>
    </div>
  </nav>
  <div class="container">
    <div class="row col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel panel-heading">
              <h1>Sign up</h1>
            </div>
            <div class="panel panel-body">
                <form id="form" method="POST" onsubmit ="return verifyPassword()">
                  <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class = "form-control input-lg" id="name" name="name" placeholder="Enter your full name" value ="<?php echo $array[name]; ?>" required>
                <input type="hidden" name="id" value="<?php echo $array[id];?>" />
                  </div>
                  <div class="form-group">
                    <label for="date">Date of birth:</label>
                    <input class="form-control input-lg" id="date" type="date" name="date" placeholder="DD/MM/YYYY" type="text" value ="<?php echo $array[date]; ?>" required />
                  </div>
                  <div class="form-group">
                    <label for="gender">Gender:</label>
                      <div>
                      <label for="male" class="radio-inline"><input type="radio" name="gender" value="m" <?php if($array[gender]==m){echo "checked";}?> id="male">Male </label>
                      <label for="female" class="radio-inline"><input type="radio" name="gender" value="f" <?php if($array[gender]==f){echo "checked";}?> id="female">Female </label>
                      <label for="others" class="radio-inline"><input type="radio" name="gender" value="o" <?php if($array[gender]==o){echo "checked";}?> id="others">Others </label>
                      </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="text" class = "form-control input-lg" id="email" name="email" placeholder="Enter your email address" value ="<?php echo $array[email] ?>" onkeydown="validation()" required>
                    <span id = "text"></span>
                  </div>
                  <div class="form-group">
                    <label for="phone_no">Phone Number:</label>
                    <input type="text" class = "form-control input-lg" id="phone_no" name="phone_no" placeholder="Enter your 10 digits mobile number"value ="<?php echo $array[phone_no] ?>">
                  </div>
                  <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class = "form-control input-lg" id="password" name="password" placeholder="Password" value ="<?php echo $array[password] ?>"required>
                    <span id = "message" style="color:red"> </span>
                    <!-- <button type = "reset" value = "Reset" >Reset</button>  -->
                  </div>
                  <div class="form-group">
                    <label for="cpassword">Confirm password:</label>
                    <input type="password" class = "form-control input-lg" id="cpassword" name="cpassword" placeholder="Confirm password" value ="<?php echo $array[cpassword] ?>" required>
                    <span id='cmessage'></span>
                  </div>
                  <!-- <div class="input-group mb-3 custom-file">
                    <label for="file">Choose your profile picture:</label>
                    <input type="file" class="custom-file-input" name="file" id="file" name = "file" onchange="return fileValidation()" required><br>
                  </div> -->
                  <div id="imagePreview"></div>
                  <div class="form-group form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault" required>Remember me</label>
                  </div>
                  <div class="form-group">
                    <button type="sumbit" name="submit" class="btn btn-danger btn-lg btn-block">Sign up</button>
                  </div>
                  <div class="form-group form-check">
                    <input class="form-check-input" type="checkbox" id = "CheckDefault">
                    <label class="form-check-level" for="CheckboxDefault" required>Agree to all terms and conditions<a href="">*</a></label>
                  </div>
                  </form>
          </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function validation()
    {
      var form = document.getElementById('form');
      var email = document.getElementById('email').value;
      var text = document.getElementById('text');
      var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
      if (email.match(pattern)) {
        form.classList.add('valid');
        form.classList.remove('invalid');
        text.innerHTML = "Valid email address";
        text.style.color = "#00ff00";
      }
      else{
        form.classList.remove('valid');
        form.classList.add('invalid');
        text.innerHTML = "Please enter valid email address";
        text.style.color = "#ff0000";
      }
      if (email = "") {
        form.classList.remove('valid');
        form.classList.remove('invalid');
        text.innerHTML = "";
        text.style.color = "#00ff00";
      }
    }
    function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'" height="100px" width="100px"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function verifyPassword() {  
  var pw = document.getElementById("password").value;  
  //check empty password field  
  if(pw == "") {  
     document.getElementById("message").innerHTML = "**Fill the password please!";  
     return false;  
  }  
   
 //minimum password length validation  
  if(pw.length < 8) {  
     document.getElementById("message").innerHTML = "**Password length must be atleast 8 characters";  
     return false;  
  }  
  
//maximum length of password validation  
  if(pw.length > 15) {  
     document.getElementById("message").innerHTML = "**Password length must not exceed 15 characters";  
     return false;  
  } else {  
     // alert("Password is correct");  
  }  
}
$('#password, #cpassword').on('keyup', function () {
  if ($('#password').val() == $('#cpassword').val()) {
    $('#cmessage').html('*<em>Password matched</em>').css('color', 'green');
  } else 
    $('#cmessage').html('<em>*Confirm password should match with password</em>').css('color', 'red');
});
  </script>
</body>
</html>
<?php 
	if (isset($_POST['submit'])) {
		$id=$_POST['id'];
		$name = $_POST['name'];
		$date = $_POST['date'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$phone_no = $_POST['phone_no'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		// $file = $_POST['file'];
$sql = "UPDATE sign_up SET name='$name', date='$date', gender='$gender', email='$email', phone_no='$phone_no', password='$password', cpassword='$cpassword' WHERE id='$id'";
// echo $sql;
// exit;
$data =mysqli_query($conn,$sql);
if($data)
{
	echo "<script> alert('Record Updated')</script>";
	?>
	<meta http-equiv='refresh' content ='0; url=http://localhost/test/project/adminTable.php'/>
	<?php
}
else{
	echo "<script> alert('Failed to update record')</script>";
}
}
?>
