<form method="post" action=""accept-charset="utf-8" >
		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title mt-5">اضافه موظف جديد</h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
							<div class="row formtype">
								<div class="col-md-4">
									<div class="form-group">
										<label>القسم</label>
										<select class="form-control"   name="id_section" required>
<?php
include("../includes/db3.php");

$sql = "SELECT * FROM `section`    ";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo' <option value="'.$row['id'].'">'.$row['section'].'</option>';
}
?>
										</select>
									</div>
								</div>	

								<div class="col-md-5">
									<div class="form-group">
										<label>اسم الموظف</label>
										<textarea class="form-control" rows="2"  name="f_name" required></textarea>
								</div>
						</div>
								
								<div class="col-md-5">
									<div class="form-group">
										<label>الوظيفه</label>
										<textarea class="form-control" rows="2"  name="name_job" required></textarea>
								</div>
						</div>	
								<div class="col-md-3">
									<div class="form-group">
										<label>تاريخ التعين</label>
											<input type="date" class="form-control datetimepicker" name="date_start" required> </div>
								</div>
								
								<div class="col-md-2">
									<div class="form-group">
										<label>كود الموظف</label>
											<input type="text" class="form-control datetimepicker" name="code" required> </div>
								</div>
								
								<div class="col-md-2">
									<div class="form-group">
										<label>رصيد الاجازات الاعتياديه</label>
											<input type="number" class="form-control datetimepicker"  step="0.01"  name="Ordinary_leave" value="0" required> </div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<label> رصيد الاجازات العارضه</label>
											<input type="number" class="form-control datetimepicker"  step="0.01"  name="Casual_vacation" value="0" required> </div>
								</div>
								
								<div class="col-md-4">
									<div class="form-group">
										<label>الباسورد</label>
											<input type="text" class="form-control datetimepicker" name="pass" required> </div>
								</div>
								
							
								
								
								 
						
						
							<div class="col-md-4">
									<div class="form-group">
										<label>المدير المباشر </label>
										<select class="form-control"   name="manager_id" required>
										
										<?php
include("../includes/db3.php");

$sql = "SELECT * FROM `employee`  WHERE is_manager = 1  ";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo' <option value="'.$row['id'].'">'.$row['f_name'].'</option>';
}
?>
										</select>
									</div>
								</div>
							<div class="col-md-4">
									<div class="form-group">
										<label>رئيس القسم </label>
										<select class="form-control"   name="leader_id" required>
										
										
				echo' <option value="0">لا احد</option>';
						
<?php
include("../includes/db3.php");

$sql = "SELECT * FROM `employee`  WHERE is_leader = 1  ";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo' <option value="'.$row['id'].'">'.$row['f_name'].'</option>';
}
?>

										
	
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
		 
*/



if(isset($_POST['submit']))
{    


 $f_name= $_POST['f_name'];
 $code= $_POST['code'];
 $date_start= $_POST['date_start'];
 $id_section= $_POST['id_section'];
 $leader_id= $_POST['leader_id'];
 $manager_id= $_POST['manager_id'];
 $pass= $_POST['pass'];
 $Ordinary_leave= $_POST['Ordinary_leave'];
 $Casual_vacation= $_POST['Casual_vacation'];
 $name_job= $_POST['name_job'];


// start created date
date_default_timezone_set("Africa/Cairo");
 $date_created=date('Y-m-d');
 $time_created = date("H:i:s"); 

// end created date

 
  $sql = "INSERT INTO `employee`(`f_name`, `code`, `date_start`, `id_section`, `leader_id`, `manager_id`, `pass`, `Ordinary_leave`, `Casual_vacation`, `name_job`) VALUES 
  ( '$f_name', '$code', '$date_start',  '$id_section', '$leader_id', '$manager_id', '$pass','$Ordinary_leave', '$Casual_vacation', '$name_job')";

 //$insert_country = "insert into countries (country_name) values ('$country_name')";


//	 mysqli_set_charset($conn,"utf8");

$run = mysqli_query($con, $sql);
if($run){
	
echo "

<script>

alert('Your New ROW Has Been Inserted Successfully.');

window.open('hr_index.php?page=add_employee','_self');

</script>

";
	
}



}
//header('Location: user_index.php?page=vacation');

?>




