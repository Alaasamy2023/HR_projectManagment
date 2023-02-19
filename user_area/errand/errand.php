

<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
<div class="col">
<div class="mt-5">
<h4 class="card-title float-left mt-2">مأموريات</h4>
<a href="user_index.php?page=add_errand" class="btn btn-primary float-right veiwbutton">اضافه مأموريه</a>
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
<th>رقم الماموريه</th>
<th>اسم الموظف</th>
<th>كود الموظف</th>
<th>نوع المأموريه</th>
<th>من تاريخ </th>
<th>الى تاريخ </th>
<th>من الساعه </th>
<th>الى الساعه </th>
<th>تاريخ تقديم الطلب</th>
<th>البيان</th>
<th>مكان الماموريه</th>
<th>العوده</th>
<th>قرار رئيس القسم</th>
<th>قرار مدير الاداره</th>
<th>قرار الموارد البشريه</th>

<th class="text-right">Actions</th>
</tr>
</thead>








<?php


include("../includes/db3.php");


$sql = "SELECT errand.*,
(SELECT employee.f_name FROM employee WHERE employee.id = errand.user_id) AS name_employee ,
(SELECT employee.code FROM employee WHERE employee.id = errand.user_id) AS code_employee ,

(SELECT errand_return_company.title FROM errand_return_company WHERE errand_return_company.id = errand.return_company) AS title_return_company , (SELECT errand_type.title FROM errand_type WHERE errand_type.id = errand.type) AS type_errand_type , (SELECT approval.title FROM approval WHERE approval.id = errand.approval_leader) AS title_approval_leader , (SELECT approval.title FROM approval WHERE approval.id = errand.approval_manager) AS title_approval_manager , (SELECT approval.title FROM approval WHERE approval.id = errand.approval_hr) AS title_approval_hr FROM `errand`
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

<td>'.$row['type_errand_type'].'</td>
<td>'.$row['from_date'].'</td>
<td>'.$row['to_date'].'</td>
<td>'.$row['from_time'].'</td>
<td>'.$row['to_time'].'</td>
<td>'.$row['date_created'].'</td>
<td>'.$row['stetment'].'</td>

<td>'.$row['location'].'</td>

<td>'.$row['title_return_company'].'</td>
<td>'.$row['title_approval_leader'].'</td>
<td>'.$row['title_approval_manager'].'</td>
<td>'.$row['title_approval_hr'].'</td>
<td >
<form method="POST" action="errand/delet_errand.php">
            <input type="hidden" name="approval_leader" value="'.$row['approval_leader'].'" />
            <input type="hidden" name="approval_manager" value="'.$row['approval_manager'].'" />
            <input type="hidden" name="approval_hr" value="'.$row['approval_hr'].'" />
            <input type="hidden" name="id" value="'.$row['id'].'" />

<button class="btn btn-primary btn-block" name="DELET"  type="submit">حذف</button>

</form>
<form method="POST" action="user_index.php?page=add_notes">
 
<input type="hidden" name="id" value="'.$row['id'].'" />
<input type="hidden" name="order_type" value="3" />
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
