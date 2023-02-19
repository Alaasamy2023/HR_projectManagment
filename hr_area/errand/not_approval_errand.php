

<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
<div class="col">
<div class="mt-5">
<h4 class="card-title float-left mt-2">عرض ماموريات الموظفين</h4>
<!-- <a href="" class="btn btn-primary float-right veiwbutton">اضافه مأموريه</a> -->
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<!-- <form method="POST" action="">
<div class="row formtype">
<div class="col-md-3">
<div class="form-group">
<label>الموظف</label>
<input type="text" class="form-control" id="employee" name="employee">
</div>
</div> 

<div class="col-md-3">
<div class="form-group">
<label>من تاريخ</label>
<input type="date" class="form-control" id="from" name="from">
</div>

</div>



<div class="col-md-3">
<div class="form-group">
<label>الى تاريخ</label>
<input type="date" class="form-control" id="to" name="to">
</div>

</div>


<div class="col-md-3">
<div class="form-group">
<label>.</label>
<input type="submit" name="search" value="بحث" class="btn btn-primary form-control">

</div>

</div>



 
</div>
</form> -->
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

$search_q ="";

if(isset($_POST['search'])){
$employee = $_POST['employee'];
$from = $_POST['from'];
$to = $_POST['to'];








$sql = "SELECT errand.*,
(SELECT employee.f_name FROM employee WHERE employee.id = errand.user_id) AS name_employee ,
(SELECT employee.code FROM employee WHERE employee.id = errand.user_id) AS code_employee ,

(SELECT errand_return_company.title FROM errand_return_company WHERE errand_return_company.id = errand.return_company) AS title_return_company , (SELECT errand_type.title FROM errand_type WHERE errand_type.id = errand.type) AS type_errand_type , (SELECT approval.title FROM approval WHERE approval.id = errand.approval_leader) AS title_approval_leader , (SELECT approval.title FROM approval WHERE approval.id = errand.approval_manager) AS title_approval_manager , (SELECT approval.title FROM approval WHERE approval.id = errand.approval_hr) AS title_approval_hr FROM `errand`
 WHERE state = 0   ORDER BY id DESC " 
 ;



 if(isset($_POST['employee'])){
$sql.=" AND  user_id IN =" . $_POST['employee'] ;
}
//echo $employee . $from;

}else{



$sql = "SELECT errand.*,
(SELECT employee.f_name FROM employee WHERE employee.id = errand.user_id) AS name_employee ,
(SELECT employee.code FROM employee WHERE employee.id = errand.user_id) AS code_employee ,

(SELECT errand_return_company.title FROM errand_return_company WHERE errand_return_company.id = errand.return_company) AS title_return_company , (SELECT errand_type.title FROM errand_type WHERE errand_type.id = errand.type) AS type_errand_type , (SELECT approval.title FROM approval WHERE approval.id = errand.approval_leader) AS title_approval_leader , (SELECT approval.title FROM approval WHERE approval.id = errand.approval_manager) AS title_approval_manager , (SELECT approval.title FROM approval WHERE approval.id = errand.approval_hr) AS title_approval_hr FROM `errand`
  WHERE state = 0    AND (approval_manager = 2)  AND (from_date BETWEEN '".$date_start_month_format."'  and  '".$date_end_month_format."')" 

 ;

 }



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
















</td>
</tr></tbody>

';

}
/*
<form method="POST" action="errand/aprov_errand.php">

            <input type="hidden" name="approval_leader" value="'.$row['approval_leader'].'" />
            <input type="hidden" name="approval_manager" value="'.$row['approval_manager'].'" />
            <input type="hidden" name="approval_hr" value="'.$row['approval_hr'].'" />
            <input type="hidden" name="id" value="'.$row['id'].'" />

 <button  type="submit" name="approval"  class="btn btn-primary">موافق</button>
<button  type="submit" name="not_approval"  class="btn btn-danger">رفــض </button>
</form>
*/

?>



</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
