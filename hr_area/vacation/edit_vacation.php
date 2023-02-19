<?php
if (isset($_POST['_approval'])) {

	$approval_leader = $_POST['approval_leader'];
	$approval_manager = $_POST['approval_manager'];
	$approval_hr = $_POST['approval_hr'];
	$user_id = $_POST['user_id'];
	$code_employee = $_POST['code_employee'];
	$name_employee = $_POST['name_employee'];
	$title_vacation_type = $_POST['title_vacation_type'];
	$length = $_POST['length'];
	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$rutern_date = $_POST['rutern_date'];
	$title_emp_do_my_job = $_POST['title_emp_do_my_job'];
	$vacation_day = $_POST['vacation_day'];
	$id = $_POST['id'];
	$length_num_days = $_POST['length_num_days'];
	$page = $_POST['page'];


	$Ordinary_leave = $_POST['Ordinary_leave'];
	$Casual_vacation = $_POST['Casual_vacation'];
}

?>

















<?php
include("../includes/db3.php");



if (isset($_POST['approval'])) {



	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$rutern_date = $_POST['rutern_date'];
	$length_num_days = $_POST['length_num_days'];

	$vacation_day = $_POST['vacation_day'];
	$descond_Ordinary_leave = $_POST['descond_Ordinary_leave'];
	$descond_Casual_vacation = $_POST['descond_Casual_vacation'];

	$Ordinary_leave = $_POST['Ordinary_leave'];
	$Casual_vacation = $_POST['Casual_vacation'];


	$id = $_POST['id'];
	$user_id = $_POST['user_id'];
	$page = $_POST['page'];


	$totle_Ordinary_leave = $Ordinary_leave - $descond_Ordinary_leave;
	$totle_Casual_vacation = $Casual_vacation - $descond_Casual_vacation;



	$sql = "update vacation set approval_hr = '1',from_date = '" . $from_date . "' ,to_date = '" . $to_date . "' ,rutern_date = '" . $rutern_date . "' 
,length_num_days = '" . $length_num_days . "' ,now_Ordinary_leave = '" . $Ordinary_leave . "',now_Casual_vacation = '" . $Casual_vacation . "' 
,descond_Ordinary_leave = '" . $descond_Ordinary_leave . "',descond_Casual_vacation = '" . $descond_Casual_vacation . "'  where id='$id';

";
	$run  = mysqli_query($con, $sql);

	if ($run) {


		$sql2 = "update employee set Ordinary_leave = '$totle_Ordinary_leave' ,Casual_vacation = '$totle_Casual_vacation'  where id='$user_id';";
		$run2  = mysqli_query($con, $sql2);

		if ($run2) {

			echo "<script>alert('تم قبول الطلب')</script>";

			echo "<script> window.open('hr_index.php?page=approval_vacation','_self') </script>";
		}
	}
} else if (isset($_POST['not_approval'])) {




	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$rutern_date = $_POST['rutern_date'];
	$length_num_days = $_POST['length_num_days'];
	$id = $_POST['id'];
	$user_id = $_POST['user_id'];



	$sql = "update vacation set approval_hr = '2',from_date = '$from_date' ,to_date = '$to_date' ,rutern_date = '$rutern_date' ,length_num_days = '$length_num_days'     where id='$id'";


	$run  = mysqli_query($con, $sql);

	if ($run) {

		echo "<script>alert('تم رفض الطلب')</script>";
		echo "<script> window.open('hr_index.php?page=approval_vacation','_self') </script>";
	}
}




?>











































<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title mt-5">قرار القسم </h3>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<form method="POST" action="">
					<div class="row formtype">
						<div class="col-md-10">
							<div class="form-group">
								<label>مده الاجازه</label>
								<input class="form-control" type="text" name="length" value="<?php echo $length ?>" disabled>
							</div>
						</div>

						<div class="col-md-5">
							<div class="form-group">
								<label> رصيد الاعتيادى الحالى </label>
								<input class="form-control" type="text" value="<?php echo $Ordinary_leave ?>" disabled>
							</div>
						</div>


						<div class="col-md-5">
							<div class="form-group">
								<label>رصيد العارضه الحالى</label>
								<input class="form-control" type="text" value="<?php echo $Casual_vacation ?>" disabled>
							</div>
						</div>











						<div class="col-md-4">
							<div class="form-group">
								<label>من يوم</label>
								<input type="date" class="form-control datetimepicker" name="from_date" value="<?php echo $from_date ?>" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>حتى يوم</label>
								<input type="date" class="form-control datetimepicker" name="to_date" value="<?php echo $to_date ?>" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>على ان اعود يوم</label>
								<input type="date" class="form-control datetimepicker" name="rutern_date" value="<?php echo $rutern_date ?>" required>
							</div>
						</div>



						<div class="col-md-10">
							<div class="form-group">
								<label>المده الموافق عليها</label>
								<input class="form-control" type="number" step="0.01" name="length_num_days" value="<?php echo $length_num_days ?>" required>
							</div>
						</div>



						<div class="col-md-5">
							<div class="form-group">
								<label>عدد ايام الخصم من الاجازه الاعتياديه</label>
								<input class="form-control" type="number" step="0.01" name="descond_Ordinary_leave" value="0" required>
							</div>
						</div>



						<div class="col-md-5">
							<div class="form-group">
								<label> عدد ايام الخصم من العارضه</label>
								<input class="form-control" type="number" step="0.01" name="descond_Casual_vacation" value="0" required>
							</div>
						</div>







						<input class="form-control" type="hidden" name="id" value="<?php echo $id ?>">
						<input class="form-control" type="hidden" name="vacation_day" value="<?php echo $vacation_day ?>">
						<input class="form-control" type="hidden" name="user_id" value="<?php echo $user_id ?>">
						<input class="form-control" type="hidden" name="page" value="<?php echo $page ?>">

						<input class="form-control" type="hidden" name="Ordinary_leave" value="<?php echo $Ordinary_leave ?>">
						<input class="form-control" type="hidden" name="Casual_vacation" value="<?php echo $Casual_vacation ?>">


						<button type="submit" name="approval" class="form-control" id="cf-submit">قبول </button></br></br>

						<button type="submit" name="not_approval" class="form-control" id="cf-submit">رفض </button>

				</form>
			</div>
		</div>
	</div>
</div>