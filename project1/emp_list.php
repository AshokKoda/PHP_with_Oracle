<?php

//WORKING CODE.


$conn = oci_connect('hr', 'hr', 'devpdb1');

$stid = oci_parse($conn, "SELECT * FROM employees ");
oci_execute($stid);

?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title> Fetch Data From Database </title> 
	</head> 
	<body> 
	<table align="center" border="1px" style=""; line-height:"40px;"> 
	<tr> 
		<th colspan="11"><h2>EMPLOYEE LIST</h2></th> 
		</tr> 
			  <th> EMPLOYEE_ID </th> 
			  <th> FIRST_NAME </th> 
			  <th> LAST_NAME </th> 
			  <th> EMAIL </th> 
			  <th> PHONE_NUMBER </th> 
			  <th> HIRE_DATE </th> 
			  <th> JOB_ID </th> 
			  <th> SALARY </th>
              <th> COMMISION_PCT </th> 
			  <th> MANAGER_ID</th> 
			  <th> DEPARTMENT_ID</th> 
			  
		</tr> 
		
		<?php while($rows=OCI_fetch_assoc($stid)) 
		{ 
		?> 
		<tr> <td><?php echo $rows['EMPLOYEE_ID']; ?></td> 
		<td><?php echo $rows['FIRST_NAME']; ?></td> 
         <td><?php echo $rows['LAST_NAME']; ?></td>
		<td><?php echo $rows['EMAIL']; ?></td> 
		<td><?php echo $rows['PHONE_NUMBER']; ?></td> 
        <td><?php echo $rows['HIRE_DATE']; ?></td> 
		<td><?php echo $rows['JOB_ID']; ?></td> 
		<td><?php echo $rows['SALARY']; ?></td> 
		<td><?php echo $rows['COMMISSION_PCT']; ?></td>
        <td><?php echo $rows['MANAGER_ID']; ?></td> 
		<td><?php echo $rows['DEPARTMENT_ID']; ?></td> 
		  
		</tr> 
	<?php 
               } 
          ?> 
    
	</table> 
    <center>
    <input type="button" value="Back" onclick="history.back()">
    </center>
    </body> 
	</html>
