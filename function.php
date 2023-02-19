<?php

include("date.php");
include("includes/db3.php");





// items function Starts ///

function employee_name(){
	include("includes/db3.php");

 	
	 
	$get_items = "select * from employee where id=2";
	
	$run_items = mysqli_query($db,$get_items);
	
	while($row_items = mysqli_fetch_array($run_items)){
		
	$f_name = $row_items['f_name'];
	echo $f_name;
	
		
	}
	
	
	}
	
	
	// items function Ends ///
	



































?>