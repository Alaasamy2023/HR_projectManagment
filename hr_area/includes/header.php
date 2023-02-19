


<?php

include("../date.php");


session_start(); 

//include("../db.php");
  if(isset($_SESSION["f_name"] )) {$f_name=$_SESSION["f_name"];}
  if($_SESSION["id_section"] != 2){
	  
	  				 header("Location:../logout.php");

	  
	  
	  
	  
	  
  }
  
	
	



?>







<?php
include("../includes/db3.php");



$sql1 = "SELECT COUNT(id) as count_vacation FROM vacation WHERE vacation.approval_manager = 1   AND  vacation.approval_hr = 0 ";
$run1 = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($run1)){$count_vacation=$row['count_vacation'];}




$sql_count_permission = "SELECT COUNT(id) as count_permission FROM permission WHERE   permission.approval_manager = 1  AND  permission.approval_hr = 0 ";
$run_count_permission = mysqli_query($con,$sql_count_permission);
while($row = mysqli_fetch_array($run_count_permission)){$count_permission=$row['count_permission'];}




$sql_count_errand = "SELECT COUNT(id) as count_errand FROM errand WHERE  errand.approval_manager = 1   AND  errand.approval_hr = 0 ";
$run_count_errand = mysqli_query($con,$sql_count_errand);
while($row = mysqli_fetch_array($run_count_errand)){$count_errand=$row['count_errand'];}



$sql_count_evening = "SELECT COUNT(id) as count_evening FROM evening WHERE   evening.approval_manager = 1   AND  evening.approval_hr = 0 ";
$run_count_evening = mysqli_query($con,$sql_count_evening);
while($row = mysqli_fetch_array($run_count_evening)){$count_evening=$row['count_evening'];}










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
	<link rel="stylesheet" href="../assets/css/style.css">









	
	
	
        <!-- Datatable CSS -->
        <link href='https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
        <link href='https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>

        <style type="text/css">
            .dt-buttons{
                width: 100%;
            }
        </style>

        <!-- jQuery Library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <!-- Datatable JS -->
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
        


	
	

	
	
	</head>

<body>
	<div class="main-wrapper">
		<div class="header">
			<div class="header-left">
				<a href="index.html" class="logo"> <img src="../assets/img/hotel_logo.png" width="50" height="70" alt="logo"> 
				<!-- <span class="logoclass">TEMCO</span> -->
			 </a>
				<a href="index.html" class="logo logo-small"> <img src="../assets/img/hotel_logo.png" alt="Logo" width="30" height="30"> </a>
			</div>
			<a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
			<a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
			
			<div class="top-nav-search">
				<form>
					<input type="text" class="form-control" placeholder="hr <?php echo $date_start_month->format('d-m-Y') ;?>">
					<button class="btn" type="submit"><i class="fas fa-search"></i></button>
				</form>
			</div>
		</div>
		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
 
						 <li class="active"> <a href="hr_index.php?page=dashboard"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li> 
						 
						 
						  
						  
						  
						<!-- <li class="active"> <a href="hr_index.php?page=add_excel"><i class="fas fa-tachometer-alt"></i> <span>ادخال شيت حضور</span></a> </li> -->

						<li class="active"> <a href="hr_index.php?page=employee"><i class="fas fa-tachometer-alt"></i> <span>الموظفين</span></a> </li>

						<li class="active"> <a href="hr_index.php?page=samary1"><i class="fas fa-tachometer-alt"></i> <span>التقارير</span></a> </li>









						<li class="list-divider"></li>
					
						
						
						
						
						
						
						
								
						
						<li class="submenu"> <a href="#"><i class="fas fa-user"></i>   &nbsp;&nbsp;  <?php echo $count_permission; ?><span> أُذُونٌ </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
					   <li><a href="hr_index.php?page=all_permission">أُذُونٌ</a></li>
					 <li><a href="hr_index.php?page=waiting_permission">أُذُونٌ لم يتخذ بها اجراء</a></li>
                     <li><a href="hr_index.php?page=approval_permission">أُذُونٌ تم الموافقه عليها  &nbsp;&nbsp;  <?php echo $count_permission; ?></a></li>
                     <!-- <li><a href="hr_index.php?page=not_approval_permission">أُذُونٌ لم يتم الموافقه عليها</a></li> -->
							</ul>
						</li>
					
						
						
						
						
						
						
						
						<li class="submenu"> <a href="#"><i class="fas fa-user"></i>  &nbsp;&nbsp;  <?php echo $count_errand; ?>  <span> المأموريات </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="hr_index.php?page=all_errand">المأموريات </a></li>
								<li><a href="hr_index.php?page=waiting_errand">مأموريات لم يتخذ بها  </a></li>
								<li><a href="hr_index.php?page=approval_errand">مأموريات تم الموافقه عليها    &nbsp;   <?php echo $count_errand; ?> </a></li>
								<!-- <li><a href="hr_index.php?page=not_approval_errand">مأموريات لم يتم الموافقه عليها </a></li> -->
								
								
								
							</ul>
						</li>
					
						
						
						
						
						
						
						
						
						<li class="submenu"> <a href="#"><i class="fas fa-user"></i>   &nbsp;&nbsp;  <?php echo $count_vacation; ?>  <span> الاجازات </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="hr_index.php?page=all_vacation">الاجازات </a></li>
								<li><a href="hr_index.php?page=waiting_vacation">اجازات لم يتخذ بها اجراء </a></li>
								<li><a href="hr_index.php?page=approval_vacation">اجازات تم الموافقه عليها    &nbsp;&nbsp;  <?php echo $count_vacation; ?> </a></li>
								<!-- <li><a href="hr_index.php?page=not_approval_vacation">اجازات لم يتم الموافقه عليها </a></li> -->
							</ul>
						</li>
					
					
					
					
					
					
					
					
					
				
						
					
						
						
						
						
						
						
						
						
								<li class="submenu"> <a href="#"><i class="fas fa-user"></i>  &nbsp;&nbsp;  <?php echo $count_evening; ?> <span> السهرات </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
						   <li><a href="hr_index.php?page=all_evening">السهرات</a></li>
					 <li><a href="hr_index.php?page=waiting_evening">سهرات لم يتخذ بها اجراء</a></li>
                     <li><a href="hr_index.php?page=approval_evening">سهرات تم الموافقه عليها &nbsp;&nbsp;  <?php echo $count_evening; ?> </a></li>
                     <!-- <li><a href="hr_index.php?page=not_approval_evening">سهرات لم يتم الموافقه عليها</a></li> -->
							</ul>
						</li>
					
						
						
						<!-- <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> الغيابات </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
						        <li><a href="hr_index.php?page=all_absence">الغيابات</a></li>
				
							</ul>
						</li> -->
					
						
						
						
						
						
						
						
						
						
						<li class="active"> <a href="hr_index.php?page=password"><i class="fas fa-tachometer-alt"></i> <span> تغيير الباسورد  </span></a> </li>

						<li class="active"> <a href="../logout_from_user.php"><i class="fas fa-tachometer-alt"></i> <span>تقديم طلبات  </span></a> </li>

						 	<li class="active"> <a href="../logout.php"><i class="fas fa-tachometer-alt"></i> <span>تسجيل خروج</span></a> </li>

					<i> <h6 style="font-size:13px;"> <?php  echo $_SESSION["f_name"];  ?></a></h6></i> 
	
					</ul>
				</div>
			</div>	
			</div>