




		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title mt-5">اضافه طلب اجازه</h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
<form method="post" action=""accept-charset="utf-8" >
							<div class="row formtype">
								<div class="col-md-10">
									<div class="form-group">
										<label>مده الاجازه</label>
										<input class="form-control" type="text"  name="length" required> </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>من يوم</label>
											<input type="date" class="form-control datetimepicker" name="from_date" required> </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>حتى يوم</label>
											<input type="date" class="form-control datetimepicker" name="to_date" required> </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>على ان اعود يوم</label>
											<input type="date" class="form-control datetimepicker" name="rutern_date" required> </div>
								</div>
								<div class="col-md-10">
									<div class="form-group">
										<label>نوع الاجازه </label>
										<select class="form-control"   name="type" required>
										
										<?php
include("../includes/db3.php");

$sql = "SELECT * FROM `vacation_type` ";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo' <option value="'.$row['id'].'">'.$row['type'].'</option>';
}
?>
										</select>
									</div>
								</div>
								
								
								
						<div class="col-md-10">
									<div class="form-group">
										<label>القائم بالعمل </label>
										<select class="form-control"   name="emp_do_my_job" required>
										 <option value="0">لا احد</option>
										<?php
include("../includes/db3.php");
//$_SESSION['id_section']
$sql = "SELECT * FROM `employee` WHERE  id_section = ".$_SESSION['id_section']." AND  state = 1";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo' <option value="'.$row['id'].'">'.$row['f_name'].'</option>';
}
?>
										</select>
									</div>
								</div>		
								
								
								
								
								
								
					</div>
									<button type="submit" name="submit" class="form-control" id="cf-submit">Submit </button>

						</form>
					</div>
				</div>
 			</div>
		</div>
	
	
	
	




<?php
 


if(isset($_POST['submit']))
{    


  $from_date= $_POST['from_date'];
 $to_date= $_POST['to_date'];
 $rutern_date= $_POST['rutern_date'];
 $type= $_POST['type'];
 $length= $_POST['length'];
 $emp_do_my_job= $_POST['emp_do_my_job'];


 
 
  $user_id=$_SESSION['id'];
// start created date
date_default_timezone_set("Africa/Cairo");
 $date_created=date('Y-m-d');
 $time_created = date("H:i:s"); 

// end created date

 
  $sql = "INSERT INTO `vacation`( `user_id`, `time_created`, `date_created`, `type`, `from_date`, `to_date`, `rutern_date`, `length` ,`manager_id`,`emp_do_my_job`)VALUES  ( '$user_id', '$time_created', '$date_created', '$type',  '$from_date', '$to_date', '$rutern_date', '$length',  '".$_SESSION['manager_id']."', '$emp_do_my_job') 
   ";


$run = mysqli_query($con, $sql);
if($run){
	
echo "

<script>

alert('Your New ROW Has Been Inserted Successfully.');

window.open('user_index.php?page=add_vacation','_self');

</script>

";
	
}



}
//header('Location: user_index.php?page=vacation');

?>




