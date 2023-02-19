


<?php


if($row['approval_manager']==1 && $row['approval_hr']==1 ){
echo'
 
<tr class="table-success">
';	
}else if($row['approval_manager']==1&& $row['approval_hr']==2 ){
echo'
 
<tr class="table-danger">
';	
}else if($row['approval_manager']==2 ){
echo'

<tr class="table-danger">
';	
}else{
echo'
  <tr >
';}


?>








