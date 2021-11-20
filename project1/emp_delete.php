<?php
//give proper comments


$conn = oci_connect('hr', 'hr', 'devpdb1');

//to receive parameter into a local variable
$employee_id=$_REQUEST['employee_id'];
//$employee_id='105';

$sql = "SELECT * FROM employees where employee_id='" . $employee_id  ."'";

$stid = oci_parse($conn, $sql );

oci_execute($stid);

?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title>Delete Data From Database </title> 
        <style>
        table,th,td{
            width: 400px;
      border:1px solid black;
      border-collapse:collapse;
    }
    th,td{
        padding:10px;
    }
    th{
        text-align:left;
    }
    </style>
    <script>
    function call_delete()
{
window.location = "emp_delete_save.php";
}
</script>
	</head> 
	<body> 
    <form  id="emp_form" name="emp_form" action="emp_delete_save.php"  method="post" onsubmit="return call_delete();">
    <h1>
        <center>
            EMPLOYEE DETAILS
        </center>
        </h1>
	<table align="center" border="1px" ; line-height:"40px;">  
		
		<?php while($rows=OCI_fetch_assoc($stid)) 
		{ 
		?> 
		<tr>
        <td>EMPLOYEE_ID:</td>
     <td><input type="text" name="empid" style="background-color : lightgrey;" value="<?php echo $rows['EMPLOYEE_ID'];?> "readonly></td></tr> 
     <tr>
     <td> FIRST_NAME:</td>
		<td><?php echo $rows['FIRST_NAME']; ?></td></tr> 
        <tr>
        <td>LAST_NAME:</td>
         <td><?php echo $rows['LAST_NAME']; ?></td></tr>
         <tr>
         <td>EMAIL:</td>
		<td><?php echo $rows['EMAIL']; ?></td> </tr>
        <tr>
        <td>PHONE_NUMBER:</td>
		<td><?php echo $rows['PHONE_NUMBER']; ?></td> </tr>
        <tr>
        <td>HIRE_DATE:</td>
        <td><?php echo $rows['HIRE_DATE']; ?></td> </tr>
        <tr>
        <td>JOB_ID:</td>
		<td><?php echo $rows['JOB_ID']; ?></td></tr>
        <tr>
        <td>SALARY:</td> 
		<td><?php echo $rows['SALARY']; ?></td> </tr>
        <tr>
        <td>COMMISSION_PCT:</td>
		<td><?php echo $rows['COMMISSION_PCT']; ?></td></tr>
        <tr>
        <td>MANAGER_ID:</td>
        <td><?php echo $rows['MANAGER_ID']; ?></td> </tr>
        <tr>
        <td>DEPARTMENT_ID:</td>
		<td><?php echo $rows['DEPARTMENT_ID']; ?></td> </tr>
		  
		
	<?php 
               } 
          ?> 
    
	</table>
    <br> 
    <center>
    <input type="submit" value="Delete">
    <input type="button" value="Back" onclick="history.back()">
    </center>
    </form>
    </body>

	</html>

