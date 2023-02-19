<?php
include("../includes/db3.php");





if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $notes = $_POST['notes'];
    $order_type = $_POST['order_type'];
    $user_id = $_POST['user_id'];
    $id_section = $_POST['id_section'];
    $is_manager = $_POST['is_manager'];


    date_default_timezone_set("Africa/Cairo");

    $date = date('Y-m-d');
    $time = date("H:i:s");



    $sql = "INSERT INTO `notes`(`user_id`, `order_id`, `order_type`, `notes`, `date`, `time`) VALUES ('" . $user_id . "','" . $id . "','" . $order_type . "','" . $notes . "','" . $date . "','" . $time . "')";



    $run = mysqli_query($con, $sql);
    if ($run) {








        if ($_POST['order_type'] == 1 && $_POST['id_section'] != 2  && $_POST['is_manager'] != 1 ) {

            echo "

    <script>
    
    alert('Your New ROW Has Been Inserted Successfully.');
    
    window.open('user_index.php?page=vacation','_self');
    
    </script>
    
    ";
        } else         if ($_POST['order_type'] == 2 && $_POST['id_section'] != 2  && $_POST['is_manager'] != 1 ) {



            echo "

<script>

alert('Your New ROW Has Been Inserted Successfully.');

window.open('user_index.php?page=permission','_self');

</script>

";
} else         if ($_POST['order_type'] == 3 && $_POST['id_section'] != 2  && $_POST['is_manager'] != 1 ) {


            echo "
        
        <script>
        
        alert('Your New ROW Has Been Inserted Successfully.');
        
        window.open('user_index.php?page=errand','_self');
        
        </script>
        
        ";
    } else         if ($_POST['order_type'] == 4 && $_POST['id_section'] != 2  && $_POST['is_manager'] != 1 ) {


            echo "
                
                <script>
                
                alert('Your New ROW Has Been Inserted Successfully.');
                
                window.open('user_index.php?page=evening','_self');
                
                </script>
                
                ";
        }else














        if ($_POST['order_type'] == 1 && $_POST['id_section'] != 2  && $_POST['is_manager'] == 1 ) {

            echo "

    <script>
    
    alert('Your New ROW Has Been Inserted Successfully.');
    
    window.open('manager_index.php?page=vacation','_self');
    
    </script>
    
    ";
        } else         if ($_POST['order_type'] == 2 && $_POST['id_section'] != 2  && $_POST['is_manager'] == 1 ) {



            echo "

<script>

alert('Your New ROW Has Been Inserted Successfully.');

window.open('manager_index.php?page=permission','_self');

</script>

";
} else         if ($_POST['order_type'] == 3 && $_POST['id_section'] != 2  && $_POST['is_manager'] == 1 ) {


            echo "
        
        <script>
        
        alert('Your New ROW Has Been Inserted Successfully.');
        
        window.open('manager_index.php?page=errand','_self');
        
        </script>
        
        ";
    } else         if ($_POST['order_type'] == 4 && $_POST['id_section'] != 2  && $_POST['is_manager'] == 1 ) {


            echo "
                
                <script>
                
                alert('Your New ROW Has Been Inserted Successfully.');
                
                window.open('manager_index.php?page=evening','_self');
                
                </script>
                
                ";
        }














































        if ($_POST['order_type'] == 1 && $_POST['id_section'] == 2  && $_POST['is_manager'] != 0 ) {

            echo "

    <script>
    
    alert('Your New ROW Has Been Inserted Successfully.');
    
    window.open('hr_index.php?page=vacation','_self');
    
    </script>
    
    ";
        } else                if ($_POST['order_type'] == 2 && $_POST['id_section'] == 2  && $_POST['is_manager'] != 0 ) {




            echo "

<script>

alert('Your New ROW Has Been Inserted Successfully.');

window.open('hr_index.php?page=permission','_self');

</script>

";
} else                if ($_POST['order_type'] == 3 && $_POST['id_section'] == 2  && $_POST['is_manager'] != 0 ) {


            echo "
        
        <script>
        
        alert('Your New ROW Has Been Inserted Successfully.');
        
        window.open('hr_index.php?page=errand','_self');
        
        </script>
        
        ";
    } else                if ($_POST['order_type'] == 4 && $_POST['id_section'] == 2  && $_POST['is_manager'] != 0 ) {


            echo "
                
                <script>
                
                alert('Your New ROW Has Been Inserted Successfully.');
                
                window.open('hr_index.php?page=evening','_self');
                
                </script>
                
                ";
        }

















    }
}

?>









<?php

if (isset($_POST['add_notes'])) {
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
                    <h3 class="page-title mt-5">اضافه سهره</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="" accept-charset="utf-8">
                    <div class="row formtype">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>اضافه ملحوظه</label>

                                <textarea class="form-control" rows="5" name="notes" required></textarea>
                                <input type="hidden" class="form-control datetimepicker" name="id" value="<?php echo $_POST['id']; ?>" required>
                                <input type="hidden" class="form-control datetimepicker" name="order_type" value="<?php echo $_POST['order_type']; ?>" required>
                                <input type="hidden" class="form-control datetimepicker" name="user_id" value="<?php echo $_POST['user_id']; ?>" required>

                                <input type="hidden" class="form-control datetimepicker" name="id_section" value="<?php echo $_POST['id_section']; ?>" required>
                                <input type="hidden" class="form-control datetimepicker" name="is_manager" value="<?php echo $_POST['is_manager']; ?>" required>

                            </div>
                        </div>
                        <button type="submit" name="submit" class="form-control" id="cf-submit">اضافه </button>

                </form>
            </div>
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

                            <tbody> <?php





                                    include("../includes/db3.php");







                                    $id = $_POST['id'];
                                    $order_type = $_POST['order_type'];
                                    $user_id = $_POST['user_id'];


                                    $sql = "SELECT notes.*,
(SELECT employee.f_name FROM employee WHERE employee.id = notes.user_id) AS name_employee ,
(SELECT employee.code FROM employee WHERE employee.id = notes.user_id) AS code_employee 
FROM `notes`  WHERE  order_id = '" . $id . "'  AND order_type = '" . $order_type . "'            ORDER BY id DESC  ";

                                    $run = mysqli_query($con, $sql);
                                    while ($row = mysqli_fetch_array($run)) {

                                        echo '
<tr>
<td>' . $row['name_employee'] . '</td>
<td>' . $row['code_employee'] . '</td>
<td>' . $row['notes'] . '</td>
<td>' . $row['date'] . '</td>
<td>' . $row['time'] . '</td>

 
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