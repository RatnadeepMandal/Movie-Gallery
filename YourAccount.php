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
$result = mysqli_query($conn, $query);
$array = mysqli_fetch_array($result);
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
      <link rel="icon" href="logo.png">
      <title>Account Settings-Netflix</title>
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
    hr{
        color: gray;
    }
    footer{
    align-items: center;
    margin-top: 20px;
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.847);
    }
    hr{
        height: 10px;
    }
    @media(max-width: 500px){
        .image{
            margin-left: 300px;
        }
    }
</style>
<body>
    <form method="GET">
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
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="upload.php">Upload</a></li>
                    <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Download</a></li> -->
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="helpCenter.php">Help Center</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="logOut.php">Sign Out</a></li>
                </ul>
                </div>
            </div>
          </nav>
        </header>
        <div class="container">
            <div class="col-md-12">
                <h2>Account</h2>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h3>MEMBERSHIP & BILLING</h3>
                        <a class="btn btn-primary" href="edit.php">Edit Your Profile</a>
                    </div>
                    <div class="col-md-4">
                        <label>Name:  <?php'$name'?><?php echo $array[1];?></label><br>
                        <label>E-mail:  <?php'$email'?><?php echo $array[4];?></label><br>
                        <label>Password: <?php'$password'?><?php echo $array[6];?></label><br>
                        <label>Phone_no:  <?php'$phone_no'?><?php echo $array[5];?></label><br>
                        <label>DOB:  <?php'$date'?><?php echo $array[2];?></label><br>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h3>Streaming Quality</h3>
                        
                    </div>
                    <div class="col-md-4">
                        <br>
                        <span><b>1080p | FULL HD</b></span><br>
                       
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h3>Settings</h3>
                        
                    </div>
                    <div class="col-md-4">
                        <span><a href="DoNotTest.php">Test Participation</a></span><br>
                        <!-- <span><a href="download.php">Manage Download Devices</a></span><br> -->
                        <!-- <span><a>Recent Device Streaming Activity</a></span><br> -->
                        <span><a href="logOut.php">Sign out of all devices</a></span><br>
                        <span><a onclick="frames['frame'].print()">Download Your Personal Information</a></span>
                        <iframe src="print.php" style="display:none;" name="frame"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <center>
                <div class="row col-md-4">
                    <h4>Contact us</h4>
                    <p>Call : <a href="tel:7407788005">7407788005</a></p>
                    <p>Mail : <a href="mailto:20193010.it@gmail.com">20193010.it@gmail.com</a></p>
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
                    <p><a href="helpCenter.php">Help center</a></p>
                </div>
            </center>
            </div>
        </footer>
</form>
<script>
    function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>
</html>