<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-5">
                        <h4 class="card-title float-left mt-2">تقرير</h4>
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






                        <!--  -->

                        <div class="col-md-3">

                            <div class="form-group">
                                <label>الموظف</label>


                                <select class="form-control" name="user_id">
                                    <option value="0">الكل</option>
                                    <?php
                                    include("../includes/db3.php");

                                    $sql = "SELECT * FROM `employee`    ";

                                    $run = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_array($run)) {

                                        echo ' <option value="' . $row['id'] . '">' . $row['f_name'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!--  -->



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





                        <div class="col-md-3">
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


                                        $user_id = $_POST['user_id'];
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
</div>