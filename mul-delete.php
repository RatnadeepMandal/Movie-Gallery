<?php
    include('connect.php');
    error_reporting(E_ALL);
    $chkarr=$_POST['select-item'];
    // print_r($chkarr);
    #exit;
    if (isset($_POST['btnDeletename'])) {
    echo "Records successfully deleted";
    foreach ($chkarr as $array) 
    { 
        $id=$array;
        $sql = "SELECT * FROM sign_up WHERE id ='$id'";
        $result = mysqli_query($conn,$sql) or die("Connection failed:");
        $row = mysqli_fetch_assoc($result);
        // print_r($row);
        // exit();
        unlink("Upload/".$row['file']);
        mysqli_query($conn,"Delete From sign_up Where id= $id");
    }
   // header ("Location:adminTable.php");
    echo "<script>alert('Record deleted from database')</script>";
?>
    <meta http-equiv='refresh' content ='0; url=http://localhost/test/project/adminTable.php'/>
<?php

}
else{
    echo "Records can't be deleted";
}
    ?>