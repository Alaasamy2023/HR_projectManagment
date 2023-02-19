

<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
<div class="col">
<div class="mt-5">
<h4 class="card-title float-left mt-2">طلبات أُذُونٌ</h4>
<a href="user_index.php?page=add_permission" class="btn btn-primary float-right veiwbutton">اضافه أُذُونٌ</a>
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
<th>رقم الاذن</th>
<th>اسم الموظف</th>
<th>كود الموظف</th>
<th>من الساعه</th>
<th>الى الساعه</th>
<th>مده الاذن</th>
<th>تاريخ</th>
<th>نوع الخصم</th>

<th>قرار المدير</th>
<th> HR  موافقه</th>

<th class="text-right">Actions</th>
</tr>
</thead>





<?php


include("../includes/db3.php");


$sql = "SELECT permission.*,
(SELECT employee.f_name FROM employee WHERE employee.id = permission.user_id) AS name_employee ,
(SELECT employee.code FROM employee WHERE employee.id = permission.user_id) AS code_employee , (SELECT approval.title FROM approval WHERE approval.id = permission.approval_leader) AS title_approval_leader ,
 (SELECT approval.title FROM approval WHERE approval.id = permission.approval_manager) AS title_approval_manager ,
  (SELECT permission_type.title FROM permission_type WHERE permission_type.id = permission.type) AS title_type ,
    (SELECT permission_length.title FROM permission_length WHERE permission_length.id = permission.length) AS title_length ,
 (SELECT approval.title FROM approval WHERE approval.id = permission.approval_hr) AS title_approval_hr
 FROM `permission`
 WHERE state = 0  AND user_id = ".$_SESSION['id']."  ORDER BY id DESC
;";

$run = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($run)){
$id=$row['id'];



include("../tr.php");


echo'
 
<td>'.$row['id'].'</td>
<td>'.$row['name_employee'].'</td>
<td>'.$row['code_employee'].'</td>
<td>'.$row['from_time'].'</td>
<td>'.$row['to_time'].'</td>
<td>'.$row['title_length'].'</td>
<td>'.$row['date'].'</td>
 <td>'.$row['title_type'].'</td>

<td>'.$row['title_approval_manager'].'</td>
<td>'.$row['title_approval_hr'].'</td>
<td >
<form method="POST" action="permission/delet_permission.php">
            <input type="hidden" name="approval_leader" value="'.$row['approval_leader'].'" />
            <input type="hidden" name="approval_manager" value="'.$row['approval_manager'].'" />
            <input type="hidden" name="approval_hr" value="'.$row['approval_hr'].'" />
            <input type="hidden" name="id" value="'.$row['id'].'" />

<button class="btn btn-primary btn-block" name="DELET"  type="submit">حذف</button>

</form>

<form method="POST" action="user_index.php?page=add_notes">
 
<input type="hidden" name="id" value="'.$row['id'].'" />
<input type="hidden" name="order_type" value="2" />
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


</div>
</div>
