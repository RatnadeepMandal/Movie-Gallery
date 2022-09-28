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
    <title>Uploads</title>
</head>
<style>
    body{
        text-decoration: none;
    }
    header{
        background-color: black;
        padding-bottom: 15px;
        margin-bottom: 50px;
    }
    .navbar-right{
        margin-right: 60px;
        margin-top: 30px;

    }
    footer{
    align-items: center;
    margin-top: 50px;
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
</form>
        <form action="uploads1.php" id="form" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <label for="text">Movie Title</label>
                    <input type="text" class="form-control" id="movie_name" placeholder="Gangubai" name="movie_name">
                    <br>
                    <label for="file1">Choose your thumbnail:</label>
                    <input type="file" class="custom-file-input" id="file1" name = "file1" onchange="return file1Validation()">
                    <br>
                    <label for="file">Video:</label>
                    <input type="file" class="custom-file-input" id="file" name = "file" onchange="return fileValidation()">
                    <br>
                    <input class="form-check-input" type="checkbox" value="Romance" id="genre" name="genre[]">
                    <label class="form-check-label" for="genre" required>Romance</label> &nbsp;
                    <input class="form-check-input" type="checkbox" value="Comedy" id="genre" name="genre[]">
                    <label class="form-check-label" for="genre" required>Comedy</label>
                    <br>
                    <input class="form-check-input" type="checkbox" value="Action" id="genre" name="genre[]">
                    <label class="form-check-label" for="genre" required>Action</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-check-input" type="checkbox" value="Anime" id="genre" name="genre[]">
                    <label class="form-check-label" for="genre" required>Anime</label>
                    <br>
                    <input class="form-check-input" type="checkbox" value="Horror" id="genre" name="genre[]">
                    <label class="form-check-label" for="genre" required>Horror</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-check-input" type="checkbox" value="Fantasy" id="genre" name="genre[]">
                    <label class="form-check-label" for="genre" required>Fantasy</label>
                    <br>
                    <input class="form-check-input" type="checkbox" value="Sci-Fi" id="genre" name="genre[]">
                    <label class="form-check-label" for="genre" required>Sci-Fi</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-check-input" type="checkbox" value="Drama" id="genre" name="genre[]">
                    <label class="form-check-label" for="genre" required>Drama</label>
                    <br>
                    <input class="form-check-input" type="checkbox" value="Biography" id="genre" name="genre[]">
                    <label class="form-check-label" for="genre" required>Biography</label>
                    <input class="form-check-input" type="checkbox" value="Hollywood" id="genre" name="genre[]">
                    <label class="form-check-label" for="genre" required>Hollywood</label>
                    <br>
                    <input class="form-check-input" type="checkbox" value="Bollywood" id="genre" name="genre[]">
                    <label class="form-check-label" for="genre" required>Bollywood</label>
                    <input class="form-check-input" type="checkbox" value="Tollywood" id="genre" name="genre[]">
                    <label class="form-check-label" for="genre" required>Tollywood</label>
                </div>
                <div class="col-md-6">
                    <label for="date">Date of Release</label>
                    <input class="form-control input-lg" id="date" type="date" name="date" placeholder="DD/MM/YYYY" type="text"  />
                    <label for="comment">Movie Description</label>
                    <textarea class="form-control" rows="7" id="description" name="description"></textarea>
                    <br>
                    <br>
                    <button type="sumbit" name="submit" class="btn btn-success btn-lg btn-block">Upload</button>
                </div>
            </div>
        </div>
    </form>
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
            function file1Validation(){
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
function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.mp4|\.webm|\.ogg)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .webm/.mp4/.ogg only.');
        fileInput.value = '';
        return false;
    }
        </script>
</body>
</html>