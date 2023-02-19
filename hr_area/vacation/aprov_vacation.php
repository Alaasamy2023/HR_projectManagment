


<?php
include("../../includes/db3.php");



if(isset($_POST['approval'])){



$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$rutern_date = $_POST['rutern_date'];
$length_num_days = $_POST['length_num_days'];



$id = $_POST['id'];


$sql = "update vacation set approval_hr = '1',from_date = '$from_date' ,to_date = '$to_date' ,rutern_date = '$rutern_date' ,length_num_days = '$length_num_days'     where id='$id'";


$run  = mysqli_query($con,$sql);

if($run){

echo "<script>alert('تم قبول الطلب')</script>";

echo "<script> window.open('../hr_index.php?page=approval_vacation','_self') </script>";

}

}
else if(isset($_POST['not_approval'])){
	
	


$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];
$rutern_date = $_POST['rutern_date'];
$length_num_days = $_POST['length_num_days'];
$id = $_POST['id'];



$sql = "update vacation set approval_hr = '2',from_date = '$from_date' ,to_date = '$to_date' ,rutern_date = '$rutern_date' ,length_num_days = '$length_num_days'     where id='$id'";


$run  = mysqli_query($con,$sql);

if($run){

echo "<script>alert('تم رفض الطلب')</script>";

echo "<script> window.open('../hr_index.php?page=approval_vacation','_self') </script>";

}



}

?>











