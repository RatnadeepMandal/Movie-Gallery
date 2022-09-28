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
$query = "SELECT * FROM `sign_up` WHERE email = '$email_r' && password='$password_r'"; 
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
    <title>NETFLIX</title>
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
    .col-md-6{
        margin-top: 50px;
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
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Download</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="helpCenter.php">Help Center</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="logOut.php">Sign Out</a></li>
                </ul>
                </div>
            </div>
          </nav>
        </header>
        <?php
        $movie_id=$_GET['movie_id'];
        $fetchVideos = mysqli_query($conn, "SELECT * FROM `movies` WHERE movie_id ='$movie_id'");
        $array1 = mysqli_fetch_array($fetchVideos);

        ?>
    <form method="GET">
        <div class="container">
            <div class="row">
                <div class="col-md-6 right">
                    <span><?php'$thumb'?><img src ='Images/<?php echo $array1[2];?>'height='200px'width='150px'></span>
                </div>
                <div class="col-md-6 left">
                    <br><br>
                    <label>Movie Name:  <?php'$name'?><?php echo $array1[1];?></label><br>
                    <label>Genre:  <?php'$email'?><?php echo $array1[4];?></label><br>
                    <label>Date of Release: <?php '$date'?><?php echo $array1[5];?></label><br>
                    <label>Description: <?php'$password'?><?php echo $array1[6];?></label><br>
                </div>
            </div>
            <center><a href="update1.php?movie_id=<?php echo $array1[0]?>" type="button" class="btn btn-primary">Edit Details</a>
                <a href="delete1.php?movie_id=<?php echo $array1[0]?>" type="button" class="btn btn-danger">Delete</a>
            </center>
        </div>
    </form>
</body>
</html>