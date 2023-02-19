<?php
if(isset($_POST['_approval']))
{
	
$approval_leader = $_POST['approval_leader'];
$approval_manager = $_POST['approval_manager'];
$approval_hr = $_POST['approval_hr'];
$code_employee = $_POST['code_employee'];
$name_employee = $_POST['name_employee'];
$id = $_POST['id'];

}

?>




		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title mt-5">  قيمه البدل  </h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
<form method="POST" action="">
							 
							 
								
							 
								
								
						<div class="col-md-10">
									<div class="form-group">
										<label> قيمه البدل</label>
										<input class="form-control" type="number" step="0.01"   name="value" value="0"  required> </div>
								</div>
								
			<input class="form-control"  type="hidden"   name="id" value="<?php echo $id?>" > </div>
	

								
					</div>
									<button type="submit" name="approval" class="form-control" id="cf-submit">قبول </button></br></br>
									
									<button type="submit" name="not_approval" class="form-control" id="cf-submit">رفض </button>

						</form>
					</div>
				</div>
 			</div>
		</div>
	
	
	
	





<?php
include("../includes/db3.php");



if(isset($_POST['approval'])){

 

$id = $_POST['id'];
$value = $_POST['value'];

 
$sql = "update evening set value = '".$value."' , approval_hr = '1'  where id='$id';

";
$run  = mysqli_query($con,$sql);

if($run){

 
echo "<script>alert('تم قبول الطلب')</script>";

echo "<script> window.open('hr_index.php?page=approval_evening','_self') </script>";

 }

}
else if(isset($_POST['not_approval'])){
	
	

    $id = $_POST['id'];
    $value = $_POST['value'];
    
     
    $sql = "update evening set   approval_hr = '2'  where id='$id';
    
    ";
    $run  = mysqli_query($con,$sql);
    
    if($run){
    
     
    echo "<script>alert('تم رفض الطلب')</script>";
    
    echo "<script> window.open('hr_index.php?page=approval_evening','_self') </script>";
    
     }



}







?>











