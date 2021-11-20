<?php

//WORKING CODE.

$conn = oci_connect('hr', 'hr', 'devpdb1');

print_r ($_POST);


$dept_id=$_REQUEST['deptid'];
$department_name=$_REQUEST['department_name'];
$manager_id=$_REQUEST['manager_id'];
$location_id=$_REQUEST['location_id'];

echo "<br>";

echo "<br>";


$sql=" update departments
set DEPARTMENT_NAME = :DEPARTMENT_NAME,
    MANAGER_ID =:MANAGER_ID,
    LOCATION_ID = :LOCATION_ID 
      WHERE DEPARTMENT_ID = :DEPARTMENT_ID " ;

   
   
//echo $sql;


$stid = oci_parse($conn, $sql );


oci_bind_by_name($stid, ':DEPARTMENT_ID',$dept_id);
oci_bind_by_name($stid, ':DEPARTMENT_NAME',$department_name);
oci_bind_by_name($stid, ':MANAGER_ID',$manager_id);
oci_bind_by_name($stid, ':LOCATION_ID',$location_id);





oci_execute($stid);


?>

<!DOCTYPE html> 
<body> 
    <script src="department.js"></script>
    <h1>
        <center>
         DATA UPDATED SUCCESSFULLY
         <br>
         <br>
         <input type="button" value="Main Menu" onclick="return call_menu();">
        </center>
        </h1>
        

</body>
</html>

