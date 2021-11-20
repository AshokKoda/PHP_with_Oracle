<?php

//WORKING CODE.

$conn = oci_connect('hr', 'hr', 'devpdb1');




$empid=$_REQUEST['empid'];


echo "<br>";
//echo $empid;
echo "<br>";
//echo $jobid;
echo "<br>";


$sql="delete employees where employee_id = :employee_id";

   
   



$stid = oci_parse($conn, $sql );


oci_bind_by_name($stid, ':EMPLOYEE_ID',$empid);







oci_execute($stid);


?>

<!DOCTYPE html> 
<body> 
<script>
function call_menu()
{
    window.location = "emp.php";

}
</script>
    <h1>
        <center>
         DATA DELETED SUCCESSFULLY
         <br>
         <br>
         <input type="button" value="Main Menu" onclick="return call_menu();">
        </center>
        </h1>
        

</body>
</html>

