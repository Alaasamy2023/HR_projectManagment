




<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title mt-5">تغيير كلمه المرور </h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
					<form method="post" action=""accept-charset="utf-8" >
							<div class="row formtype">
								<div class="col-md-10">
									<div class="form-group">
										<label> ادخل الباسورد الجديد</label>
										<input type="text" class="form-control datetimepicker" name="pass" required> </div>

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


 $pass= $_POST['pass'];



 $sql = "update employee set pass = '$pass'   where id='".$_SESSION['id']."';";



$run = mysqli_query($con, $sql);
if($run){
	
echo "

<script>

alert('تم تغير كلمه المرور بنجاح');

window.open('../logout.php','_self');

</script>

";
	
}



}

?>




