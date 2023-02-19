

<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
<div class="col">
<div class="mt-5">
<h4 class="card-title float-left mt-2">عرض اجازات الموظفين</h4>
<a href="manager_index.php?page=all_vacation&plocity=1" class="btn btn-primary float-right veiwbutton"> بحث</a>

</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<!-- <form>
<div class="row formtype">
<div class="col-md-3">
<div class="form-group">
<label>الموظف</label>
<input type="text" class="form-control" id="usr">
</div>
</div> 

<div class="col-md-3">
<div class="form-group">
<label>من تاريخ</label>
<input type="date" class="form-control" id="usr1">
</div>

</div>



<div class="col-md-3">
<div class="form-group">
<label>الى تاريخ</label>
<input type="date" class="form-control" id="usr1">
</div>

</div>








<div class="col-md-3">
<div class="form-group">
<label>Search</label>
<a href="#" class="btn btn-success btn-block mt-0 search_button"> Search </a>

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
<th>رقم الاجازه</th>
<th>الكود</th>

<th>اسم الموظف</th>
<th>نوع الاجازه</th>
<th>مده الاجازه المطلوبه</th>
<th>من تاريخ </th>
<th>الى تاريخ </th>
<th> تاريخ العوده </th>


<th>  رصيد الاعتيادى قبل الاجازه  </th>
 <th>رصيد العارضه قبل الاجازه</th>





 <th>القائم بالعمل</th>


 <th> رصيد الاجازات الاعتيادى الحالى	  </th>
                                        <th>رصيد الاجازات العارضه الحالى	</th>
                                        <th> عدد ايام الخصم من الاعتيادى</th>
                                        <th>   عدد ايام الخصم من العارضه</th>





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



(SELECT employee.Ordinary_leave FROM employee WHERE employee.id = vacation.user_id) AS Ordinary_leave ,
(SELECT employee.Casual_vacation FROM employee WHERE employee.id = vacation.user_id) AS Casual_vacation ,





(SELECT employee.code FROM employee WHERE employee.id = vacation.user_id) AS code_employee , (SELECT approval.title FROM approval WHERE approval.id = vacation.approval_leader) AS title_approval_leader , (SELECT approval.title FROM approval WHERE approval.id = vacation.approval_manager) AS title_approval_manager , (SELECT approval.title FROM approval WHERE approval.id = vacation.approval_hr) AS title_approval_hr
 FROM `vacation`
 WHERE state = 0  AND     approval_manager = 0      AND  manager_id = ".$_SESSION['id']."   ORDER BY id DESC
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




 <td>'.$row['Ordinary_leave'].'</td>
 <td>'.$row['Casual_vacation'].'</td>





  <td>'.$row['title_emp_do_my_job'].'</td>
 
  <td>'.$row['now_Ordinary_leave'].'</td>
  <td>'.$row['now_Casual_vacation'].'</td>
  <td>'.$row['descond_Ordinary_leave'].'</td>
  <td>'.$row['descond_Casual_vacation'].'</td>


<td>'.$row['title_approval_leader'].'</td>
<td>'.$row['title_approval_manager'].'</td>
<td>'.$row['title_approval_hr'].'</td>
<td >
<form method="POST" action="vacation/aprov_vacation.php">

<input type="hidden" name="approval_leader" value="'.$row['approval_leader'].'" />
<input type="hidden" name="approval_manager" value="'.$row['approval_manager'].'" />
<input type="hidden" name="approval_hr" value="'.$row['approval_hr'].'" />
<input type="hidden" name="id" value="'.$row['id'].'" />

<button  type="submit" name="approval"  class="btn btn-primary">موافق</button>
<button  type="submit" name="not_approval"  class="btn btn-danger">رفــض </button>
</form>


 
<form method="POST" action="manager_index.php?page=add_notes">
 
<input type="hidden" name="id" value="'.$row['id'].'" />
<input type="hidden" name="order_type" value="1" />
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
