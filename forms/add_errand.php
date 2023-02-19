<form method="post" action=""accept-charset="utf-8" >
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title mt-5">اضافه ماموريه</h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
							<div class="row formtype">
							<div class="col-md-4">
                                    <div class="form-group">
                                        <label> نوع الطلب </label>
                                        <select class="form-control" name="type">
                                            <option value="0">الكل</option>

                                            <?php
include("../includes/db3.php");

$sql = "SELECT * FROM `errand_type` ";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo' <option value="'.$row['id'].'">'.$row['title'].'</option>';
}
?>
                                        </select>
                                    </div>
                                </div>

								<div class="col-md-4">
									<div class="form-group">
										<label>من تاريخ</label>
											<input type="date" class="form-control datetimepicker" name="from_date" required> </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>الى تاريخ</label>
											<input type="date" class="form-control datetimepicker" name="to_date" required> </div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label>من الساعه</label>
											<input type="time" class="form-control datetimepicker" name="from_time" required> </div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label>الى الساعه</label>
											<input type="time" class="form-control datetimepicker" name="to_time" required> </div>
								</div>
								
								
									<div class="col-md-10">
									<div class="form-group">
										<label>مكان الماموريه</label>
										<textarea class="form-control" rows="2"  name="location" required></textarea>
								</div>
						</div>
								
								
								
								
								<div class="col-md-10">
									<div class="form-group">
										<label>بيان الماموريه</label>
										<textarea class="form-control" rows="5"  name="stetment" required></textarea>
								</div>
						</div>
						
						
							<div class="col-md-4">
									<div class="form-group">
										<label>العوده</label>
										<select class="form-control"   name="return_company">
										
											<option value="0">مع العوده لمقر الشركه</option>
											<option value="1">مع عدم العوده لمقر الشركه</option>
										</select>
									</div>
								</div>
						
						
						
						
						
					</div>
				</div>
				<button type="submit" name="submit" class="form-control" id="cf-submit">Submit </button>

			</div>
		</div>
		</div>
	
	</form>











<?php
include("../includes/db3.php");

/*
errand_type     نوع الماموريه
from_date        من تاريخ
to_date           الى تاريخ
from_time         من الساعه  
to_time           الى الساعه
location           مكان الماموريه
stetment              بيان الماموريه
return_company       العوده



$date=date('Y-m-d');
$time = date("H:i:s"); 
			 
	date_default_timezone_set("Africa/Cairo");
		 
			 
*/



if(isset($_POST['submit']))
{    


 $type= $_POST['type'];
 $from_date= $_POST['from_date'];
 $to_date= $_POST['to_date'];
 $from_time= $_POST['from_time'];
 $to_time= $_POST['to_time'];
 $location= $_POST['location'];
 $stetment= $_POST['stetment'];
 $return_company= $_POST['return_company'];
  $user_id=$_SESSION['id'];
// start created date
date_default_timezone_set("Africa/Cairo");
 $date_created=date('Y-m-d');
 $time_created = date("H:i:s"); 

// end created date

 
  $sql = "INSERT INTO `errand`(`user_id`, `time_created`, `date_created`, `all_date_created`, `type`, `from_time`, `to_time`, `from_date`, `to_date`, `location`, `stetment`, `return_company`, `manager_id`) VALUES 
  ( '$user_id', '$time_created', '$date_created', '0', '$type', '$from_time', '$to_time', '$from_date', '$to_date', '$location', '$stetment', '$return_company', '".$_SESSION['manager_id']."') ";

 //$insert_country = "insert into countries (country_name) values ('$country_name')";


//	 mysqli_set_charset($conn,"utf8");

$run = mysqli_query($con, $sql);
if($run){
	
echo "

<script>

alert('Your New ROW Has Been Inserted Successfully.');

window.open('user_index.php?page=add_errand','_self');

</script>

";
	
}



}
//header('Location: user_index.php?page=vacation');

?>




