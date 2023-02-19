



<?php


	include "includes/db.php";

    session_start();
    $message="";
    if(count($_POST)>0) {
        $result = mysqli_query($conn,"SELECT  *  FROM employee
  WHERE code='" . $_POST["code"] . "' and pass = '". $_POST["pass"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
     
$_SESSION['id']=$row['id'];  
$_SESSION['code']=$row['code'];  
$_SESSION['f_name']=$row['f_name']; 
$_SESSION['pass']=$row['pass']; 
$_SESSION['photo']=$row['photo']; 
$_SESSION['date_start']=$row['date_start']; 
$_SESSION['id_section']=$row['id_section']; 
$_SESSION['is_manager']=$row['is_manager']; 
$_SESSION['id_your_boss']=$row['id_your_boss']; 
$_SESSION['is_admin']=$row['is_admin']; 
$_SESSION['manager_id']=$row['manager_id']; 
$_SESSION['vacation_day']=$row['vacation_day']; 


        } else {
         $message = "Invalid Username or pass!";
        }
		
		
		
		
		
	///////////////////////////////////	
		
	
    }
    if(isset($_SESSION["is_manager"] )) {
		
		
    if($_SESSION["is_manager"] == 1) {
		
		
				 header("Location:manager_area/manager_index.php?page=dashbord");
}
    if($_SESSION["id_section"] == 2) {
		
		
				 header("Location:hr_area/hr_index.php?page=hr_index");
}

    if($_SESSION["id_section"] != 2 && $_SESSION["is_manager"] != 1) {
		
		
				 header("Location:user_area/user_index.php?page=dashboard");
}
	
	}
	
	
	
	
	
	/*
	
	    if(count($_POST)>0) {
		//	header("Location:hr_area/add_employee.php");
						header("Location:manager_area/dashbord.php");

			
			
		}
		
		*/
		
?>





















<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Hotel Dashboard Template</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="assets/css/style.css"> </head>

<body>
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left"> <img class="img-fluid" src="assets/img/logo.png" alt="Logo"> </div>
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Login</h1>
							<p class="account-subtitle">login in temco system</p>
							<form   action="" method="post">
								<div class="form-group">
									<input class="form-control" type="text" placeholder="كود الموظف"  name="code" > </div>
								<div class="form-group">
									<input class="form-control" type="text" placeholder="Password"  name="pass" > </div>
								<div class="form-group">
									<button class="btn btn-primary btn-block" name="login"  type="submit">Login</button>
								</div>
							</form>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/js/script.js"></script>
</body>

</html>