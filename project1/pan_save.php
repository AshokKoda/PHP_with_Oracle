<?php

//WORKING CODE.

$conn = oci_connect('hdk', 'hdk', 'devpdb1');

print_r ($_POST);


$proj=$_REQUEST['proj'];
$group=$_REQUEST['group'];
$projectname=$_REQUEST['projectname'];
$acronym=$_REQUEST['acronym'];
$customer=$_REQUEST['customer'];
$cname=$_REQUEST['cname'];
$person=$_REQUEST['person'];
$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];
$tsize=$_REQUEST['tsize'];
$month=$_REQUEST['month'];
$startdate=$_REQUEST['startdate'];
$enddate=$_REQUEST['enddate'];
$effort=$_REQUEST['effort'];
$size=$_REQUEST['size'];
$manager=$_REQUEST['manager'];
$reason=$_REQUEST['reason'];


echo "<br>" ;


$sql="insert into iqms_pan (PROJECT_ID,APP_GRP_DESC,PROJ_NAME,PROJ_ACRONYM,DEPT_DESC,E_NAME_CONT,E_NAME_CUST,E_MOBILE_CONT,E_MAIL_ID_CONT,TEAM_SIZE,SCHEDULE_MONTHS,DATE_STARTED,DATE_TARGET,EST_EFFORTS,EST_SIZE,E_NAME_PROJ_MGR,CLOSED_REMARKS)
values
(:PROJECT_ID,
:APP_GRP_DESC,
  :PROJ_NAME,
  :PROJ_ACRONYM,
  :DEPT_DESC,
  :E_NAME_CONT,
  :E_NAME_CUST,
  :E_MOBILE_CONT,
  :E_MAIL_ID_CONT,
  :TEAM_SIZE,
  :SCHEDULE_MONTHS,
  :DATE_STARTED,
  :DATE_TARGET,
  :EST_EFFORTS,
  :EST_SIZE,
  :E_NAME_PROJ_MGR,
  :CLOSED_REMARKS)";
   
echo $sql;



$stid = oci_parse($conn, $sql );


oci_bind_by_name($stid, ':PROJECT_ID',$proj);
oci_bind_by_name($stid, ':APP_GRP_DESC',$group);
oci_bind_by_name($stid, ':PROJ_NAME',$projectname);
oci_bind_by_name($stid, ':PROJ_ACRONYM',$acronym);
oci_bind_by_name($stid, ':DEPT_DESC',$customer);
oci_bind_by_name($stid, ':E_NAME_CONT',$cname);
oci_bind_by_name($stid, ':E_NAME_CUST',$person);
oci_bind_by_name($stid, ':E_MOBILE_CONT',$phone);
oci_bind_by_name($stid, ':E_MAIL_ID_CONT',$email);
oci_bind_by_name($stid, ':TEAM_SIZE',$tsize);
oci_bind_by_name($stid, ':SCHEDULE_MONTHS',$month);
oci_bind_by_name($stid, ':DATE_STARTED',$startdate);
oci_bind_by_name($stid, ':DATE_TARGET',$enddate);
oci_bind_by_name($stid, ':EST_EFFORTS',$effort);
oci_bind_by_name($stid, ':EST_SIZE',$size);
oci_bind_by_name($stid, ':E_NAME_PROJ_MGR',$manager);
oci_bind_by_name($stid, ':CLOSED_REMARKS',$reason);
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

