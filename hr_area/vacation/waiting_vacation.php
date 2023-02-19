

<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
<div class="col">
<div class="mt-5">
<!-- <h4 class="card-title float-left mt-2">اجازات فى انتظار قرار المدير المباشر</h4> -->
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
 <th>عدد الايام المستحقه</th>

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

(SELECT employee.code FROM employee WHERE employee.id = vacation.user_id) AS code_employee , (SELECT approval.title FROM approval WHERE approval.id = vacation.approval_leader) AS title_approval_leader , (SELECT approval.title FROM approval WHERE approval.id = vacation.approval_manager) AS title_approval_manager , (SELECT approval.title FROM approval WHERE approval.id = vacation.approval_hr) AS title_approval_hr
 FROM `vacation`
 WHERE state = 0  AND    (approval_manager = 0) AND (from_date  BETWEEN '".$date_start_month_format."'  and  '".$date_end_month_format."')    ORDER BY id DESC  
;";

$run = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($run)){
$id=$row['id'];




include("../tr.php");

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
 
 
    <td>'.$row['vacation_day'].'</td>

<td>'.$row['title_approval_leader'].'</td>
<td>'.$row['title_approval_manager'].'</td>
<td>'.$row['title_approval_hr'].'</td>
<td >
 


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
<div id="delete_asset" class="modal fade delete-modal" role="dialog">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-body text-center">
<img src="assets/img/sent.png" alt="" width="50" height="46">
<h3 class="delete_class">Are you sure want to delete this Asset?</h3>
<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
<button type="submit" class="btn btn-danger">Delete</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
