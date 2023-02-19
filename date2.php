


<?php



$today= date("Y/m/d");
$day= date("d");
$month= date("m");
$year= date("Y");
//$tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
$s_month1= date('m',strtotime('-1 month')) ;


 $start_month = '26-'.$s_month1.'-'.$year;
 $end_month = '25-'.$month.'-'.$year;

   $date_start_month = date_create($start_month);
      $date_end_month = date_create($end_month);

      $date_start_month_format = $date_start_month->format('Y-m-d');
      $date_end_month_format = $date_end_month->format('Y-m-d');

   
   
//   print("Date: ".$dateTime->format('d-m-y')); 



 echo "date_start_month   ::".$date_start_month->format('Y-m-d')."</br>";
echo  "date_end_month    ::".$date_end_month->format('Y-m-d')."</br>";
echo  "day    ::".$day."</br>";
if($day == 05){
echo"is 04 day";

}
/*

SELECT errand.*, (SELECT employee.f_name FROM employee WHERE employee.id = errand.user_id) AS name_employee , (SELECT employee.code FROM employee WHERE employee.id = errand.user_id) AS code_employee , (SELECT errand_return_company.title FROM errand_return_company WHERE errand_return_company.id = errand.return_company) AS title_return_company , (SELECT errand_type.title FROM errand_type WHERE errand_type.id = errand.type) AS type_errand_type , (SELECT approval.title FROM approval WHERE approval.id = errand.approval_leader) AS title_approval_leader , (SELECT approval.title FROM approval WHERE approval.id = errand.approval_manager) AS title_approval_manager , (SELECT approval.title FROM approval WHERE approval.id = errand.approval_hr) AS title_approval_hr FROM `errand` WHERE (state = 0) AND (from_date BETWEEN '2023-02-02' and '2023-02-02');

*/


?>








