

<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
<div class="col">
<div class="mt-5">
<h4 class="card-title float-left mt-2">الموظفين</h4>
<a href="hr_index.php?page=add_employee" class="btn btn-primary float-right veiwbutton">اضافه موظف</a>
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
<th>الاسم</th>
<th>كود الموظف</th>
<th>القسم</th>
<th>تاريخ التعيين</th>
<th> رصيد الاجازات الاعتياديه  </th>
<th>رصيد الاجازات الطارئه </th>

<th class="text-right">Actions</th>
</tr>
</thead>

										<?php
include("../includes/db3.php");

$sql = "SELECT employee.*,(SELECT section.section FROM section  where section.id = employee.id_section) AS title_section FROM `employee`  WHERE  state = 1  ";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo' <tbody>
<tr>
<td>'.$row['f_name'].'</td>
<td>'.$row['code'].'</td>
<td>'.$row['title_section'].'</td>
<td>'.$row['date_start'].'</td>
<td>'.$row['Ordinary_leave'].'</td>
<td>'.$row['Casual_vacation'].'</td>

<td class="text-right">
<form method="POST" action="hr_index.php?page=edit_employee">

            <input type="hidden" name="f_name" value="'.$row['f_name'].'" />
            <input type="hidden" name="code" value="'.$row['code'].'" />
            <input type="hidden" name="vacation_day" value="'.$row['vacation_day'].'" />
            <input type="hidden" name="id" value="'.$row['id'].'" />

 <button  type="submit" name="edit_employee"  class="btn btn-primary">تعديل</button>
<button  type="submit" name="delet_employee"  class="btn btn-danger">حذف </button>
</form>
</td>
</tr>
</tbody>';
}
?>






</table>
</div>
</div>
</div>
</div>
</div>
<div id="delete_asset" class="modal fade delete-modal" role="dialog">

</div>
</div>
</div>
