


<?php
include("../../includes/db3.php");



if(isset($_POST['approval'])){





$approval_leader = $_POST['approval_leader'];
$approval_manager = $_POST['approval_manager'];
$approval_hr = $_POST['approval_hr'];
$id = $_POST['id'];


$sql = "update evening set approval_hr = '1'   where id='$id'";


$run  = mysqli_query($con,$sql);

if($run){

echo "<script>alert('تم قبول الطلب')</script>";

echo "<script> window.open('../hr_index.php?page=approval_evening','_self') </script>";

}

}
else if(isset($_POST['not_approval'])){
	
	


$approval_leader = $_POST['approval_leader'];
$approval_manager = $_POST['approval_manager'];
$approval_hr = $_POST['approval_hr'];
$id = $_POST['id'];


$sql = "update evening set approval_hr = '2'   where id='$id'";


$run  = mysqli_query($con,$sql);

if($run){

echo "<script>alert('تم رفض الطلب')</script>";

echo "<script> window.open('../hr_index.php?page=approval_evening','_self') </script>";

}



}

?>











