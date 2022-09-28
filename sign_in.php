<?php
    if(isset($_POST['submit'])){
      $conn = mysqli_connect('localhost', 'root', '', 'netflix');
      if (isset($_POST['submit'])){
      $email =$_POST['email'];
      $password=$_POST["password"];
      if ($email == "admin@gmail.com" && $password == "Admin@1234") {
          $sql = "SELECT * FROM sign_up WHERE email = 'admin@gmail.com' AND password = 'Admin@1234'";
          $result = mysqli_query($conn,$sql);
          $total1 = mysqli_num_rows($result);
          // echo $total1;
          // exit;
          if ($total1==1) {
              session_start();
               $_SESSION['loggedin'] = true;
              $_SESSION['email'] = "admin@gmail.com";
            #exit;
              $_SESSION['password'] = "Admin@1234";
              header("location:adminTable.php");
          }
          else{
            echo "<script>alert('You have entered a wrong email or password')</script>";
          }
      }
      else{
    $query = "SELECT * FROM sign_up WHERE email ='$email' && password='$password'";
      $data = mysqli_query($conn, $query);
      $total = mysqli_num_rows($data);
          if($total == 1)
          {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            if(isset($_POST["remember"])) {
                setcookie ("email",$_POST["email"],time()+ 3600);
                setcookie ("password",$_POST["password"],time()+ 3600);
                setcookie ("remember",$_POST["remember"],time()+ 3600);
                echo "Cookies Set Successfuly";
            } else if(!isset($_POST['remember'])){
                unset($_COOKIE['email']);
                unset($_COOKIE['password']);
                unset($_COOKIE['remember']);
                setcookie('email',null ,time()+ 3600 );
                setcookie('password',null ,time()+ 3600 );
                setcookie('remember',null ,time()+ 3600 );
            }
            else{
                setcookie("email","");
                setcookie("password","");
                echo "Cookies Not Set";
            }
            header("location:home.php");
          }
          else{
                echo "<script>alert('You have entered a wrong email or password')</script>";
              }
    }
   }
}
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
<style>
    .panel {
        margin-top: 50px;
	background-color: rgba(0, 0, 0, 0.847);
	/* border-radius: 5px; */
	box-shadow: 0 0 10px #7F000000;
  }
  .root{
    background-image: url('a.jpg');
  }
  footer{
      align-items: center;
      margin-top: 20px;
      padding: 20px;
      background-color: rgba(0, 0, 0, 0.847);
  }
  .fa {
    /* padding: 30px;  */
    font-size: 20px;
    /* height: 5px; */
    /* width:5px; */
    text-align: center;
    text-decoration: none;
    /* margin: 5px 5px; */
    /* border-radius: 50%; */
  }

  .fa:hover {
      opacity: 0.7;
  }
  .fa-facebook {
    /* background: #3B5998; */
    color: white;
  }

  .fa-twitter {
    /* background: #55ACEE; */
    color: white;
  }
  .fa-instagram {
    /* background: #55ACEE; */
    color: white;
  }
  .fa-linkedin {
    /* background: #55ACEE; */
    color: white;
  }
  .fa-github {
    /* background: #55ACEE; */
    color: white;
  }
  @media only screen and (max-width: 768px) {
      /* For mobile phones: */
      [class*="col-"] {
        width: 100%;
      }
  }
</style>
    <link rel="icon" href="logo.png">
    <title>Netflix | Sign in</title>
</head>
<body>
    <div class="root">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="Sign_in.php">
              <img src="Netflix_Logo_PMS.png" width="200" height="100" class="d-inline-block align-top" alt="">
            </a>
          </nav>
    <div class="container">
        <div class="row col-md-4 col-md-offset-4">
            <div class="panel">
                <div class="panel-heading">
                    <h1 style="color:white;">Sign In</h1>
                </div>
                <div class="panel-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control input-lg" placeholder="Email address" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control input-lg" placeholder="Password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-danger btn-lg btn-block">Sign In</button>
                        </div>
                        <div class="form-group form-check">
                            <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="remember" <?php if(isset($_COOKIE["remember"])) {echo "checked";}?>>
                            <label class="form-check-label" for="flexCheckDefault" style="color:gray;font-size: 13px;">Remember me</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label><a href="" style="color:gray;font-size: 13px;">Need help?</a></label>
                            <br><br><br>
                            <label style="color:gray;font-size: 13px;">New to Name?&nbsp;&nbsp;<a href="sign_up.html" style="color:white; font-family:Verdana; font-size: 15px;">Sign up now</a></label>
                            <br>
                            <label style="color:gray; font-size: 13px;">This page is protected by Google reCAPTCHA to ensure you're not a bot.<a data-toggle="collapse" data-target="#click"> Learn more.</a></label>
                        </div>
                        <div id ='click' class="form-group collapse">
                            <p>The information collected by Google reCAPTCHA is subject to the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a>, and is used for providing, maintaining, and improving the reCAPTCHA service and for general security purposes (it is not used for personalised advertising by Google).</p>
                        </div>
                    </form>
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
                <p><a>Help center</a></p>
            </div>
        </center>
        </div>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
</body>
</html>