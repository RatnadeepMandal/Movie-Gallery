<?php
$conn = mysqli_connect("localhost","root","","netflix");
if(!empty($_POST['email'])){
    $email_r=$_POST["email"];
    $query = "SELECT * FROM sign_up WHERE email = '$email_r'";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
    if($count>0){
        echo"<span style='color:red'>Email already exists .</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    }
    else{
        echo"<span style='color:green'>Email available for registration .</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}
?>