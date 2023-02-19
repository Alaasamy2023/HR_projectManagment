<?php 
if(isset($_POST['approval'])){

$name_employee = $_POST['name_employee'];
$code_employee = $_POST['code_employee'];
 $user_id = $_POST['user_id'];


}
?>

<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
<div class="col">
<div class="mt-5">
<h4 class="card-title float-left mt-2"> <?php  echo "code : ".$code_employee."</br>"."name : ".$name_employee  ?></h4>
</div>
</div>
</div>


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
 WHERE  id = ".$_POST['id']."      
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
<form method="POST" action="permission/aprov_permission.php">

            <input type="hidden" name="approval_leader" value="'.$row['approval_leader'].'" />
            <input type="hidden" name="approval_manager" value="'.$row['approval_manager'].'" />
            <input type="hidden" name="approval_hr" value="'.$row['approval_hr'].'" />
            <input type="hidden" name="id" value="'.$row['id'].'" />
            <input type="hidden" name="name_employee" value="'.$row['name_employee'].'" />
            <input type="hidden" name="code_employee" value="'.$row['code_employee'].'" />
 <button  type="submit" name="approval"  class="btn btn-primary">   موافقه بدون خصم</button>
 <button  type="submit" name="d_approval"  class="btn btn-primary">   موافقه بالخصم \ تاخير</button></br>
<button  type="submit" name="not_approval"  class="btn btn-danger">رفــض </button>
</form>


</td>
</tr></tbody>

';

}




?>

</table>


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
<hr style="border: solid; color: #6FA939; width: 100%; text-align: center;" />

<div class="row">
<h4 class="card-title float-left mt-2" style="  color: #6FA939;   text-align: center;"> اذون  هذا الشهر  لهذا الموظف</h4></br>


<div class="col-sm-12">


<hr style="border: solid; color: #6FA939; width: 100%; text-align: center;" />


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
(SELECT employee.code FROM employee WHERE employee.id = permission.user_id) AS code_employee , 
(SELECT approval.title FROM approval WHERE approval.id = permission.approval_leader) AS title_approval_leader ,
 (SELECT approval.title FROM approval WHERE approval.id = permission.approval_manager) AS title_approval_manager ,
  (SELECT permission_type.title FROM permission_type WHERE permission_type.id = permission.type) AS title_type ,
    (SELECT permission_length.title FROM permission_length WHERE permission_length.id = permission.length) AS title_length ,
 (SELECT approval.title FROM approval WHERE approval.id = permission.approval_hr) AS title_approval_hr
 FROM `permission`
 WHERE state = 0     AND (approval_manager = 1)  AND (user_id = $user_id) AND (approval_hr = 1)  AND    (date  BETWEEN '".$date_start_month_format."'  and  '".$date_end_month_format."')     ORDER BY id DESC
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
