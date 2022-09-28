<?php
      include_once('connect.php');
      $movie_id = $_GET['movie_id'];
      // echo $movie_id;
      // exit;
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
    <form method="POST">
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
                        <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Download</a></li> -->
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="helpCenter.php">Help Center</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="logOut.php">Sign Out</a></li>
                    </ul>
                    </div>
                </div>
            </nav>
        </header>
        <?php 
            $query1 = "SELECT * FROM `movies` WHERE movie_id = '$movie_id'"; 
            $result1 = mysqli_query($conn, $query1);
            $array1 = mysqli_fetch_array($result1);
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <label for="text">Movie Title</label>
                    <input type="text" class="form-control" id="movie_name" name="movie_name" value ="<?php echo $array1['movie_name']; ?>" required>
                    <input type="hidden" name="movie_id" value="<?php echo $array1['movie_id'];?>" />
                    <br>
                    
                    <labrl for = "genre"><b>Genre</b></label><br>
                    <?php $genre=explode(',', $array1['genre']);?>
                    <input class="form-check-input" type="checkbox" value="Romance" id="genre" name="genre[]" <?php if (in_array("Romance", $genre)) echo "checked";?>>
                    <label class="form-check-label" for="genre" required>Romance</label> &nbsp;
                    <input class="form-check-input" type="checkbox" value="Comedy" id="genre" name="genre[]" <?php if (in_array("Comedy", $genre)) echo "checked";?>>
                    <label class="form-check-label" for="genre" required>Comedy</label>
                    <br>
                    <input class="form-check-input" type="checkbox" value="Action" id="genre" name="genre[]" <?php if (in_array("Action", $genre)) echo "checked";?>>
                    <label class="form-check-label" for="genre" required>Action</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-check-input" type="checkbox" value="Anime" id="genre" name="genre[]" <?php if (in_array("Anime", $genre)) echo "checked";?>>
                    <label class="form-check-label" for="genre" required>Anime</label>
                    <br>
                    <input class="form-check-input" type="checkbox" value="Horror" id="genre" name="genre[]" <?php if (in_array("Horror", $genre)) echo "checked";?>>
                    <label class="form-check-label" for="genre" required>Horror</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-check-input" type="checkbox" value="Fantasy" id="genre" name="genre[]" <?php if (in_array("Fantasy", $genre)) echo "checked";?>>
                    <label class="form-check-label" for="genre" required>Fantasy</label>
                    <br>
                    <input class="form-check-input" type="checkbox" value="Sci-Fi" id="genre" name="genre[]" <?php if (in_array("Sci-Fi", $genre)) echo "checked";?>>
                    <label class="form-check-label" for="genre" required>Sci-Fi</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-check-input" type="checkbox" value="Drama" id="genre" name="genre[]" <?php if (in_array("Drama", $genre)) echo "checked";?>>
                    <label class="form-check-label" for="genre" required>Drama</label>
                    <br>
                    <input class="form-check-input" type="checkbox" value="Biography" id="genre" name="genre[]" <?php if (in_array("Biography", $genre)) echo "checked";?>>
                    <label class="form-check-label" for="genre" required>Biography</label>
                    <input class="form-check-input" type="checkbox" value="Hollywood" id="genre" name="genre[]" <?php if (in_array("Hollywood", $genre)) echo "checked";?>>
                    <label class="form-check-label" for="genre" required>Hollywood</label>
                    <br>
                    <input class="form-check-input" type="checkbox" value="Bollywood" id="genre" name="genre[]" <?php if (in_array("Bollywood", $genre)) echo "checked";?>>
                    <label class="form-check-label" for="genre" required>Bollywood</label>
                    <input class="form-check-input" type="checkbox" value="Tollywood" id="genre" name="genre[]" <?php if (in_array("Tollywood", $genre)) echo "checked";?>>
                    <label class="form-check-label" for="genre" required>Tollywood</label>
                </div>
                <div class="col-md-6">
                    <label for="date">Date of Release</label>
                    <input class="form-control input-lg" id="date" type="date" name="date" placeholder="DD/MM/YYYY" type="text" value ="<?php echo $array1['date']; ?>"  />
                    <label for="comment">Movie Description</label>
                    <textarea class="form-control" rows="7" id="description" name="description"><?php echo $array1[6]; ?></textarea>
                    <br>
                    <br>
                    <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Update</button>
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
                    <p><a>Help center</a></p>
                </div>
            </center>
            </div>
        </footer>
        <script>
            function fileValidation(){
    var fileInput = document.getElementById('file1');
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
// function file_Validation(){
//     var fileInput = document.getElementById('file');
//     var filePath = fileInput.value;
//     var allowedExtensions = /(\.mp4|\.webm|\.ogg)$/i;
//     if(!allowedExtensions.exec(filePath)){
//         alert('Please upload file having extensions .webm/.mp4/.ogg only.');
//         fileInput.value = '';
//         return false;
//     }
        </script>
</body>
</html>
<?php 
    if (isset($_POST['submit'])) {
        $movie_id=$_POST['movie_id'];
        $movie_name = $_POST['movie_name'];
        // $thumb = $_FILES['file1'];
        // $file = $_FILES['file'];
        $genre=implode($_POST["genre"],",");
        $date = $_POST['date'];
        $description = $_POST['description'];

  if(isset($_POST['save_multiple_checkbox']))
  {
    $genre=implode(",",$_POST["genre"]);
      foreach($genre as $item)
      {
          $query = "INSERT INTO movies (name) VALUES ('$item')";
          echo $query_run = mysqli_query($conn, $query);
          array_push($genre,",");
      }
    }
$sql = "UPDATE movies SET movie_name='$movie_name', genre='$genre', date='$date', description='$description' WHERE movie_id='$movie_id'";
// exit;
$data =mysqli_query($conn,$sql);
if($data)
{
    echo "<script> alert('Record Updated')</script>";
    ?>
    <meta http-equiv='refresh' content ='0; url=http://localhost/test/project/upload.php'/>
    <?php
}
else{
    echo "<script> alert('Failed to update record')</script>";
}
}
?>