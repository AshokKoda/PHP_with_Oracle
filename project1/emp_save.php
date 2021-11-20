<?php

//WORKING CODE.

$conn = oci_connect('hr', 'hr', 'devpdb1');

//print_r ($_POST);


$empid=$_REQUEST['empid'];
$first_name=$_REQUEST['first_name'];
$last_name=$_REQUEST['last_name'];
$email=$_REQUEST['email'];
$phone=$_REQUEST['phone'];
$hiredate=$_REQUEST['hiredate'];
$jobid=$_REQUEST['jobid'];
$salary=$_REQUEST['salary'];
$com=$_REQUEST['com'];
$managerid=$_REQUEST['managerid'];
$deptid=$_REQUEST['deptid'];

$sql="insert into employees ( EMPLOYEE_ID,FIRST_NAME,LAST_NAME,EMAIL,PHONE_NUMBER,HIRE_DATE,JOB_ID,SALARY,COMMISSION_PCT,MANAGER_ID,DEPARTMENT_ID)
values
  (:EMPLOYEE_ID,
   :FIRST_NAME,
   :LAST_NAME,
   :EMAIL,
   :PHONE_NUMBER,
   TO_DATE(:HIRE_DATE, 'YYYY-MM-DD'),
   :JOB_ID,
   :SALARY,
   :COMMISSION_PCT,
   :MANAGER_ID,
   :DEPARTMENT_ID)";

   
   



$stid = oci_parse($conn, $sql );


oci_bind_by_name($stid, ':EMPLOYEE_ID',$empid);
oci_bind_by_name($stid, ':FIRST_NAME',$first_name);
oci_bind_by_name($stid, ':LAST_NAME',$last_name);
oci_bind_by_name($stid, ':EMAIL',$email);
oci_bind_by_name($stid, ':PHONE_NUMBER',$phone);
oci_bind_by_name($stid, ':HIRE_DATE',$hiredate);
oci_bind_by_name($stid, ':JOB_ID',$jobid);
oci_bind_by_name($stid, ':SALARY',$salary);
oci_bind_by_name($stid, ':COMMISSION_PCT',$com);
oci_bind_by_name($stid, ':MANAGER_ID',$managerid);
oci_bind_by_name($stid, ':DEPARTMENT_ID',$deptid);





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

