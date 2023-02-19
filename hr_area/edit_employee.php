<?php

 
 
$vacation_day= $_POST['vacation_day'];
$id= $_POST['id'];





if(isset($_POST['delet_employee']))
{   

 


    $sql = "update employee set state = 0   where id=$id ;";
   
   
   
   $run = mysqli_query($con, $sql);
   if($run){
       
   echo "
   
   <script>
   
   alert('تم الحذف');
   
   window.open('hr_index.php?page=employee','_self');
   
   </script>
   
   ";
       
   }
   
   

}


















?>




<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title mt-5">تعديل  </h3> </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
					<form method="post" action=""accept-charset="utf-8" >
							<div class="row formtype">
								<div class="col-md-10">
									<div class="form-group">
										<label>تعديل رصيد الاجازات الاعتياديه</label>
										<input type="text" class="form-control datetimepicker" name="Ordinary_leave" required> </div>
                                        <input type="hidden" name="id" value="<?php echo $id ;?>" />

								</div>
								


								<div class="col-md-10">
									<div class="form-group">
										<label>تعديل رصيد الاجازات العارضه</label>
										<input type="text" class="form-control datetimepicker" name="Casual_vacation" required> </div>
                                        <input type="hidden" name="id" value="<?php echo $id ;?>" />

								</div>









                                
								</div>
							<button type="submit" name="submit" class="form-control" id="cf-submit">Submit </button>

						</form>
					</div>
				</div>
			</div>
		</div>
	
	
	
	



		



<?php
include("../includes/db3.php");
 



if(isset($_POST['submit']))
{    

	$Ordinary_leave= $_POST['Ordinary_leave'];

 $Casual_vacation= $_POST['Casual_vacation'];
 $id= $_POST['id'];



 $sql = "update employee set Ordinary_leave = '".$Ordinary_leave."' , Casual_vacation = '".$Casual_vacation."'  where id=$id ;";



$run = mysqli_query($con, $sql);
if($run){
	
echo "

<script>

alert(' تم تغير رصيد الاجازات لهذا الموظف');

window.open('hr_index.php?page=employee','_self');

</script>

";
	
}



}
?>




