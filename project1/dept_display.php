<html>
<head>
<?php


$conn = oci_connect('hr', 'hr', 'devpdb1');
print_r ($_POST);
//to receive parameter into a local variable
$department_id=$_REQUEST['department_id'];

//echo $department_id='20';

$sql = "SELECT * FROM departments where department_id='" . $department_id  ."'";

$stid = oci_parse($conn, $sql );

oci_execute($stid);

?>
 
	
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

</head>
<body>
    <h1>
        <center>
            DEPARTMENT DETAILS
        </center>
        </h1>
	<table align="center" border="1px" ; line-height:"40px;">  
		
		<?php while($rows=OCI_fetch_assoc($stid)) 
		{ 
		?> 
		<tr>
        <td>DEPARTMENT_ID:</td>
     <td><?php echo $rows['DEPARTMENT_ID']; ?></td></tr> 
     <tr>
     <td> DEPARTMENT_NAME:</td>
		<td><?php echo $rows['DEPARTMENT_NAME']; ?></td></tr> 
        <tr>
        <td>MANAGER_ID:</td>
        <td><?php echo $rows['MANAGER_ID']; ?></td> </tr>
        <tr>
        <td>LOCATION_ID:</td>
		<td><?php echo $rows['LOCATION_ID']; ?></td> </tr>
		  
		
	<?php 
               } 
               
          ?> 
    
	</table>
    <br> 
            </body>
            </html>
   