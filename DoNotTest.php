<?php
     include('connect.php');
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
    <link rel="icon" href="logo.png">
    <title>Netflix</title>
</head>
<style>
    header{
        background-color: black;
        padding-bottom: 15px;
    }
    .navbar-right{
        margin-right: 60px;
        margin-top: 30px;

    }
    h1{
        margin-left: 200px;
    }
    .switch {
    margin-left: 1000px;
    padding-bottom: 20px;
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
    }

    .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
    }

    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #2196F3;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }
    button{
        padding: 20px;
    }
    footer{
    align-items: center;
    margin-top: 220px;
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.847);
    }
</style>
<body>
    <form method="GET">
    <header>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
              <img src="Netflix_Logo_PMS.png" width="170" height="80" class="d-inline-block align-top" alt="">
            </a>
            <div class="navbar-right">
            
            <div class="dropdown">
                <a href="#" id="imageDropdown" data-toggle="dropdown">
                <span><?php'$file'?><img src ='Upload/<?php echo $array[8];?>'height='50px'width='50px'></span>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="imageDropdown">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="YourAccount.php">Your Account</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="helpCenter.php">Help Center</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="logOut.php">Sign Out</a></li>
                </ul>
                </div>
            </div>
          </nav>
        </header>
</form>
        <br>
        <h1>Test participation</h1>
          <br>
          <div class="container">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body"><b>Include me in tests and previews</b><br>
                        <br>Turn this off to be shifted to the standard experience now.
                        <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                         </label>
                    </div>
                </div>
                <p>Participate in tests to help improve the Netflix experience and see potential changes before they are available to all members
                    (the setting does not apply to tests<br> regarding security, anti-fraud, or enforcement of the Netflix Terms of Use).</p>
                <br>
                <label>
                    <!-- <button type="button" class="btn btn-primary">Done</button> -->
                    <a class="btn btn-primary" href="YourAccount.php">Done</a>
                </label>
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
</body>
</html>