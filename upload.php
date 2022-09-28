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
    <link rel="icon" href="logo.png">
    <title>Upload</title>
</head>
<style>
    body{
        /* overflow-x: hidden; */
        background-color: #111;
        overflow-y: scroll;
        text-decoration: none;
    }
    header{
        background-color: black;
        padding-bottom: 15px;
    }
    .navbar-right{
        margin-right: 60px;
        margin-top: 30px;

    }
    .btn{
        margin-top: 30px;
    }
    span{
        color:#fff;
    }
    div{
        margin-top: 50px;
        margin-left: 50px;
    }
    footer{
    align-items: center;
    margin-top: 2000px;
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.847);
    }
    @media(max-width: 500px){
        .image{
            margin-left: 200px;
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
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="upload.php">Your Upload</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="uploads.php">Upload Movie</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="helpCenter.php">Help Center</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="logOut.php">Sign Out</a></li>
                </ul>
                </div>
            </div>
          </nav>
        </header>
        <center><a href="uploads.php" type="button" class="btn btn-success">Upload Movies</a></center>
        <?php
        $query= "select id from sign_up where email='$email_r'";
        // echo $query;
        // exit;
        $sqln = mysqli_query($conn, $query);
        $array = mysqli_fetch_assoc($sqln);
        // print_r ($array);
        // exit;
        $id = $array['id'];
                        $fetchVideos = mysqli_query($conn, "SELECT * FROM movies where id=$id ORDER BY id DESC");
                        while($row = mysqli_fetch_assoc($fetchVideos)){
                        $location = $row['thumb'];
                        $name = $row['movie_name'];
                        $poster = $row['thumb'];
                        echo "<a href ='details.php?movie_id=". $row['movie_id']."'><div style='float: left; margin-right: 5px;'>
                            <img src='Images/".$location."' controls width='300px' height='400px' ></img>     
                            <br>
                            <br>
                            <center><span>".$name."</span></center>
                        </div></a>";
                        }
                    ?>
    </form>
        <script type="text/javascript">
        const nav = document.getElementById('nav');

        window.addEventListener('scroll',() => {
            if(window.scrollY >=100){
                nav.classList.add('nav_black');
            }
            else{
                nav.classList.remove('nav_black');
            }
        });

        document.getElementById('play').onclick = function (){
                    location.href ="http://localhost/test/project/Movies/<?php echo $location ?>"
                }
    </script>
</body>
</html>