<?php

//WORKING CODE.

$conn = oci_connect('hr', 'hr', 'devpdb1');

print_r ($_POST);


$dept_id=$_REQUEST['dept_id'];
$department_name=$_REQUEST['department_name'];
$manager_id=$_REQUEST['manager_id'];
$location_id=$_REQUEST['location_id'];

$sql="insert into departments ( DEPARTMENT_ID,DEPARTMENT_NAME,MANAGER_ID,LOCATION_ID)
values
  (:DEPARTMENT_ID,
   :DEPARTMENT_NAME,
   :MANAGER_ID,
   :LOCATION_ID)";

   
   



$stid = oci_parse($conn, $sql );


oci_bind_by_name($stid, ':DEPARTMENT_ID',$dept_id);
oci_bind_by_name($stid, ':DEPARTMENT_NAME',$department_name);
oci_bind_by_name($stid, ':MANAGER_ID',$manager_id);
oci_bind_by_name($stid, ':LOCATION_ID',$location_id);





oci_execute($stid);


?>

<!DOCTYPE html> 
<body> 
    <h1>
        <center>
          DATA SUCCESSFULLY SAVED
        </center>
        </h1>

</body>
</html>

