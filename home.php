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
$result = mysqli_query($conn, $query);
$array = mysqli_fetch_array($result);
$fetchVideos = mysqli_query($conn, "SELECT * FROM `movies` ORDER BY movie_id DESC");
$row = mysqli_fetch_assoc($fetchVideos);
$location = $row['file'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="logo.png">
    <title>Home</title>
</head>
<style>
    *{
        margin: 0;
        box-sizing: border-box;
    }
    body{
        font-family: sans-serif;
        background-color: #111;
    }
        .nav_logo{
        width: 80px;
        object-fit: contain;
    }
    .nav_avatar{
        width: 30px;
        object-fit: contain;
    }
    .nav{
        position: fixed;
        top: 0;
        width: 100%;
        display: flex;
        justify-content: space-between;
        padding: 20px;
        z-index: 1;
        transition-timing-function: ease-in;
        transition: all 0.5s;
    }
    .nav_black{
        background-color: #111;
    }
    .navbar-right{
        margin-right: 60px;
        margin-top: 30px;
    }
    .banner{
        /*background-image: url('money-heist-experience-what-you-need-to-know-1280x720.jpg');*/
        background-size: cover;
        background-position: center center;
        color: white;
        object-fit:  contain;
        height: 448px;
    }
    .banner_contents{
        margin-left: 30px;
        padding-top: 140px;
        height: 190px;
    }
    .border_title{
        font-size: 3rem;
        font-weight: 800;
        padding-bottom: 0.3rem;
    }
    .banner_description{
        width: 45rem;
        line-height: 1.3;
        padding-top: 1rem;
        font-size: 0.8rem;
        max-width: 360px;
        height: 180px;
    }
    .banner_button{
        cursor: pointer;
        color: #fff;
        outline: none;
        border: none;
        font-weight: 700;
        border-radius: 0.2vw;
        padding-left: 2rem;
        padding-right: 2rem;
        margin-right: 1rem;
        padding-top: 0.5rem;
        background-color: rgba(51, 51, 51, 0.5) ;
    }
    .banner_button:hover{
        color: #0000;
        background-color: #e6e6e6;
        transition: all 0.2s;
    }
    .banner_fadebutton{
        margin-top: 145px;
        height: 7.4rem;
        background-image: linear-gradient(180deg, transparent, rgba(37,37,37,0.61),#111);
    }
    .row_posters{
        width: 100%;
        object-fit: contain;
        max-height: 200px;
        margin-right: 10px;
        transition: transform 450ms;
        /*padding: 5px;*/
    }
    .row_poster{
        display: flex;
        overflow-y: hidden;
        overflow-x: scroll;
        padding: 20px;
    }
    .row_posters:hover{
        transform: scale(1.08);
    }
    .row_poster::-webkit-scrollbar{
        display: none;
    }
    .row_posterLarge{
        max-height: 250px;
    }
    .row_posterLarge: hover{
     transform: scale(1.09);   
    }
    .row{
        color: white;
        margin-left: 20px;
    }
    footer{
    align-items: center;
    margin-top: 200px;
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.847);
    }
</style>
<body>
        <div class="nav" id="nav">
            <a href="home.php">
            <img src="Netflix_Logo_PMS.png" alt="" class="nav_logo"/>
            </a>
            <a href="YourAccount.php">
            <img src="Upload/<?php echo $array['file']?>" alt="" class="nav_avatar"/>
        </a>
        </div>
              <div class="banner" style="background-image: url('Images/<?php echo $row['thumb'];?>');">
                
                <div class="banner_contents">
                  <h1 class="banner_title"><?php echo $row['movie_name'];?></h1><br>
                  <div class="banner_buttons">
                      <button class="banner_button" id="play">Play</button><br>
                  </div>
                  <div class="banner_description"><?php echo $row['description'];?></div>
                  <div class="banner_fadebutton"></div>
              </div>
            </div>
    <div class="row">
        <h2>Latest Upload</h2>
        <div class="row_poster">
            <?php
            $p=mysqli_query($conn,"SELECT * FROM `movies` ORDER BY movie_id DESC");
                while($row17 = mysqli_fetch_assoc($p)){
            ?>
            <img class="row_posters row_posterLarge" alt="" src="Images/<?php echo $row17['thumb'];?>" onclick = 'location.href ="http://localhost/test/project/Movies/<?php echo $row17['file'] ?>"'>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="row">
        <h2>Romance</h2>
        <div class="row_poster">
            <?php
    $a=mysqli_query($conn,"SELECT * FROM `movies` WHERE genre LIKE '%Romance%'");
    while($row1 = mysqli_fetch_assoc($a)){
    ?>
            <img class="row_posters" alt="" src="Images/<?php echo $row1['thumb'];?>" onclick = 'location.href ="http://localhost/test/project/Movies/<?php echo $row1['file'] ?>"'>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="row">
        <h2>Action</h2>
        <div class="row_poster">
    <?php
    $b=mysqli_query($conn,"SELECT * FROM `movies` WHERE genre LIKE '%Action%'");
    while($row2 = mysqli_fetch_assoc($b)){
    ?>
            <img class="row_posters" alt="" src="Images/<?php echo $row2['thumb'];?>" onclick = 'location.href ="http://localhost/test/project/Movies/<?php echo $row2['file'] ?>"'>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="row">
        <h2>Horror</h2>
        <div class="row_poster">
            <?php
    $c=mysqli_query($conn,"SELECT * FROM `movies` WHERE genre LIKE '%Horror%'");
    while($row3 = mysqli_fetch_assoc($c)){
    ?>
            <img class="row_posters" alt="" src="Images/<?php echo $row3['thumb'];?>" onclick = 'location.href ="http://localhost/test/project/Movies/<?php echo $row3['file'] ?>"'>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="row">
        <h2>Comedy</h2>
        <div class="row_poster">
            <?php
    $d=mysqli_query($conn,"SELECT * FROM `movies` WHERE genre LIKE '%Comedy%'");
    while($row4 = mysqli_fetch_assoc($d)){
    ?>
            <img class="row_posters" alt="" src="Images/<?php echo $row4['thumb'];?>" onclick = 'location.href ="http://localhost/test/project/Movies/<?php echo $row4['file'] ?>"'>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="row">
        <h2>Anime</h2>
        <div class="row_poster">
            <?php
    $e=mysqli_query($conn,"SELECT * FROM `movies` WHERE genre LIKE '%Anime%'");
    while($row5 = mysqli_fetch_assoc($e)){
    ?>
            <img class="row_posters" alt="" src="Images/<?php echo $row5['thumb'];?>" onclick = 'location.href ="http://localhost/test/project/Movies/<?php echo $row5['file'] ?>"'>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="row">
        <h2>Fantasy</h2>
        <div class="row_poster">
            <?php
    $f=mysqli_query($conn,"SELECT * FROM `movies` WHERE genre LIKE '%Fantasy%'");
    while($row8 = mysqli_fetch_assoc($f)){
    ?>
            <img class="row_posters" alt="" src="Images/<?php echo $row8['thumb'];?>" onclick = 'location.href ="http://localhost/test/project/Movies/<?php echo $row8['file'] ?>"'>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="row">
        <h2>Sci-Fi</h2>
        <div class="row_poster">
            <?php
    $g=mysqli_query($conn,"SELECT * FROM `movies` WHERE genre LIKE '%Sci-Fi%'");
    while($row9 = mysqli_fetch_assoc($g)){
    ?>
            <img class="row_posters" alt="" src="Images/<?php echo $row9['thumb'];?>" onclick = 'location.href ="http://localhost/test/project/Movies/<?php echo $row9['file'] ?>"'>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="row">
        <h2>Drama</h2>
        <div class="row_poster">
            <?php
    $h=mysqli_query($conn,"SELECT * FROM `movies` WHERE genre LIKE '%Drama%'");
    while($row10 = mysqli_fetch_assoc($h)){
    ?>
            <img class="row_posters" alt="" src="Images/<?php echo $row10['thumb'];?>" onclick = 'location.href ="http://localhost/test/project/Movies/<?php echo $row10['file'] ?>"'>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="row">
        <h2>Biography</h2>
        <div class="row_poster">
            <?php
    $i=mysqli_query($conn,"SELECT * FROM `movies` WHERE genre LIKE '%Biography%'");
    while($row13 = mysqli_fetch_assoc($i)){
    ?>
            <img class="row_posters" alt="" src="Images/<?php echo $row13['thumb'];?>" onclick = 'location.href ="http://localhost/test/project/Movies/<?php echo $row13['file'] ?>"'>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="row">
        <h2>Hollywood</h2>
        <div class="row_poster">
            <?php
    $j=mysqli_query($conn,"SELECT * FROM `movies` WHERE genre LIKE '%Hollywood%'");
    while($row14 = mysqli_fetch_assoc($j)){
    ?>
            <img class="row_posters" alt="" src="Images/<?php echo $row14['thumb'];?>" onclick = 'location.href ="http://localhost/test/project/Movies/<?php echo $row14['file'] ?>"'>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="row">
        <h2>Bollywood</h2>
        <div class="row_poster">
            <?php
    $k=mysqli_query($conn,"SELECT * FROM `movies` WHERE genre LIKE '%Bollywood%'");
    while($row15 = mysqli_fetch_assoc($k)){
    ?>
            <img class="row_posters" alt="" src="Images/<?php echo $row15['thumb'];?>" onclick = 'location.href ="http://localhost/test/project/Movies/<?php echo $row15['file'] ?>"'>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="row">
        <h2>Tollywood</h2>
        <div class="row_poster">
            <?php
    $l=mysqli_query($conn,"SELECT * FROM `movies` WHERE genre LIKE '%Tollywood%'");
    while($row16 = mysqli_fetch_assoc($l)){
    ?>
            <img class="row_posters" alt="" src="Images/<?php echo $row16['thumb'];?>" onclick = 'location.href ="http://localhost/test/project/Movies/<?php echo $row16['file'] ?>"'>
            <?php
                }
            ?>
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