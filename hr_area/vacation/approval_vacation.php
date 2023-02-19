

<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
<div class="col">
<div class="mt-5">
<h4 class="card-title float-left mt-2">اجازات تم الموافقه عليها </h4>
<!-- <a href="add-employee.html" class="btn btn-primary float-right veiwbutton">اضافه اجازه</a> -->
</div>
</div>
</div>
</div>
<div class="page-header">
<div class="row align-items-center">
<div class="row">
<div class="col-lg-12">

</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">

</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>رقم الاجازه</th>
<th>الكود</th>

<th>اسم الموظف</th>
<th>نوع الاجازه</th>
<th>مده الاجازه المطلوبه</th>
<th>من تاريخ </th>
<th>الى تاريخ </th>
<th> تاريخ العوده </th>

 <th>القائم بالعمل</th>
 <th>عدد الايام المطلوبه</th>
 

<th>قرار رئيس القسم</th>
<th>قرار مدير الاداره</th>
<th>قرار الموارد البشريه</th>

<th class="text-right">Actions</th>
</tr>
</thead>


 <?php


include("../includes/db3.php");


$sql = "SELECT vacation.*,
(SELECT employee.vacation_day FROM employee WHERE employee.id = vacation.user_id) AS vacation_day ,

(SELECT employee.f_name FROM employee WHERE employee.id = vacation.user_id) AS name_employee ,
(SELECT employee.f_name FROM employee WHERE employee.id = vacation.emp_do_my_job) AS title_emp_do_my_job ,
(SELECT vacation_type.type FROM vacation_type WHERE vacation_type.id = vacation.type) AS title_vacation_type ,
(SELECT employee.code FROM employee WHERE employee.id = vacation.user_id) AS code_employee ,

(SELECT employee.Ordinary_leave FROM employee WHERE employee.id = vacation.user_id) AS Ordinary_leave ,
(SELECT employee.Casual_vacation FROM employee WHERE employee.id = vacation.user_id) AS Casual_vacation ,


 (SELECT approval.title FROM approval WHERE approval.id = vacation.approval_leader) AS title_approval_leader , 
 (SELECT approval.title FROM approval WHERE approval.id = vacation.approval_manager) AS title_approval_manager ,
  (SELECT approval.title FROM approval WHERE approval.id = vacation.approval_hr) AS title_approval_hr
 FROM `vacation`
 WHERE state = 0  AND  (approval_manager = 1)  AND  (approval_hr = 0)   ORDER BY id DESC
;";
//  AND   (from_date  BETWEEN '".$date_start_month_format."'  and  '".$date_end_month_format."')    
$run = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($run)){
$id=$row['id'];


if($row['approval_hr'] == 1){
$if_approve='
';

}else{
	$if_approve='
	<form method="POST" action="hr_index.php?page=edit_vacation">
	
				<input type="hidden" name="approval_leader" value="'.$row['approval_leader'].'" />
				<input type="hidden" name="approval_manager" value="'.$row['approval_manager'].'" />
				<input type="hidden" name="approval_hr" value="'.$row['approval_hr'].'" />
				<input type="hidden" name="id" value="'.$row['id'].'" />
				
							<input type="hidden" name="user_id" value="'.$row['user_id'].'" />
	
				
				 <input type="hidden" name="code_employee" value="'.$row['code_employee'].'" />
				  <input type="hidden" name="name_employee" value="'.$row['name_employee'].'" />
				   <input type="hidden" name="title_vacation_type" value="'.$row['title_vacation_type'].'" />
					<input type="hidden" name="length" value="'.$row['length'].'" />
					 <input type="hidden" name="from_date" value="'.$row['from_date'].'" />
					  <input type="hidden" name="to_date" value="'.$row['to_date'].'" />
					  
					 <input type="hidden" name="rutern_date" value="'.$row['rutern_date'].'" />
					  <input type="hidden" name="title_emp_do_my_job" value="'.$row['title_emp_do_my_job'].'" />
					  <input type="hidden" name="vacation_day" value="'.$row['vacation_day'].'" />
					  <input type="hidden" name="length_num_days" value="'.$row['length_num_days'].'" />
	
					  <input type="hidden" name="Ordinary_leave" value="'.$row['Ordinary_leave'].'" />
					  <input type="hidden" name="Casual_vacation" value="'.$row['Casual_vacation'].'" />

	
	 <button  type="submit" name="_approval"  class="btn btn-primary">موافق</button>
	</form>


 
	<form method="POST" action="hr_index.php?page=add_notes">
 
	<input type="hidden" name="id" value="'.$row['id'].'" />
	<input type="hidden" name="order_type" value="1" />
	<input type="hidden" name="user_id" value="'.$_SESSION['id'].'" />
	
	
	
	<input type="hidden" name="is_manager" value="'.$_SESSION['is_manager'].'" />
	<input type="hidden" name="id_section" value="'.$_SESSION['id_section'].'" />
	
	<button class="btn btn-outline-warning" name="add_note"  type="submit">add_notes</button>
	 
	
	</form>


	';

}

include("../tr.php");
$totle=$row['vacation_day']-$row['length_num_days'];
echo'
 <td>'.$row['id'].'</td>
 <td>'.$row['code_employee'].'</td>
<td>'.$row['name_employee'].'</td>


<td>'.$row['title_vacation_type'].'</td>
<td>'.$row['length'].'</td>

<td>'.$row['from_date'].'</td>
<td>'.$row['to_date'].'</td>
 <td>'.$row['rutern_date'].'</td>

  <td>'.$row['title_emp_do_my_job'].'</td>
 
 
     <td>'.$row['length_num_days'].'</td>
 
<td>'.$row['title_approval_leader'].'</td>
<td>'.$row['title_approval_manager'].'</td>
<td>'.$row['title_approval_hr'].'</td>
<td >
'.$if_approve.'
 

</td>
</tr></tbody>

';

}




?>





</table>
</div>
</div>
</div>
</div>
</div>
 
</div>
</div>
