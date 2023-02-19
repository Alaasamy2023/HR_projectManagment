
	<?php







if ($_GET['page'] == "add_notes") {

    include("../forms/add_note.php");
    }
    











include("includes/header.php");


if ($_GET['page'] == "password") {

    include("../forms/password.php");
    }
    

if ($_GET['page'] == "dashboard") {

include("dashboard.php");
}




if ($_GET['page'] == "vacation") {

include("vacation/vacation.php");
}

if ($_GET['page'] == "add_vacation") {

include("../forms/add_vacation.php");
}


if ($_GET['page'] == "delet_errand") {

include("errand/delet_errand.php");
}











if ($_GET['page'] == "errand") {

include("errand/errand.php");
}
if ($_GET['page'] == "add_errand") {

include("../forms/add_errand.php");
}









if ($_GET['page'] == "evening") {

include("evening/evening.php");
}
if ($_GET['page'] == "add_evening") {

include("../forms/add_evening.php");
}








if ($_GET['page'] == "absence") {

include("absence/absence.php");
}


if ($_GET['page'] == "permission") {

include("permission/permission.php");
}

if ($_GET['page'] == "add_permission") {

include("../forms/add_permission.php");
}






















?>


	
	
	
	



                           <?php


include("includes/footer.php");



?>