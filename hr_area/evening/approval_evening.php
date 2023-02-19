

<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
<div class="col">
<div class="mt-5">
<h4 class="card-title float-left mt-2">تمت الموافقه عليها</h4>
<!-- <a href="add-employee.html" class="btn btn-primary float-right veiwbutton">اضافه</a> -->
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
<th>رقم</th>
<th>اسم الموظف</th>
<th>كود الموظف</th>
<th>من الساعه</th>
<th>الى الساعه</th>
<!-- <th>مده الاذن</th> -->
<th>تاريخ</th>
<th>السبب</th>
<th>موافقه رئيس القسم</th>
<th>موافقه المدير</th>
<th>hr موافقه </th>

<th class="text-right">Actions</th>
</tr>
</thead>

<?php


include("../includes/db3.php");


$sql = "SELECT evening.*,
(SELECT employee.f_name FROM employee WHERE employee.id = evening.user_id) AS name_employee ,
(SELECT employee.code FROM employee WHERE employee.id = evening.user_id) AS code_employee , (SELECT approval.title FROM approval WHERE approval.id = evening.approval_leader) AS title_approval_leader , (SELECT approval.title FROM approval WHERE approval.id = evening.approval_manager) AS title_approval_manager , (SELECT approval.title FROM approval WHERE approval.id = evening.approval_hr) AS title_approval_hr
 FROM `evening`
 WHERE state = 0     AND (approval_manager = 1)    AND  (approval_hr = 0)   ORDER BY id DESC
;";
//  AND    (date  BETWEEN '".$date_start_month_format."'  and  '".$date_end_month_format."')   
$run = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($run)){
$id=$row['id'];



include("../tr.php");

//<form method="POST" action="evening/aprov_evening.php">

echo'
 
<td>'.$row['id'].'</td>
<td>'.$row['name_employee'].'</td>
<td>'.$row['code_employee'].'</td>
<td>'.$row['from_time'].'</td>
<td>'.$row['to_time'].'</td>

<td>'.$row['date'].'</td>
<td>'.$row['reson'].'</td>
 
<td>'.$row['title_approval_leader'].'</td>
<td>'.$row['title_approval_manager'].'</td>
<td>'.$row['title_approval_hr'].'</td>
<td >
<form method="POST" action="hr_index.php?page=value_evening">

            <input type="hidden" name="approval_leader" value="'.$row['approval_leader'].'" />
            <input type="hidden" name="approval_manager" value="'.$row['approval_manager'].'" />
            <input type="hidden" name="approval_hr" value="'.$row['approval_hr'].'" />
            <input type="hidden" name="id" value="'.$row['id'].'" />

            <input type="hidden" name="name_employee" value="'.$row['name_employee'].'" />
            <input type="hidden" name="code_employee" value="'.$row['code_employee'].'" />
            <input type="hidden" name="date" value="'.$row['date'].'" />
 


 <button  type="submit" name="_approval"  class="btn btn-primary">تقرير</button>
</form>
<form method="POST" action="hr_index.php?page=add_notes">
 
<input type="hidden" name="id" value="'.$row['id'].'" />
<input type="hidden" name="order_type" value="4" />
<input type="hidden" name="user_id" value="'.$_SESSION['id'].'" />



<input type="hidden" name="is_manager" value="'.$_SESSION['is_manager'].'" />
<input type="hidden" name="id_section" value="'.$_SESSION['id_section'].'" />

<button class="btn btn-outline-warning" name="add_note"  type="submit">add_notes</button>
 

</form>

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
