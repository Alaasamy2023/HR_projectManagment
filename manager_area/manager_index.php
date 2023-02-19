
	<?php





include("includes/header.php");




if ($_GET['page'] == "add_notes") {

    include("../forms/add_note.php");
    }
    





if ($_GET['page'] == "profile") {

    include("../profile.php");
    }










if ($_GET['page'] == "password") {

    include("../forms/password.php");
    }
    

if ($_GET['page'] == "dashboard") {

include("dashboard.php");
}

if ($_GET['page'] == "attending_leaving") {

include("attending_leaving.php");
}



if ($_GET['page'] == "vacation") {

include("vacation/vacation.php");
}

if ($_GET['page'] == "errand") {

include("errand/errand.php");
}

if ($_GET['page'] == "evening") {

include("evening/evening.php");
}


if ($_GET['page'] == "absence") {

include("absence/absence.php");
}


if ($_GET['page'] == "permission") {

include("permission/permission.php");
}


if ($_GET['page'] == "report") {

include("report/report.php");
}













if ($_GET['page'] == "all_vacation") {

    include("../hr_area/vacation/all_vacation.php");
    }


    if ($_GET['page'] == "all_permission") {

        include("../hr_area/permission/all_permission.php");
        }
    
   
        if ($_GET['page'] == "all_errand") {

            include("../hr_area/errand/all_errand.php");
            }
        
        
       
            if ($_GET['page'] == "all_evening") {

                include("../hr_area/evening/all_evening.php");
                }
             





?>


	
	
	
	



                           <?php


include("includes/footer.php");



?>