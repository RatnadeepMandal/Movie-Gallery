<?php
include('connect.php'); 
$limit = 20;
$sql = "SELECT COUNT(id) FROM sign_up";  
$rs_result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table-locale-all.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.21.0/dist/extensions/export/bootstrap-table-export.min.js"></script>

<title>PHP Pagination AJAX</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Datatable JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />    
    <link href='https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<head>
	<style>
		body{
			background: white ;
		}
        td{
            border: 2px solid black;
        }
		.container{
			margin-top: 100px;
		}
		target-content{
			margin-top: 100px;
		}
	</style>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <!-- <div class="col-sm-6">
						<h2>Manage <b>Employees</b>Add New Employee</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons"></i> <span>Delete</span></a>						
					</div> -->
                </div>
            </div>
			<div id="target-content">loading...</div>
            
			
        </div>
    </div>
	<script>
	$(document).ready(function() {
		$("#target-content").load("pagination.php?page=1");
		$(".page-link").click(function(){
			var id = $(this).attr("data-id");
			var select_id = $(this).parent().attr("id");
			$.ajax({
				url: "pagination.php",
				type: "GET",
				data: {
					page : id
				},
				cache: false,
				success: function(dataResult){
					$("#target-content").html(dataResult);
					$(".pageitem").removeClass("active");
					$("#"+select_id).addClass("active");
					
				}
			});
		});
    });
</script>
</body>
</html>