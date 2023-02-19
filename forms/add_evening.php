




		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title mt-5">اضافه سهره</h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
					<form method="post" action=""accept-charset="utf-8" >
							<div class="row formtype">
								<div class="col-md-4">
									<div class="form-group">
										<label>تاريخ السهر</label>
										<input type="date" class="form-control datetimepicker" name="date" required> </div>

								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>من الساعه</label>
										<input type="time" class="form-control datetimepicker" name="from_time" required> </div>

							
									</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>الى الساعه</label>
										<input type="time" class="form-control datetimepicker" name="to_time" required>	</div>
									</div>
								<div class="col-md-8">
									<div class="form-group">
										<label>السبب</label>
									
										<textarea class="form-control" rows="5"  name="reson" required></textarea>

									</div>
								</div>
							<button type="submit" name="submit" class="form-control" id="cf-submit">Submit </button>

						</form>
					</div>
				</div>
			</div>
		</div>
	
	
	
	



		



<?php
include("../includes/db3.php");

/*
INSERT INTO `evening`(`user_id`, `time_created`, `date_created`, `all_date_created`, `from_time`,`to_time`, `date`, `reson`,  `manager_id`)

$date=date('Y-m-d');
$time = date("H:i:s"); 
			 
	date_default_timezone_set("Africa/Cairo");
		 
			 
*/



if(isset($_POST['submit']))
{    


 $from_time= $_POST['from_time'];
 $to_time= $_POST['to_time'];
 $date= $_POST['date'];
 $reson= $_POST['reson'];



 $manager_id=$_SESSION['manager_id'];
 $user_id=$_SESSION['id'];
// start created date
date_default_timezone_set("Africa/Cairo");
 $date_created=date('Y-m-d');
 $time_created = date("H:i:s"); 

// end created date

 
  $sql = "INSERT INTO `evening`(`user_id`, `time_created`, `date_created`,  `from_time`,`to_time`, `date`, `reson`,  `manager_id`) VALUES 
  ( '$user_id', '$time_created', '$date_created', '$from_time', '$to_time', '$date', '$reson', '".$_SESSION['manager_id']."') ";



$run = mysqli_query($con, $sql);
if($run){
	
echo "

<script>

alert('Your New ROW Has Been Inserted Successfully.');

window.open('user_index.php?page=add_evening','_self');

</script>

";
	
}



}

?>




