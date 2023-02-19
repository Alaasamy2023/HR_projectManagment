<?php
include("../date.php");

session_start(); 

include("../includes/db.php");
  if(isset($_SESSION["f_name"] )) {$f_name=$_SESSION["f_name"];}

  
	
	date_default_timezone_set("Africa/Cairo");




?>















<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>TEMCO</title>
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/feathericon.min.css">
	<link rel="stylehseet" href="https://cdn.oesmith.co.uk/morris-0.5.1.css">
	<link rel="stylesheet" href="../assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="../assets/css/style.css"> </head>

<body>
	<div class="main-wrapper">
		<div class="header">
			<div class="header-left">
				<a href="index.html" class="logo"> <img src="../assets/img/hotel_logo.png" width="50" height="70" alt="logo"> 
				<!-- <span class="logoclass">TEMCO</span>  -->
			</a>
				<a href="index.html" class="logo logo-small"> <img src="../assets/img/hotel_logo.png" alt="Logo" width="30" height="30"> </a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
			<a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
			
			<div class="top-nav-search">
				<form>
				
					<input type="text" class="form-control" placeholder="users - <?php  echo $_SESSION["f_name"];  ?>">
					<button class="btn" type="submit"><i class="fas fa-search"></i></button>
				</form>
			</div>
			
		</div>
		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
					
					

						<li class="active"> <a href="user_index.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
											<li class="active"> <a href="user_index.php?page=permission"><i class="fas fa-tachometer-alt"></i> <span>أُذُونٌ</span></a> </li>

						
							<li class="active"> <a href="user_index.php?page=errand"><i class="fas fa-tachometer-alt"></i> <span>المأموريات</span></a> </li>
						
						<li class="active"> <a href="user_index.php?page=vacation"><i class="fas fa-tachometer-alt"></i> <span>الاجازات</span></a> </li>
					
						


						<li class="active"> <a href="user_index.php?page=evening"><i class="fas fa-tachometer-alt"></i> <span>السهرات</span></a> </li>












						<li class="active"> <a href="user_index.php?page=password"><i class="fas fa-tachometer-alt"></i> <span> تغيير الباسورد  </span></a> </li>




						 	<li class="active"> <a href="../logout.php"><i class="fas fa-tachometer-alt"></i> <span>تسجيل خروج</span></a> </li>

<i> <h6 style="font-size:13px;"> <?php  echo $_SESSION["f_name"];  ?></a></h6></i> 





					</ul>
				</div>
			</div>	</div>