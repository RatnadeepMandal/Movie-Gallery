<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 bg-light round my-2 py-2">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>D.O.B</th>
                        <th>Gender</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>File</th>
                        <th colspan="2" align="center">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once('connect.php'); 
                        $sql = "SELECT * FROM sign_up";
                        $result = mysqli_query($conn,$sql);
                        if ($result->num_rows > 0):
                        while($array=mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $array[0]; ?></td>
                            <td><?php echo $array[1]; ?></td>
                            <td><?php echo $array[2]; ?></td>
                            <td><?php echo $array[3]; ?></td>
                            <td><?php echo $array[4]; ?></td>
                            <td><?php echo $array[5]; ?></td>
                            <td><?php echo $array[8]; ?></td>
                            
                        </tr>
                        <?php
                    }
                endif;
                mysqli_free_result($result);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('table').DataTable();
        });
    </script>
</body>
</html>