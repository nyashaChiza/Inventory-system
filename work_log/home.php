<?php
session_start();
if($_SESSION['access']!= "granted"  ){
		header('Location:../index.php');
	//echo 'access denied';
}
else{
	//echo'access granted';
}
?>

 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="static/stores.png">
    <title>Work Log</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
 			<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/util.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/main.css">
<!--===============================================================================================-->
</head>


<body>

 <?php 
 include("static/navbar.php");
 include("add_data/add_modal.php");
 ?>

 <br /> <br /> <br /> <br />
	<div class="limiter">
		<div class="container-table100">


 
			<div class="wrap-table100">

 <br /> <br />
					<div class="table">

						<div class="row  header">
							<div class="cell">
								Title
							</div>
							<div class="cell">
								Location
							</div>
							<div class="cell">
								Person In Charge
							</div>
							<div class="cell">
								Date
							</div>
							<div class="cell">
								Status
							</div>
							<div class="cell">
								Action
							</div>
						</div>
<?php
				include('db/conn.php');
				
				$query=mysqli_query($conn,"SELECT * FROM `work_log` ORDER BY `userid` DESC");
				while($row=mysqli_fetch_array($query)){
					?>
					<div class="row">
						<div class="cell" > <?php echo $row['title']; ?> </div>
						<div class="cell" > <?php echo $row['location']; ?></div>
						<div class="cell" > <?php echo $row['person_in_charge']; ?></div>
						<div class="cell" > <?php echo $row['date']; ?></div>
						<div class="cell" > <?php echo $row['status']; ?></div>
						<div class="cell" >
							<a href="#edit<?php echo $row['userid']; ?>" data-toggle="modal" class="btn btn-success"><span class="btn-secondary "></span> Edit</a> || 
							<a href="#del<?php echo $row['userid']; ?>" data-toggle="modal" class="btn btn-danger"><span class="btn-danger"></span> Delete</a>
							<?php include('edit_data/button.php'); ?>
						</div>
					</div>
					<?php
				}
			
			?>
						<br />

					</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="bootstrap/js/jquery-slim.min.js"><\/script>')</script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	
</body>
</html>