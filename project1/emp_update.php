<?php
//give proper comments


$conn = oci_connect('hr', 'hr', 'devpdb1');

//to receive parameter into a local variable
$employee_id=$_REQUEST['employee_id'];
//$employee_id='105';

$sql = "SELECT a.*, to_char(hire_date,'YYYY-MM-DD') HIRE_DT, b.job_title , c.department_name
FROM employees a, jobs b, departments c
where a.job_id = b.job_id and
a.department_id = c.department_id and
 a.employee_id='" . $employee_id  ."'";


$stid = oci_parse($conn, $sql );

oci_execute($stid);

?>
<!DOCTYPE html> 
<html> 
	<head> 
		<title> Update Data From Database </title> 
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
    
<script> 

function validate1() { 
    if ((document.getElementById("first_name").value == null) || (document.getElementById("first_name").value == ""))
        {
            alert("Please enter first_name");
            document.getElementById("first_name").focus();
            return false;
        }


        if ((document.getElementById("last_name").value == null) || (document.getElementById("last_name").value == ""))
        {
            alert("Please enter last_name");
            document.getElementById("last_name").focus();
            return false;
        }
       
       
        if ((document.getElementById("email").value == null) || (document.getElementById("email").value == ""))
        {
            alert("Please enter email");
            document.getElementById("email").focus();
            return false;
        }
        
        
        if ((document.getElementById("phone").value == null) || (document.getElementById("phone").value == ""))
        {
            alert("Please enter phone number");
            document.getElementById("phone").focus();
            return false;
        }

        if ((document.getElementById("hiredate").value == null) || (document.getElementById("hiredate").value == ""))
        {
            alert("Please enter hirdate");
            document.getElementById("hiredate").focus();
            return false;
        }
        
        if ((document.getElementById("jobid").value == null) || (document.getElementById("jobid").value == ""))
        {
            alert("Please select job id");
            document.getElementById("jobid").focus();
            return false;
        }
        
        if ((document.getElementById("salary").value == null) || (document.getElementById("salary").value == ""))
        {
            alert("Please enter salary");
            document.getElementById("salary").focus();
            return false;
        }

        if ((document.getElementById("com").value == null) || (document.getElementById("com").value == ""))
        {
            alert("Please enter commission");
            document.getElementById("com").focus();
            return false;
        }

        
        if ((document.getElementById("managerid").value == null) || (document.getElementById("managerid").value == ""))
        {
            alert("Please select manager id");
            document.getElementById("managerid").focus();
            return false;
        }
 
        if ((document.getElementById("deptid").value == null) || (document.getElementById("deptid").value == ""))
        {
            alert("Please select department id");
            document.getElementById("deptid").focus();
            return false;
        }
        


    return true; 
} 



function call_save()
{
window.location = "emp_update_save.php";
}


function setTwoNumberDecimal(el)
 {
    el.value = parseFloat(el.value).toFixed(2);
};


  
</script> 


	</head> 
	<body> 
    <h1>
        <center>
            EMPLOYEE DETAILS
        </center>
        <form  id="emp_form" name="emp_form" action="emp_update_save.php"  method="post" onsubmit="return validate1();">
        </h1>
	<table align="center" border="1px" ; line-height:"40px;">  
		
        <?php while($rows=OCI_fetch_assoc($stid)) 
		{ 
		?> 
		<tr>
        <td>EMPLOYEE_ID:</td>
     <td><input type="text" name="empid" style="background-color : lightgrey;" value="<?php echo $rows['EMPLOYEE_ID'];?> "readonly>
     
        </td></tr> 
     <tr>
     <td> FIRST_NAME:</td>
		<td><input type="text"  id= "first_name" name="first_name" value="<?php echo $rows['FIRST_NAME'];?>"  >
        <span class="error">*</span></td></tr> 
        <tr>
        <td>LAST_NAME:</td>
         <td><input type="text" id="last_name"   name="last_name" value="<?php echo $rows['LAST_NAME'];?>" >
         <span class="error">*</span>
         </td></tr>
         <tr>
         <td>EMAIL:</td>
		<td><input type="text" id="email" value="<?php echo  $rows['EMAIL'];?>" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  >
        <span class="error">*</span></td> </tr>
        <tr>
        <td>PHONE_NUMBER:</td>
		<td><input type="text" id="phone" value="<?php echo $rows['PHONE_NUMBER'];?>" name="phone" pattern="\d{10}" maxlength="10" >
        <span class="error">*</span></td> </tr>
        <tr>
        <td>HIRE_DATE:</td>
        <td><input type="date" id="hiredate" value="<?php echo  $rows['HIRE_DT'];?>" name="hiredate"  min="1997-01-01" max="2020-12-10"  > </td> </tr>
        <tr>
        <td>JOB_ID:</td>
		<td>
     <?php





$conn = oci_connect('hr', 'hr', 'devpdb1');


$stid = oci_parse($conn, "SELECT job_id JOB_ID, job_id || ' - ' || job_title JOB_TITLE FROM jobs ");

oci_execute($stid);

echo "<select id='jobid' name='jobid'  >";

echo " <option value='' selected='selected'>Select job id </option>";

while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))
{
    echo "<option value='" . $row['JOB_ID'] . "'>" . $row['JOB_TITLE'] . "</option>";
}

