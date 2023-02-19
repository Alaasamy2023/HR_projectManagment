

<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
<div class="col">
<div class="mt-5">
<h4 class="card-title float-left mt-2">أذن</h4>
<!-- <a href="add-employee.html" class="btn btn-primary float-right veiwbutton">اضافه أذن</a> -->
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
<form method="POST" action="">
                            <div class="row formtype">




                            <?php 
if(isset($_GET['plocity'])){
    ?>



<!--  -->

<div class="col-md-3">

<div class="form-group">
    <label>الموظف</label>


    <select class="form-control" name="user_id">
        <option value="0">الكل</option>
        <?php
include("../includes/db3.php");

$sql = "SELECT * FROM `employee`  WHERE  manager_id = ".$_SESSION['id']."   ";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo' <option value="'.$row['id'].'">'.$row['f_name'].'</option>';
}
?>
    </select>
</div>
</div>

<div class="col-md-3">
<div class="form-group">
    <label>القسم</label>
    <select class="form-control" name="id_section">

        <?php
include("../includes/db3.php");

$sql = "SELECT * FROM `section`    WHERE  manager_id =  ".$_SESSION['id']."   ";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo' <option value="'.$row['id'].'">'.$row['section'].'</option>';
}
?>
    </select>
</div>
</div>



<!--  -->









<?php 
}else{
    ?>

<!--  -->

<div class="col-md-3">

<div class="form-group">
    <label>الموظف</label>


    <select class="form-control" name="user_id">
        <option value="0">الكل</option>
        <?php
include("../includes/db3.php");

$sql = "SELECT * FROM `employee`    ";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo' <option value="'.$row['id'].'">'.$row['f_name'].'</option>';
}
?>
    </select>
</div>
</div>

<div class="col-md-3">
<div class="form-group">
    <label>القسم</label>
    <select class="form-control" name="id_section">
        <option value="0">الكل</option>

        <?php
include("../includes/db3.php");

$sql = "SELECT * FROM `section`    ";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo' <option value="'.$row['id'].'">'.$row['section'].'</option>';
}
?>
    </select>
</div>
</div>



<!--  -->




<?php 
}

?>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>نوع الخصم</label>
                                        <select class="form-control" name="permission_type">
                                            <option value="0">الكل</option>

                                            <?php
include("../includes/db3.php");

$sql = "SELECT * FROM `permission_type` ";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo' <option value="'.$row['id'].'">'.$row['title'].'</option>';
}
?>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>من تاريخ</label>

                                        <input type="date" class="form-control datetimepicker" name="date_start">

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>الى تاريخ</label>
                                        <!-- <input type="date" class="form-control datetimepicker"> -->
                                        <input type="date" class="form-control datetimepicker" name="date_end">


                                    </div>
                                </div>



                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>رقم الطلب </label>

                                        <input type="number" class="form-control datetimepicker" name="id_permission" value="0">

                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>قرار المدير  </label>

                                        <select class="form-control" name="approval">
                                        <option value="20">الكل</option>

                                            <?php
include("../includes/db3.php");

$sql = "SELECT * FROM `approval` ";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo' <option value="'.$row['id'].'">'.$row['title'].'</option>';
}
?>
                                        </select>
                                    </div>
                                </div>






                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>   HR  قرار</label>
                                        <select class="form-control" name="approval_HR">
                                        <option value="20">الكل</option>

                                            <?php
include("../includes/db3.php");

$sql = "SELECT * FROM `approval` ";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo' <option value="'.$row['id'].'">'.$row['title'].'</option>';
}
?>
                                        </select>
                                    </div>
                                </div>





                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>بحث</label>
                                        <!-- <a href="#" class="btn btn-success btn-block mt-0 search_button"> بحث </a> -->
                                        <button type="submit" name="search"
                                            class="btn btn-success btn-block mt-0 search_button">بحث</button>

                                    </div>
                                </div>
                            </div>
                        </form>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<div class="table-responsive">
                        <table id='empTable' class='display dataTable'>
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
<tbody>






<?php


include("../includes/db3.php");







if(isset($_POST['search'])){

  $user_id = $_POST['user_id'];
  $id_section = $_POST['id_section'];
  $permission_type = $_POST['permission_type'];
  $date_start = $_POST['date_start'];
  $date_end = $_POST['date_end'];
 $id_permission = $_POST['id_permission'];


 $approval = $_POST['approval'];
 $approval_HR = $_POST['approval_HR'];






 $where ="";
 if($user_id != 0){
   $where =$where."AND (user_id = $user_id)";
 
 }
 if($id_section == 0){
 
   
 }
 if($permission_type != 0){
 
   $where =$where."AND (type = $permission_type)";
  
 }
 if($id_section != 0){
 
   $where =$where."AND ((SELECT employee.id_section FROM employee WHERE employee.id = permission.user_id) = $id_section)";
    
   }
   if($date_start != 0 && $date_end != 0  ){
 
   $where =$where." AND (  date  BETWEEN '$date_start'  and  '$date_end') ";
 
 
   }
   if($id_permission != 0){
 
   $where =$where."AND (id = $id_permission)";
    
   }


   if($approval != 20){

    $where =$where."AND (approval_manager = $approval)";
   
  }
  if($approval_HR != 20){

    $where =$where."AND (approval_hr = $approval_HR)";
   
  }

















$sql = "SELECT permission.*,
(SELECT employee.f_name FROM employee WHERE employee.id = permission.user_id) AS name_employee ,
(SELECT employee.id_section FROM employee WHERE employee.id = permission.user_id) AS id_section ,
(SELECT employee.code FROM employee WHERE employee.id = permission.user_id) AS code_employee ,
 (SELECT approval.title FROM approval WHERE approval.id = permission.approval_leader) AS title_approval_leader ,
 (SELECT approval.title FROM approval WHERE approval.id = permission.approval_manager) AS title_approval_manager ,
  (SELECT permission_type.title FROM permission_type WHERE permission_type.id = permission.type) AS title_type ,
    (SELECT permission_length.title FROM permission_length WHERE permission_length.id = permission.length) AS title_length ,
 (SELECT approval.title FROM approval WHERE approval.id = permission.approval_hr) AS title_approval_hr
 FROM `permission`
 WHERE state = 0    $where    ORDER BY id DESC
;";

$run = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($run)){
$id=$row['id'];




include("../tr1.php");

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
</tr>

';

}

}


?>








</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
