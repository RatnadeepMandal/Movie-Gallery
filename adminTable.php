<?php
include_once('connect.php');
?>
<?php
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
    <style>
        body{
            text-decoration: none;
        }
        .navbar-right{
            margin-top: 20px;
            margin-right: 20px;
        }
        table,
        th,
        td {
            border: 2px solid black;
            border-collapse: collapse;
            justify-content: center;
        }
        /* setting the text-align property to center*/
        td {
            padding: 5px;
            text-align: center;
            justify-content: center;
        }
        th{
            text-align: center;
            font-family: sans-serif;
            justify-content: center;
        }
        tr{
            text-align: center;
            font-family: sans-serif;
            justify-content: center;
        }
         .inline{   
            display: inline-block;   
            float: right;   
            margin: 20px 0px;   
        }  
            .pagination {   
        display: inline-block;   
    }   
    .pagination a {   
        font-weight:bold;   
        font-size:18px;   
        color: black;   
        float: left;   
        padding: 8px 16px;   
        text-decoration: none;   
        border:1px solid black;   
    }   
    .pagination a.active {   
            background-color: lightgreen;   
    }   
    .pagination a:hover:not(.active) {   
        background-color: skyblue;   
    }
</style>
    <title>Netflix | Database </title>
</head>
<body>
    <?php  
        $per_page_record = 10;         
        if (isset($_GET["page"])) { 
            $page  = $_GET["page"];     
        }    
        else {    
          $page  = 1;    
        }    
    
        $start_from = ($page-1) * $per_page_record; 
        $query = "SELECT * FROM sign_up LIMIT $start_from, $per_page_record";     
        $rs_result = mysqli_query ($conn, $query);       
    ?>
    <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="Netflix_Logo_PMS.png" width="150" height="50" class="d-inline-block align-top" alt="">
    </a>
    <a href="#" id="imageDropdown" data-toggle="dropdown">
                <span><?php'$file'?><img class="image" src ='Upload/<?php echo $array[8];?>'height='50px'width='50px'></span>
                </a>
    <div class="navbar-right">
      <a href="logOut.php" class="btn btn-danger">Log Out &nbsp;<span class="glyphicon glyphicon-log-in"></span></a>
    </div>
    </nav>
    <div class="container">         
        <form method="POST" action="mul-delete.php">
            <div class="table-responsive">
                <table class = "table " id="table">
                    <tr>
                        <th colspan="10"><h2>User Database</h2></th>
                    </tr>
                    <t>
                        <th class="active"> <input type="checkbox" class="select-all checkbox" id="checkboxid" name="select-all" value="checkboxid" /> </th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>D.O.B</th>
                        <th>Gender</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>File</th>
                        <th colspan="2" align="center">Operations</th>
                    </t>
    <?php
        if ($rs_result->num_rows > 0):
    ?>

    <?php
        while ($array=mysqli_fetch_array($rs_result)) {
    ?>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="select-item checkbox" id= "checkboxid" name="select-item[]" value="<?php echo $array[0]; ?>">
                                </div>
                            </td>
                            <td><?php echo $array[0]; ?></td>
                            <td><?php echo $array[1]; ?></td>
                            <td><?php echo $array[2]; ?></td>
                            <td><?php echo $array[3]; ?></td>
                            <td><?php echo $array[4]; ?></td>
                            <td><?php echo $array[5]; ?></td>
                            <td><?php echo $array[8]; ?></td>
                            <td><a href="update.php?id=<?php echo $array[0];?>"><span class="glyphicon glyphicon-edit"></span></td>
                            <td><a href="delete.php?id=<?php echo $array[0];?>"><span class="glyphicon glyphicon-trash"></span></td>
                        </tr>
        <?php 
            }
        ?>
        <?php endif; ?>
        <?php mysqli_free_result($rs_result); ?>
                    </tbody>
                </table>
            </div>
        <center>
            <button class="btn btn-danger" type="submit" id="btnDeleteid"  name="btnDeletename">Delete Selected</button>
        </center>
        </form>
        <center>
                <br><button id="select-all" class="btn btn-success">SelectAll/Cancel</button>
                <button id="select-invert" class="btn btn-warning">Invert</button>
                <button id="selected" class="btn btn-default">GetSelected</button>
                <a href="table.php" id="button" class="btn btn-primary">Search</a>
        </center>
        <center>
    <div class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM sign_up";     
        $rs_result = mysqli_query($conn, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "</br>";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='adminTable.php?page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='adminTable.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='adminTable.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='adminTable.php?page=".($page+1)."'>  Next </a>";   
        }   
  
      ?>    
    </div>
    </center>
</div>
</body>
<script>
$(function(){

        //button select all or cancel
        $("#select-all").click(function () {
            var all = $("input.select-all")[0];
            all.checked = !all.checked
            var checked = all.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
        });

        //button select invert
        $("#select-invert").click(function () {
            $("input.select-item").each(function (index,item) {
                item.checked = !item.checked;
            });
            checkSelected();
        });

        //button get selected info
        $("#selected").click(function () {
            var items=[];
            $("input.select-item:checked:checked").each(function (index,item) {
                items[index] = item.value;
            });
            if (items.length < 1) {
                alert("no selected items!!!");
            }else {
                var values = items.join(',');
                console.log(values);
                var html = $("<div></div>");
                html.html("selected:"+values);
                html.appendTo("body");
            }
        });

        //column checkbox select all or cancel
        $("input.select-all").click(function () {
            var checked = this.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
        });

        //check selected items
        $("input.select-item").click(function () {
            var checked = this.checked;
            console.log(checked);
            checkSelected();
        });

        //check is all selected
        function checkSelected() {
            var all = $("input.select-all")[0];
            var total = $("input.select-item").length;
            var len = $("input.select-item:checked:checked").length;
            console.log("total:"+total);
            console.log("len:"+len);
            all.checked = len===total;
        }
    });
</script>
</html>