echo " </select> ";







?>

		<input type="text" id ="jobid" name="jobtitle" value="<?php echo $rows['JOB_TITLE'];?>"  >
<span class="error">*</span></td></tr>

        <tr>
        <td>SALARY:</td> 
		<td><input type="number" id="salary" value="<?php echo $rows['SALARY'];?>" name="salary" min="1" oninput="this.value = 
                            !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null"><span class="error">*</span></td> </tr>
        <tr>
        <td>COMMISSION_PCT:</td>
		<td><input type="number" id="com" name="com" value="<?php echo $rows['COMMISSION_PCT'];?>" oninput="setTwoNumberDecimal(this)" min="0.0" max="0.99" step="0.01"></td></tr>
        <tr>
        <td>MANAGER_ID:</td>
        <td><?php




$conn = oci_connect('hr', 'hr', 'devpdb1');


$sql =  " select a.manager_id, a.manager_id || ' - ' || b.manager_name manager_name " .
        " from (select distinct manager_id from employees) a, " .
        " (select employee_id, first_name || ' ' || last_name manager_name " .
        " from employees) b " .
        " where a.manager_id = b.employee_id ";


//echo $sql;


$stid = oci_parse($conn, $sql);
oci_execute($stid);

echo "<select id='managerid' name='managerid'>";
echo " <option value='' selected='selected'>Select manager id</option>";


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<option value='" . $row['MANAGER_ID'] . "'>" . $row['MANAGER_NAME'] ."</option>" ;
}

echo " </select> ";

?>

<input type="text" id="managerid" name = "managerid" value="<?php echo $rows['MANAGER_ID'];?>" >
<span class="error">*</span></td> </tr>
        <tr>
        <td>DEPARTMENT_ID:</td>
		<td><?php

//to connect to database
$conn = oci_connect('hr', 'hr', 'devpdb1');


$sql =  "SELECT department_id DEPARTMENT_ID, department_id || ' - ' || department_name DEPARTMENT_NAME FROM departments";

//to create statement id
$stid = oci_parse($conn, $sql );

//to execute sql statement
oci_execute($stid);


//to create drop down 
echo "<select id='deptid'  name='deptid'>";

//to show first option as select department id
echo " <option value='' selected='selected'>Select department id</option>";

//to loop array data $stid 
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    //to add option(s)
    echo "<option value='" . $row['DEPARTMENT_ID'] . "'>" . $row['DEPARTMENT_NAME'] ."</option>" ;
}
//to close drop down
echo " </select> ";


?>
         <input type="text" id="deptid" name="department_name" value="<?php echo $rows['DEPARTMENT_NAME'];?>"  >               
                        <span class="error">*</span></td> </tr>
		  
		
	<?php 
               } 
          ?> 
    
    </table>
    
    <br> 
    <center>
    <input type= "submit" name="Save" value="Save" > 
    <input type="button" name="back" value="Back" onclick="history.back()">
    </center>
            </form>
    </body> 
	</html>

