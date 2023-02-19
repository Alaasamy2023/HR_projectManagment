


<?php
include("../../includes/db3.php");



if(isset($_POST['DELET'])){





$approval_leader = $_POST['approval_leader'];
$approval_manager = $_POST['approval_manager'];
$approval_hr = $_POST['approval_hr'];
$id = $_POST['id'];

if($approval_leader == 0 &&$approval_manager == 0 &&$approval_hr == 0 ){


$sql = "delete from vacation where id='$id'";

$run  = mysqli_query($con,$sql);

if($run){

echo "<script>alert('تم حذف الطلب بنجاح')</script>";

echo "<script> window.open('../user_index.php?page=vacation','_self') </script>";

}

}else{
	echo "<script>alert('لا يمكن حذف الطلب عند موافقه اى من المعنين عليه')</script>";

echo "<script> window.open('../user_index.php?page=vacation','_self') </script>";

	
	
}
	 
}
?>











