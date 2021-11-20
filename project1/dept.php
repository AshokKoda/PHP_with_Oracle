<?php
//to show department listing.
//WORKING CODE.


//print_r ($_POST);

$crud = $_POST['submit'];
$dept_id = $_POST['dept_id'];

//if condition to select the list
if ($crud=='list') {


//for connection of database
$conn = oci_connect('hr', 'hr', 'devpdb1');
//sql query
$stid = oci_parse($conn, "SELECT * FROM departments ");
//execution of sql query
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
<!--while condition to fetch the data-->
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
    



<?php
}

//elseif condition to select display 
elseif ($crud=="Display") {



$conn = oci_connect('hr', 'hr', 'devpdb1');

//to receive parameter into a local variable
//$dept_id=$_REQUEST['dept_id'];
//$employee_id='105';

$sql = "SELECT * FROM departments where department_id='" . $dept_id  ."'";

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


<script src="department.js"></script>
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
    <?php
}
//elseif condition to update
elseif ($crud=="Update") {
        

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

<?php
} 
elseif ($crud='add') {

?>



<style>
    .error {color: #FF0000;}
    div
    {
        background-color:white;
  width: 600px;
  border: 2px solid black;
  padding: 10px;
  margin: 20px;
  margin-right:500px;
  margin-left:500px;
  margin-top:20px;
  margin-bottom:20px;
    }
    p
    {
        border:5px black;
        border-radius: 20px;
        padding: 10px;
        text-align:center;
    }
    table,th,td{
      border:1px solid black;
      border-collapse:collapse;
      width:800px;
    }
    th,td{
        padding:10px;
    }
    th{
        text-align:left;
    }
    
</style>

    

    <h1>
        <center>
            DEPARTMENT MASTER
        </center>
        <form  id="dept_form" name="dept_form" action="dept_save.php"  method="post" onsubmit="return validate();">
        <center>
        <table style="">
        <tr>
        <td>Department Id:</td>
        <td><input type="text" id="dept_id" name="dept_id"/>
        <span class="error">*</span></td></tr>
        <tr>
        <td>Department Name:</td>
        <td><input type="text" id="department_name" name="department_name"/>
        <span class="error">*</span></td></tr>
        
                        <tr>
                        <td>ManagerID:</td>
                        <td><?php




$conn = oci_connect('hr', 'hr', 'devpdb1');


$sql =  "SELECT manager_id FROM departments "; 



$stid = oci_parse($conn, $sql);
oci_execute($stid);

echo "<select id='manager_id' name='manager_id'>";
echo " <option value='' selected='selected'>Select manager id</option>";


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<option value=" . $row['MANAGER_ID'] . "></option>" ;
}

echo " </select> ";

?>
<span class="error">*</span> </td>
</tr>
<tr>
<td>LOCATION ID:</td>
<td><?php

//to connect to database
$conn = oci_connect('hr', 'hr', 'devpdb1');

$sql =  'SELECT location_id FROM departments';

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
                        
                        <span class="error">*</span> </td>
                        </tr>
                        </table>
                        <table1>
                        
                        <td>
                        
                    
                        <input type="Submit" name="submit" id="submit" style="margin:0;" >
                        <input type="reset" value="Clear">
                  
   </td>
  </form>

    

</center>
</table1>

<?php 
}
?>


  
        
        






    <center>
    <input type="button" value="Back" onclick="history.back()">
    </center>
    </body> 
	</html>

