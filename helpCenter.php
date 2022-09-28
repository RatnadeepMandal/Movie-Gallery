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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="icon" href="logo.png">
<title>Netflix Help Center</title>
</head>
<style>
  .has-search .form-control-feedback {
    /* right: initial; */
    margin-right: 50ox;
    left: 0;
    color: #ccc;
  }

  .has-search .form-control {
    padding-right: 12px;
    padding-left: 34px;
  }
  header{
        background-color: black;
        padding-bottom: 15px;
    }
    .navbar-right{
        margin-right: 60px;
        margin-top: 30px;

    }
    .search{
      height: 50px;
    }
    
    .help-card{
        display: inline-block;

    }
    .input-group{
        width: 300px;
    }
    footer{
    align-items: center;
    margin-top: 20px;
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.847);
    }
    .col-xs-2{
        text-decoration: none;
        font-size: 15px;
        margin-left: 20px;
    }
    @media(max-width: 500px){
        .image{
            margin-left: 300px;
        }
    }
</style>
<body>
  <form method="GET">
    <?php 

    $query = "SELECT * FROM `sign_up` WHERE email = '$email_r'"; 
    // print_r ($query);
    // exit;
    $result = mysqli_query($conn, $query);
    $array = mysqli_fetch_array($result);
    // print_r($array);
    // exit;
    ?>
    <header>
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="home.php">
              <img src="Netflix_Logo_PMS.png" width="170" height="80" class="d-inline-block align-top" alt="">
            </a>
            <div class="navbar-right">
            
            <div class="dropdown">
                <a href="#" id="imageDropdown" data-toggle="dropdown">
                <span><?php'$file'?><img class="image" src ='Upload/<?php echo $array[8];?>'height='50px'width='50px'></span>
                </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="imageDropdown">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="YourAccount.php">Your Account</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="logOut.php">Sign Out</a></li>
                </ul>
                </div>
            </div>
          </nav>
          <center>
            <h1>Help Center</h1>
            <div class="container search">
              <!-- <div class="col-xs-6"> -->

            <div class="form-group has-feedback has-search">
    <span class="glyphicon glyphicon-search form-control-feedback"></span>
    <input type="text" class="form-control rounded" placeholder="Search">
  </div>
  <!-- </div> -->
  </div>
  </center>
        </header>

        <div class="container">
        <h1><b>Hi, User</b></h1>
        <p>Recommended for you</p>
        <div class="row col-md-6">
        <div class="panel panel-default">
    <div class="panel-body"><i class="fa-regular fa-memo"></i><a href="black.php">Black screen with sound</a></div>
  </div>
  </div>
        <div class="row col-md-6">
        <div class="panel panel-default">
    <div class="panel-body"><a href="#">How to update Netflix account information</a></div>
  </div>
  </div>
        <div class="row col-md-6">
        <div class="panel panel-default">
    <div class="panel-body"><a href="#">Poor quality or distorted video</a></div>
  </div>
  </div>

    </div>
      <br>
      <hr>
      <br>
      <div class="container">
        <div class="row">
            <div class="col-xs-3 col-offset-1">
                <h4><b>Manage My Account</b></h4>
                <ul>
                    <li>Plans and Pricing</li>
                    <li>I received an email stating there was a new sign-in to my account</li>
                    <li>How to change your plan</li>
                </ul>
            </div>
            <div class="col-xs-3">
                <h4><b>Can't Watch</b></h4>
                <ul>
                    <li>How to change your Movieflix password</li>
                    <li>Movieflix says to singup when you try to signin</li>
                    <li>Movieflix says 'This app is not compatible with your device</li>
                </ul>
            </div>
            <div class="col-xs-3">
                <h4><b>Billing Questions</b></h4>
                <ul>
                    <li>How to pay for Movieflix</li>
                    <li>Biling and Payments</li>
                    <li>Moviefilx Gift Cards</li>
                </ul>
            </div>
            <div class="col-xs-3">
                <h4><b>Watching Movieflix</b></h4>
                <ul>
                    <li>How to create, change or delete profiles</li>
                    <li>How to watch Movieflix on TV</li>
                    <li>How to download titles to watch offline</li>
                </ul>
            </div>
            <!-- <div class="col-xs-2">
                <h3><b>Quick Links</b></h3>
                <ul>
                    <li>Request TV shows or movies <i class="fa-thin fa-angle-right"></i></li>
                    <li>Update Email <i class="fa-thin fa-angle-right"></i></li>
                    <li>Update Password <i class="fa-thin fa-angle-right"></i></li>
                    <li>Update Payment Mode <i class="fa-thin fa-angle-right"></i></li>
                    <li>Cancel Account <i class="fa-thin fa-angle-right"></i></li>
                    <li>Review Payment History <i class="fa-thin fa-angle-right"></i></li>
                    <li>Content Grievances in India <i class="fa-thin fa-angle-right"></i></li>
                </ul>
            </div> -->
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
    <script data-fa-detection-ignore type="text/javascript">
        window.FontAwesomeDetection = {
          timeout: 1000,
          report: function(params){
            // Do your own reporting here
          }
        }
      </script>

      <script type="text/javascript" src="https://example.com/fontawesome/v6.1.2/js/conflict-detection.js">
      </script>
</body>
</html>