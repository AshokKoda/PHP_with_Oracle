<html>
    <head>
<?php

        

$conn = oci_connect('hr', 'hr', 'devpdb1');

//to receive parameter into a local variable
//$department_id=$_REQUEST['dept_id'];
//$employee_id='105';
//sql query
$sql = "SELECT * FROM departments where department_id='" . $dept_id  ."'";

//to create statement id
$stid = oci_parse($conn, $sql );

oci_execute($stid);

?>

        <style>
         .error {color: #FF0000;}
        table,th,td{
            width: 800px;
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
        <form  id="dept_form" name="dept_form" action="dept_update_save.php"  method="post" onsubmit="return validate1();">
        </h1>
	<table align="center" border="1px" ; line-height:"40px;">  
		<!--while condition to fetch the data-->
        <?php while($rows=OCI_fetch_assoc($stid)) 
		{ 
		?> 
		<tr>
        <td>EMPLOYEE_ID:</td>
     <td><input type="text" name="deptid" style="background-color : lightgrey;" value="<?php echo $rows['DEPARTMENT_ID'];?> "readonly>
     
        </td></tr> 
     <tr>
     <td>DEPARTMENT_NAME:</td>
		<td><input type="text"  id= "department_name" name="department_name" value="<?php echo $rows['DEPARTMENT_NAME'];?>"  >
        <span class="error">*</span></td></tr> 
        <tr>
        <td>MANAGER_ID:</td>
        <td><?php




$conn = oci_connect('hr', 'hr', 'devpdb1');


$sql = "SELECT manager_id FROM departments "; 

//echo $sql;


$stid = oci_parse($conn, $sql);
oci_execute($stid);

echo "<select id='manager_id' name='manager_id'>";
echo " <option value='' selected='selected'>Select manager id</option>";


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<option value='" . $row['MANAGER_ID'] . "'></option>" ;
}

echo " </select> ";

?>

<input type="text" id="manager_id" name = "manager_id" value="<?php echo $rows['MANAGER_ID'];?>" >
<span class="error">*</span></td> </tr>
        <tr>
        <td>LOCATION_ID:</td>
		<td><?php

//to connect to database
$conn = oci_connect('hr', 'hr', 'devpdb1');


$sql =  "SELECT location_id FROM departments";

//to create statement id
$stid = oci_parse($conn, $sql );

//to execute sql statement
oci_execute($stid);


//to create drop down 
echo "<select id='location_id'  name='location_id'>";

//to show first option as select department id
echo " <option value='' selected='selected'>Select location id</option>";

//to loop array data $stid 
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    //to add option(s)
    echo "<option value='" . $row['LOCATION_ID'] . "'></option>" ;
}
//to close drop down
echo " </select> ";


?>
         <input type="text" id="location_id" name="location_id" value="<?php echo $rows['LOCATION_ID'];?>"  >               
                        <span class="error">*</span></td> </tr>

<?php
        }
        ?>                        
		  
		
	
    
    </table>
    
    <br> 
    <center>
    <input type= "submit" name="Save" value="Save" ></center> 
            </form>
    </body>
    </html>
