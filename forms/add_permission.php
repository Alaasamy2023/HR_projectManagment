




		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title mt-5">تقديم اذن</h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
					<form method="post" action=""accept-charset="utf-8" >
							<div class="row formtype">
								<div class="col-md-8">
									<div class="form-group">
										<label>تاريخ الطلب</label>
										<input type="date" class="form-control datetimepicker" name="date" required> </div>
	
								
									</div>
								<div class="col-md-8">
									<div class="form-group">
										<label>من الساعه</label>
										<input type="time" class="form-control datetimepicker" name="from_time" required> </div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label>الى الساعه</label>
										<input type="time" class="form-control datetimepicker" name="to_time" required> </div>
								</div>
								<div class="col-md-8">
								 
									
									
								<div class="form-group">
										<label>مده الطلب</label>
										<select class="form-control"   name="length" required>
<?php
include("../includes/db3.php");

$sql = "SELECT * FROM `permission_length`    ";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo' <option value="'.$row['id'].'">'.$row['title'].'</option>';
}
?>
										</select>
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





if(isset($_POST['submit']))
{    



	

 $length= $_POST['length'];
 $date= $_POST['date'];
 $from_time= $_POST['from_time'];
 $to_time= $_POST['to_time'];

 



   $user_id=$_SESSION['id'];
// start created date
date_default_timezone_set("Africa/Cairo");
 $date_created=date('Y-m-d');
 $time_created = date("H:i:s"); 

// end created date

 
  $sql = "INSERT INTO `permission`(`user_id`, `time_created`, `date_created`, `from_time`, `to_time`, `date`, `length`, `manager_id`) VALUES 
  ( '$user_id', '$time_created', '$date_created', '$from_time', '$to_time', '$date', '$length', '".$_SESSION['manager_id']."') ";

 //$insert_country = "insert into countries (country_name) values ('$country_name')";


//	 mysqli_set_charset($conn,"utf8");

$run = mysqli_query($con, $sql);
if($run){
	
echo "

<script>

alert('Your New ROW Has Been Inserted Successfully.');

window.open('user_index.php?page=add_permission','_self');

</script>

";
	
}



}
//header('Location: user_index.php?page=vacation');

?>




