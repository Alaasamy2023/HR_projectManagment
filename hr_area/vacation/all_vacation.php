<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5">
                        <h4 class="card-title float-left mt-2">الاجازات</h4>
                        <!-- <a href="add-employee.html" class="btn btn-primary float-right veiwbutton">اضافه اجازه</a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="page-header">
            <div class="row align-items-center">
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
                                        <label>نوع الاجازه </label>
                                        <select class="form-control" name="type">
                                            <option value="0">الكل</option>

                                            <?php
include("../includes/db3.php");

$sql = "SELECT * FROM `vacation_type` ";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo' <option value="'.$row['id'].'">'.$row['type'].'</option>';
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

                                        <input type="number" class="form-control datetimepicker" name="id_vac" value="0">

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
                        <table id='empTable' class='display dataTable'>
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

<tbody>
                                <?php


include("../includes/db3.php");








if(isset($_POST['search'])){

  $user_id = $_POST['user_id'];
  $id_section = $_POST['id_section'];
  $type = $_POST['type'];
  $date_start = $_POST['date_start'];
  $date_end = $_POST['date_end'];
 $id_vac = $_POST['id_vac'];
  

 $approval = $_POST['approval'];
 $approval_HR = $_POST['approval_HR'];


$where ="";
if($user_id != 0){
  $where =$where."AND (user_id = $user_id)";

}
if($id_section == 0){

  
}
if($type != 0){

  $where =$where."AND (type = $type)";
 
}
if($id_section != 0){

	$where =$where."AND ((SELECT employee.id_section FROM employee WHERE employee.id = vacation.user_id) = $id_section)";
   
  }
  if($date_start != 0 && $date_end != 0  ){

	$where =$where." AND (  from_date  BETWEEN '$date_start'  and  '$date_end') ";


  }
  if($id_vac != 0){

	$where =$where."AND (id = $id_vac)";
   
  }
//   $where =$where."AND (approval_manager = $approval) AND (approval_hr = $approval_HR)";


  if($approval != 20){

    $where =$where."AND (approval_manager = $approval)";
   
  }
  if($approval_HR != 20){

    $where =$where."AND (approval_hr = $approval_HR)";
   
  }







$sql = "SELECT vacation.*,
(SELECT employee.vacation_day FROM employee WHERE employee.id = vacation.user_id) AS vacation_day ,
(SELECT employee.id_section FROM employee WHERE employee.id = vacation.user_id) AS id_section ,

(SELECT employee.f_name FROM employee WHERE employee.id = vacation.user_id) AS name_employee ,
(SELECT employee.f_name FROM employee WHERE employee.id = vacation.emp_do_my_job) AS title_emp_do_my_job ,
(SELECT vacation_type.type FROM vacation_type WHERE vacation_type.id = vacation.type) AS title_vacation_type ,

(SELECT employee.code FROM employee WHERE employee.id = vacation.user_id) AS code_employee , 
(SELECT approval.title FROM approval WHERE approval.id = vacation.approval_leader) AS title_approval_leader ,
 (SELECT approval.title FROM approval WHERE approval.id = vacation.approval_manager) AS title_approval_manager ,
  (SELECT approval.title FROM approval WHERE approval.id = vacation.approval_hr) AS title_approval_hr
 FROM `vacation`
 WHERE state = 0   $where    ORDER BY id DESC
;";








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
						  <input type="hidden" name="page" value="all_vacation" />

						
		
		 <button  type="submit" name="_approval"  class="btn btn-primary">موافق</button>
		</form>
		';
	
	}
	


include("../tr1.php");

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
 
  <td>'.$row['now_Ordinary_leave'].'</td>
  <td>'.$row['now_Casual_vacation'].'</td>
  <td>'.$row['descond_Ordinary_leave'].'</td>
  <td>'.$row['descond_Casual_vacation'].'</td>


<td>'.$row['title_approval_leader'].'</td>
<td>'.$row['title_approval_manager'].'</td>
<td>'.$row['title_approval_hr'].'</td>
<td >
 
 

</td>
</tr> 

';

}


// '.$if_approve.'



}





// $sql = "SELECT vacation.*,
// (SELECT employee.vacation_day FROM employee WHERE employee.id = vacation.user_id) AS vacation_day ,

// (SELECT employee.f_name FROM employee WHERE employee.id = vacation.user_id) AS name_employee ,
// (SELECT employee.f_name FROM employee WHERE employee.id = vacation.emp_do_my_job) AS title_emp_do_my_job ,
// (SELECT vacation_type.type FROM vacation_type WHERE vacation_type.id = vacation.type) AS title_vacation_type ,

// (SELECT employee.code FROM employee WHERE employee.id = vacation.user_id) AS code_employee , (SELECT approval.title FROM approval WHERE approval.id = vacation.approval_leader) AS title_approval_leader , (SELECT approval.title FROM approval WHERE approval.id = vacation.approval_manager) AS title_approval_manager , (SELECT approval.title FROM approval WHERE approval.id = vacation.approval_hr) AS title_approval_hr
//  FROM `vacation`
//  WHERE state = 0  AND    (from_date  BETWEEN '".$date_start_month_format."'  and  '".$date_end_month_format."')    
// ;";































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