
	<?php


include("includes/header.php");




if ($_GET['page'] == "add_notes") {

    include("../forms/add_note.php");
    }
    



if ($_GET['page'] == "dashboard") {

    include("dashboard.php");
    }
 










if ($_GET['page'] == "profile") {

    include("../profile.php");
    }














    if ($_GET['page'] == "samary1") {

        include("samary1.php");
        }
     
    













if ($_GET['page'] == "password") {

    include("../forms/password.php");
    }
    

if ($_GET['page'] == "employee") {

include("employee.php");
}




if ($_GET['page'] == "add_employee") {

include("../forms/add_employee.php");
}

if ($_GET['page'] == "edit_employee") {

    include("edit_employee.php");
    }

if ($_GET['page'] == "add_excel") {

include("import_excel/add_excel.php");
}



if ($_GET['page'] == "all_vacation") {

include("vacation/all_vacation.php");
}
if ($_GET['page'] == "waiting_vacation") {

include("vacation/waiting_vacation.php");
}
if ($_GET['page'] == "approval_vacation") {

include("vacation/approval_vacation.php");
}
if ($_GET['page'] == "not_approval_vacation") {

include("vacation/not_approval_vacation.php");
}

if ($_GET['page'] == "all_errand") {

include("errand/all_errand.php");
}

if ($_GET['page'] == "waiting_errand") {

include("errand/waiting_errand.php");
}
if ($_GET['page'] == "approval_errand") {

include("errand/approval_errand.php");
}
if ($_GET['page'] == "not_approval_errand") {

include("errand/not_approval_errand.php");
}

if ($_GET['page'] == "all_delay") {

include("delay/all_delay.php");
}

if ($_GET['page'] == "waiting_delay") {

include("delay/waiting_delay.php");
}
if ($_GET['page'] == "approval_delay") {

include("delay/approval_delay.php");
}
if ($_GET['page'] == "not_approval_delay") {

include("delay/not_approval_delay.php");
}


if ($_GET['page'] == "all_evening") {

include("evening/all_evening.php");
}

if ($_GET['page'] == "waiting_evening") {

include("evening/waiting_evening.php");
}
if ($_GET['page'] == "approval_evening") {

include("evening/approval_evening.php");
}
if ($_GET['page'] == "not_approval_evening") {

include("evening/not_approval_evening.php");
}




if ($_GET['page'] == "all_absence") {

include("absence/all_absence.php");
}

if ($_GET['page'] == "waiting_absence") {

include("absence/waiting_absence.php");
}
if ($_GET['page'] == "approval_absence") {

include("absence/approval_absence.php");
}
if ($_GET['page'] == "not_approval_absence") {

include("absence/not_approval_absence.php");
}


if ($_GET['page'] == "all_permission") {

include("permission/all_permission.php");
}

if ($_GET['page'] == "waiting_permission") {

include("permission/waiting_permission.php");
}
if ($_GET['page'] == "approval_permission") {

include("permission/approval_permission.php");
}
if ($_GET['page'] == "not_approval_permission") {

include("permission/not_approval_permission.php");
}
if ($_GET['page'] == "approval_permission_type") {

include("permission/approval_permission_type.php");
}





if ($_GET['page'] == "edit_vacation") {

include("vacation/edit_vacation.php");
}





if ($_GET['page'] == "value_evening") {

include("evening/value_evening.php");
}







?>


	
	
	
	



                           <?php


include("includes/footer.php");



?>