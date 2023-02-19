<?php
    function getBetweenDates($startDate, $endDate)
    {
        $rangArray = [];
            
        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);
             
        for ($currentDate = $startDate; $currentDate <= $endDate; 
                                        $currentDate += (86400)) {
                                                
            $date = date('Y-m-d', $currentDate);
            $rangArray[] = $date;
        }
  
        return $rangArray;
    }






// is weekend or no 
    function isweekend($date){
        $date = strtotime($date);
        $date = date("l", $date);
        $date = strtolower($date);
        // echo $date;
        if($date == "friday") {
            return "true";
        } else {
            return "false";
        }
    }









  
    // $dates = getBetweenDates('2021-11-01', '2021-12-01');
     

    //  foreach ($dates as $value) {
    //     echo $value ."  ". isweekend($value). "</br>";
    //   }
?>