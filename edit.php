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

$query = "SELECT * FROM `sign_up` WHERE email = '$email_r' && password = '$password_r'"; 
// print_r ($query);
// exit;
$result = mysqli_query($conn, $query);
$array = mysqli_fetch_array($result);
// print_r($array);
// exit;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="logo.png">
    <title>Edit</title>
</head>
<style>
    body{
        overflow-x: hidden;
    }
    header{
        background-color: black;
        padding-bottom: 15px;
    }
    .navbar-right{
        margin-right: 60px;
        margin-top: 30px;

    }
    #message {
        display:none;
        background: #f1f1f1;
        color: #000;
        position: relative;
        padding: 20px;
        margin-top: 10px;
    }

    #message p {
        padding: 10px 35px;
        font-size: 18px;
    }
    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
        color: green;
    }

    .valid:before {
        position: relative;
        left: -35px;
        content: "✔";
    }

    /* Add a red text color and an "x" when the requirements are wrong */
    .invalid {
        color: red;
    }

    .invalid:before {
        position: relative;
        left: -35px;
        content: "✖";
    }
    footer{
        align-items: center;
        margin-top: 20px;
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.847);
    }
    @media(max-width: 500px){
        .image{
            margin-left: 300px;
        }
    }
</style>
<body>
<form method="POST" onsubmit ="return validation()" enctype="multipart/form-data">
        <header>
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="home.php">
                  <img href="home.php" src="Netflix_Logo_PMS.png" width="170" height="80" class="d-inline-block align-top" alt="">
                </a>
                <div class="navbar-right">
                
                <div class="dropdown">
                    <a href="#" id="imageDropdown" data-toggle="dropdown">
                    <span><?php'$file'?><img class="image" src ='Upload/<?php echo $array[8];?>'height='50px'width='50px'></span>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="imageDropdown">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="YourAccount.php">Your Account</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="upload.php">Upload</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Download</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="helpCenter.php">Help Center</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="logOut.php">Sign Out</a></li>
                    </ul>
                    </div>
                </div>
              </nav>
            </header>
                <div class="container">
                <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" id="name" value="<?php echo $array[1];?>" placeholder="Enter your name" reqired>
                </div>
                <div class="form-group">
                        <label for="date">DOB</label>
                        <input type="date" name="date" class="form-control" id="date" value="<?php echo $array[2];?>" placeholder="date" required>
                        <input type="hidden" name="id" value = "<?=$array[0]?>" />
                </div>
                <div class="form-group">
                      <label for="gender">Gender</label>
                      <div>
                      <label for="male" class="radio-inline"><input type="radio" name="gender" value="m"<?php if($array[3] == "m"){ echo "checked";}?> id="male">Male </label>
                      <label for="female" class="radio-inline"><input type="radio" name="gender" value="f"<?php if($array[3] == "f"){ echo "checked";}?> id="female">Female </label>
                      <label for="others" class="radio-inline"><input type="radio" name="gender" value="o"<?php if($array[3] == "o"){ echo "checked";}?> id="others">Others </label>
                      </div>
                </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email" class="form-control" id="email" value="<?php echo $array[4];?>" placeholder="Enter your Email" onInput ="checkEmail()" required>
                      <span id = "text" style="color:red;"></span>
                </div>
                <div class="form-group">
                        <label for="phone_no">Phone_no.</label>
                        <input type="text" name="phone_no" class="form-control" id="phone_no" value="<?php echo $array[5];?>" placeholder="Enter your 10 digits mobile number" required>
                        <br>
                        <span id="phone" style="color:red"></span>
                </div>
                <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password" value="<?php echo $array[6];?>" placeholder="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{7,16}$" required>
                        <span id = "message" style="color:red">a uppercase, a lowercase, a number and a special charecter is requied.</span>
                </div>
                <div class="form-group">
                        <label for="password">Confirmed Password</label>
                        <input type="text" name="cpassword" class="form-control" id="cpassword" value="<?php echo $array[7];?>" placeholder="Confirm password" required>
                        <span id='cmessage'></span>
                </div>
                <div id="message">
                <h3>Password must contain the following:</h3>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="schar" class="invalid">A <b>Special Charecters</b></p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
                <div class="form-group custom-file">
                    <input type="file" class="custom-file-input" name="file" id="file">
                    <input type="hidden" name="file_old" value ="<?php echo $array[8] ?>">
                </div>
                <div class="form-group">
                    <button type="sumbit" name = "submit" id="submit" class="btn btn-info btn-lg btn-block">Update</button>
                  </div>
                </div>
    </form>
    <footer>
        <div class="container">
            <center>
            <div class="row col-md-4">
                <h4>Contact us</h4>
                <p>Call : <a href="tel:9999988888">9999988888</a></p>
                <p>Mail : <a href="mailto:abc@gmail.com">abc@gmail.com</a></p>
            </div>
            <div class="row col-md-4">
                <h4>Follow on social media</h4>
                <a href="https://www.facebook.com/ratnadeep.mandal.94/" class="fa fa-facebook"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="https://www.instagram.com/ratnadeep_mandal/" class="fa fa-instagram"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="https://twitter.com/Ratnade07292124" class="fa fa-twitter"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="https://www.linkedin.com/in/ratnadeep-mandal-8b8255196/" class="fa fa-linkedin"></a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="https://github.com/RatnadeepMandal" class="fa fa-github"></a>
            </div>
            <div class="row col-md-4">
                <h4>About us</h4>
                <p><a>Terms of use</a></p>
                <p><a>Privacy</a></p>
                <p><a>Help center</a></p>
            </div>
        </center>
        </div>
    </footer>
    <script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var schar = document.getElementById("schar");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate specialCharecters
  var schars = /[!@#$%^&*_=+-]/g;
  if(myInput.value.match(schars)) {  
    schar.classList.remove("invalid");
    schar.classList.add("valid");
  } else {
    schar.classList.remove("valid");
    schar.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
$('#password, #cpassword').on('keyup', function () {
  if ($('#password').val() == $('#cpassword').val()) {
    $('#cmessage').html('*<em>Password matched</em>').css('color', 'green');
  } else 
    $('#cmessage').html('<em>*Confirm password should match with password</em>').css('color', 'red');
});
</script>
<script>
    function validation(){
        var a = document.getElementById('phone_no').value;
  if (a=="") {
    document.getElementById('phone').innerHTML = "**Phone Number is required";
    return false;
  }
  if (isNaN(a)) {
    document.getElementById('phone').innerHTML = "**Please Enter a valid Phone Number";
    return false;
  }
  if (a.length<10) {
    document.getElementById('phone').innerHTML = "**Phone number can not be less than 10 digits";
    return false;
  }
  if (a.length>10) {
    document.getElementById('phone').innerHTML = "**Phone number can not be more than 10 digits";
    return false;
  }
  if ((a.charAt(0)!=9) && (a.charAt(0)!=8) && (a.charAt(0)!=7) && (a.charAt(0)!=6)){
    document.getElementById('phone').innerHTML = "**Please enter a valid mobile number";
    return false;
  }
    }
    function checkEmail(){
    jQuery.ajax({
      url: "check_avalability.php",
      data:'email='+$("#email").val(),
      type : "POST",
      success:function(data){
        $("#text").html(data);
    },
    error : function(){}
  });
  }
</script>
</body>
</html>
<?php
  if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $name=$_POST['name']; 
    $date=$_POST['date'];
    $gender=$_POST['gender'];            
    $email=$_POST['email'];
    $phone_no=$_POST['phone_no'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $file_old= $_POST['file_old'];
    $file_name = $_FILES['file']['name'];
    if ($file_name != '') {
        if(file_exists("Upload/".$file_name)){
                echo "<script>alert('Image already exists')</script>";
            }
            else{
                $file_update = $file_name;
                $file_type = $_FILES['file']['type'];
                $file_size = $_FILES['file']['size'];
                $file_tem_loc = $_FILES['file']['tmp_name'];
                $file_store = "Upload/".$file_update;
                $move = move_uploaded_file($file_tem_loc, $file_store);
                // echo $file_update;
                // exit;
            }
    }
    else {
        $file_update = $file_old;
    }
    $query= "UPDATE sign_up SET name='$name', date='$date', gender = '$gender', email='$email', phone_no= '$phone_no',password='$password', cpassword='$cpassword',file='$file_update' where id= '$id'";
    // echo $query;
    // exit;
    $data = mysqli_query($conn, $query);
     if($data){
        if ($move) {
            unlink("Upload/".$file_old);
        }
      echo "<script> alert('Record Updated')</script>";
      ?>
    <meta http-equiv='refresh' content ='0; url=http://localhost/test/project/sign_in.php'/>
    <?php
     }
     else{
      echo "<script> alert('Failed to update record')</script>";
    }
}
?>