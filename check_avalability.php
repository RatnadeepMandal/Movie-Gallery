<?php
include_once('connect.php');
$email = $_SESSION['email'];
if(!empty($_POST['email'])){
    $email_r=$_POST["email"];
    $query = "SELECT * FROM sign_up WHERE email = '$email_r'";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
     if($count>0){
        if($email_r == $email){
            echo"<span style='color:green'>Email available for registration .</span>";
            echo "<script>$('#submit').prop('disabled',false);</script>";
        }
        else{
            echo"<span style='color:red'>Email already exists .</span>";
            echo "<script>$('#submit').prop('disabled',true);</script>";
        }
    }
    else{
        echo"<span style='color:green'>Email available for registration .</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}
?>