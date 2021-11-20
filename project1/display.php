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
		<title> Fetch Data From Database </title> 
	</head> 
	<body> 
	<table align="center" border="1px" style=""; line-height:"40px;"> 
	
		
		<?php while($rows=OCI_fetch_assoc($stid)) 
		{ 
		?> 
		<tr>
        <td>EMPLOYEE_ID:</td>
     <td><?php echo $rows['EMPLOYEE_ID']; ?></td></tr> 
     <tr>
     <td> FIRST_NAME</td>
		<td><?php echo $rows['FIRST_NAME']; ?></td></tr> 
        <tr>
        <td>LAST_NAME</td>
         <td><?php echo $rows['LAST_NAME']; ?></td></tr>
         <tr>
         <td>EMAIL</td>
		<td><?php echo $rows['EMAIL']; ?></td> </tr>
        <tr>
        <td>Phone number</td>
		<td><?php echo $rows['PHONE_NUMBER']; ?></td> </tr>
        <tr>
        <td>hire Date</td>
        <td><?php echo $rows['HIRE_DATE']; ?></td> </tr>
        <tr>
        <td>jobid</td>
		<td><?php echo $rows['JOB_ID']; ?></td></tr>
        <tr>
        <td>salary</td> 
		<td><?php echo $rows['SALARY']; ?></td> </tr>
        <tr>
        <td>COMMISSION_PCT</td>
		<td><?php echo $rows['COMMISSION_PCT']; ?></td></tr>
        <tr>
        <td>MANAGER_ID</td>
        <td><?php echo $rows['MANAGER_ID']; ?></td> </tr>
        <tr>
        <td>DEPARTMENT_ID</td>
		<td><?php echo $rows['DEPARTMENT_ID']; ?></td> </tr>
		  
		
	<?php 
               } 
          ?> 
    
	</table> 
    <center>
    <input type="button" value="Back" onclick="history.back()">
    </center>
    </body> 
	</html>
