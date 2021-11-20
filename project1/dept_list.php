<?php

//WORKING CODE.


$conn = oci_connect('hr', 'hr', 'devpdb1');

$stid = oci_parse($conn, "SELECT * FROM departments ");
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
		<th colspan="11"><h2>DEPARTMENTS LIST</h2></th> 
		</tr> 
			  <th> DEPARTMENT_ID </th> 
			  <th> DEPARTMENT_NAME </th>  
			  <th> MANAGER_ID</th> 
			  <th> LOCATION_ID</th> 
			  
		</tr> 
		
		<?php while($rows=OCI_fetch_assoc($stid)) 
		{ 
		?> 
		<tr> <td><?php echo $rows['DEPARTMENT_ID']; ?></td> 
		<td><?php echo $rows['DEPARTMENT_NAME']; ?></td> 
        <td><?php echo $rows['MANAGER_ID']; ?></td> 
		<td><?php echo $rows['LOCATION_ID']; ?></td> 
		  
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
