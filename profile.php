	
	<?php
	
	  include("../includes/db3.php");

	
	
	
	
	
	
	
	
	?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
			
			
				<div class="row">
					<div class="col-md-12 d-flex">
						<div class="card card-table flex-fill">
							<div class="card-header">
								<h4 class="card-title float-left mt-2">بيانات الموظف</h4>
 							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center">
										<thead>
											<tr>

												  <th class="text-center">رصيد اجازات العارضه</th>
											    <th class="text-center">رصيد اجازات الاعتيادى</th>
												<th class="text-center">الوظيفه</th>
												<th class="text-center">القسم</th>
												<th class="text-center">اسم الموظف</th>
												<th class="text-center">كود الموظف</th>
										


												 
											</tr>
										</thead>
										<tbody>
											<tr>
											
											
											
											
										  <?php
                                    include("../includes/db3.php");

                                    $sql = "SELECT employee.*,
                                 (SELECT section.section FROM section WHERE employee.id_section = section.id) AS section   

									FROM `employee`  WHERE id = ".$_GET['id']."   ";

                                    $run = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_array($run)) {

                                        echo ' 

										<td class="text-center">' . $row['Casual_vacation'] . '</td>
												<td class="text-center">' . $row['Ordinary_leave'] . '</td>
												<td class="text-center">' . $row['name_job'] . '</td>
												<td class="text-center">' . $row['section'] . '</td>
												<td class="text-center">' . $row['f_name'] . '</td>
												<td class="text-center"> <span class="badge badge-pill bg-success inv-badge">' . $row['code'] . '</span> </td>
											
										
										
										
										
										
										';
                                    }
                                    ?>	
											
											
											
											
											
											
											
											
												</tr>
									 	</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				
				
				
				
				</br></br></br>
				
				
				
				
				
				
				
				
				
					<div class="row">
					<div class="col-lg-12">
						
						
						
						 
						
					  <form method="POST" action="">
                    <div class="row formtype">






                        <!--  -->
 


                        <div class="col-md-4">
                            <div class="form-group">
                                <label>من تاريخ</label>

                                <input type="date" class="form-control datetimepicker" name="date_start">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>الى تاريخ</label>
                                <!-- <input type="date" class="form-control datetimepicker"> -->
                                <input type="date" class="form-control datetimepicker" name="date_end">


                            </div>
                        </div>





                        <div class="col-md-4">
                            <div class="form-group">
                                <label>بحث</label>
                                <!-- <a href="#" class="btn btn-success btn-block mt-0 search_button"> بحث </a> -->
                                <button type="submit" name="search" class="btn btn-success btn-block mt-0 search_button">بحث</button>

                            </div>
                        </div>
                    </div>
                </form>
          
						
						
						
						
						
						
						
						
						
						
					</div>
				</div>
				
				
				
				
				
						
				
				</br></br></br>
				
				
				
				
				
				
				
				
				<div class="row">
										<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 class="card_widget_header">3</h3>
										<h6 class="text-muted">اجازات</h6> </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
									<circle cx="12" cy="12" r="10"></circle>
									<line x1="2" y1="12" x2="22" y2="12"></line>
									<path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
									</path>
									</svg></span> </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 class="card_widget_header">2</h3>
										<h6 class="text-muted">ماموريات</h6> </div>
								<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
									<circle cx="12" cy="12" r="10"></circle>
									<line x1="2" y1="12" x2="22" y2="12"></line>
									<path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
									</path>
									</svg></span> </div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 class="card_widget_header">1</h3>
										<h6 class="text-muted">اذونات</h6> </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
									<circle cx="12" cy="12" r="10"></circle>
									<line x1="2" y1="12" x2="22" y2="12"></line>
									<path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
									</path>
									</svg></span> </div>
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 class="card_widget_header">1</h3>
										<h6 class="text-muted">سهرات</h6> </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="#009688" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
									<circle cx="12" cy="12" r="10"></circle>
									<line x1="2" y1="12" x2="22" y2="12"></line>
									<path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
									</path>
									</svg></span> </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			
			
			
			
			
			
			
					
				
				</br></br></br>
				
				
				
			
			
			
			
		
			
			
			
			
			
			
				<div class="row">
					<div class="col-md-12 d-flex">
						<div class="card card-table flex-fill">
							<div class="card-header">
								<h4 class="card-title float-left mt-2">تابع موظفينك</h4>
 							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center">
										<thead>
											<tr>
											
												<th class="text-center">كود الموظف</th>
												<th class="text-center">التاريخ</th>
												<th class="text-center">رقم الطلب</th>
												<th class="text-center">نوع الطلب</th>
												 
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="text-center">91</td>
												<td class="text-center">15/2/2023</td>
												<td class="text-center">552</td>
												<td class="text-center"> <span class="badge badge-pill bg-success inv-badge">نوع الطلب</span> </td>
												
												</tr>
									 	</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
						
				
				</br></br></br>
				
				
				
				
				
				
				
				
				
				
				
					
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id='empTable' class='display dataTable'>
                                <thead>
                                    <tr>
                                        <th>التاريخ</th>
                                        <th>وقت الحضور</th>
                                        <th>وقت الانصراف</th>
                                        <th>التاخير</th>
                                        <th>ماموريه</th>
                                        <th>ملاحظات</th>

                                </thead>
                                <tbody>






                                    <?php


                                    include("../includes/db3.php");







                                    if (isset($_POST['search'])) {

                                        //   $id_section = $_POST['id_section'];


                                       // $user_id = $_POST['user_id'];
                                        $date_end = $_POST['date_end'];
                                        $date_start = $_POST['date_start'];



























                                        include("../get_date_btween.php");


    $dates = getBetweenDates($date_start, $date_end);
     

     foreach ($dates as $value) {
        // echo $value ."  ". isweekend($value). "</br>";

$bools =isweekend($value);
// echo $bools;
if($bools == "true"){


 

                   echo '
                   <tr class="table-danger">
                   <td>' . $value . '</td>
                   <td>اجازه</td>
                   <td>اجازه</td>
                   <td>اجازه</td>
                   <td>اجازه</td>
                   <td>اجازه</td>
                   </tr>';



}else{ 





   //......................................................................
   $sql = "SELECT permission.*,
   (SELECT employee.f_name FROM employee WHERE employee.id = permission.user_id) AS name_employee ,
   (SELECT employee.id_section FROM employee WHERE employee.id = permission.user_id) AS id_section ,
   (SELECT employee.code FROM employee WHERE employee.id = permission.user_id) AS code_employee ,
   (SELECT approval.title FROM approval WHERE approval.id = permission.approval_leader) AS title_approval_leader ,
   (SELECT approval.title FROM approval WHERE approval.id = permission.approval_manager) AS title_approval_manager ,
   (SELECT permission_type.title FROM permission_type WHERE permission_type.id = permission.type) AS title_type ,
   (SELECT permission_length.title FROM permission_length WHERE permission_length.id = permission.length) AS title_length ,
   (SELECT approval.title FROM approval WHERE approval.id = permission.approval_hr) AS title_approval_hr
   FROM `permission`    WHERE id = 47        ORDER BY id DESC    ;";


               $run = mysqli_query($con, $sql);
               while ($row = mysqli_fetch_array($run)) {
                   $id = $row['id'];
                   include("../tr1.php");

                   echo '
                   <td>' . $value . '</td>
                   <td>08:30</td>
                   <td>16:30</td>
                   <td>' . $value . '</td>
                   <td>' . $row['to_time'] . '</td>
                   <td></td></tr>';
               }
               //......................................................................
            }

















      }



                                     


                                        /////////////
                                        echo '<tr class="table-danger">
                                            <td> اجمالى الاجازات :</td>
                                            <td>50</td>
                                            <td> بدل راحه /رسمي/سهر  :</td>
                                            <td>50</td>
                                            <td> اجمالى الاذونات  :</td>
                                            <td>50</td></tr>';

                                        /////////////
                                        echo '<tr class="table-danger">
     
    <td>    اجمالى التاخيرات :</td>
    <td>50</td>
    <td>    اجمالى الخصومات :</td>
    <td>50</td>
    <td> </td>
    <td> </td>
    
    </tr>
    
    ';

                                        /////////////
                                        echo '<tr class="table-danger">
     
   <td> علاء سامى رمضان</td>
   <td>كود رقم  91 </td>
   <td>الوظيفه</td>
   <td>ميعاد الحضور </td>
   <td>08:30 </td>
   <td> 16:30</td>
   
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

			
			
			
			
			
			
			
			
			
			
			
					
				
				</br></br></br>
				
				
				
			
			
			
			
			
			
			
			
			
			
			
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
			</div>
		</div>
	