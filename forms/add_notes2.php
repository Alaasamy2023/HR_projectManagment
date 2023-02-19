


<?php

if(isset($_POST['add_notes'])){
    $id = $_POST['id'];
     $order_type = $_POST['order_type'];
     $user_id = $_POST['user_id'];
 
}

?>




<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title mt-5"> اضافه ملحوظه على الطلب </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="" accept-charset="utf-8">
                    <div class="row formtype">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label> الملحوظه </label>
                                <input type="text" class="form-control datetimepicker" name="notes" required>
                            </div>
                            <input type="hidden" class="form-control datetimepicker" name="id" value="<?php echo $_POST['id'];?>"  required>
                            <input type="hidden" class="form-control datetimepicker" name="order_type" value="<?php echo $_POST['order_type'];?>"  required>
                            <input type="hidden" class="form-control datetimepicker" name="user_id" value="<?php echo $_POST['user_id'];?>"  required>
 
                      
                        </div>

                    </div>


            </div>
            <button type="submit" name="submit" class="form-control" id="cf-submit">Submit </button>

            </form>
        </div>
    </div>
</div>





















<!-- 


<div class="page-wrapper">
<div class="content container-fluid">
 
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
<th>الملحوظه</th>
<th>التاريخ</th>
<th>الوقت</th>

 
</thead>

	 <tbody>									<?php
										
										
 						
										
										
include("../includes/db3.php");










$sql = "SELECT notes.*,
(SELECT employee.f_name FROM employee WHERE employee.id = notes.user_id) AS name_employee ,
(SELECT employee.code FROM employee WHERE employee.id = notes.user_id) AS code_employee 
FROM `notes`  WHERE  order_id = '".$id."'  AND order_type = '".$order_type."'  AND user_id =  '".$user_id."'  ";

$run = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run)){

echo'
<tr>
<td>'.$row['name_employee'].'</td>
<td>'.$row['code_employee'].'</td>
<td>'.$row['notes'].'</td>
<td>'.$row['date'].'</td>
<td>'.$row['time'].'</td>

 
</tr>
';
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




















 -->































</div>











<?php
include("../includes/db3.php");

/*
INSERT INTO `evening`(`user_id`, `time_created`, `date_created`, `all_date_created`, `from_time`,`to_time`, `date`, `reson`,  `manager_id`)

	 
*/
		 
		 
		

if(isset($_POST['submit']))
{    

    $id= $_POST['id'];

 $notes= $_POST['notes'];
 $order_type= $_POST['order_type'];
 $user_id= $_POST['user_id'];

 
 date_default_timezone_set("Africa/Cairo");

 $date=date('Y-m-d');
 $time = date("H:i:s"); 
 //".$_SESSION['id']."	



//  INSERT INTO `notes`(`id`, `user_id`, `order_id`, `order_type`, `notes`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
 $sql = "INSERT INTO `notes`(`user_id`, `order_id`, `order_type`, `notes`, `date`, `time`) VALUES ('".$user_id."','".$id."','".$order_type."','".$notes."','".$date."','".$time."')";

//  $sql = "update employee set pass = '$pass'   where id='".$_SESSION['id']."';";


$run = mysqli_query($con, $sql);
if($run){
	
// echo "

// <script>

// alert('تم حفظ الملحوظه');

// window.open('$get_page','_self');
 
// </script>

// ";



if($order_type == 1){
    echo "<script>alert('لا يمكن حذف الطلب عند موافقه اى من المعنين عليه')</script>";

    echo "<script> window.open('../user_area/user_index.php?page=vacation','_self') </script>";
    
        

}

	





   

}
// window.open('$get_page','_self');
 

}

?>

































































