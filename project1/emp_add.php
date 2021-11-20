<html>
<head>
<title>HTML FORM</title>
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

<script> 

    function validate() { 
        var employee_id= document.forms["myform"]["empid"]; 
        var first_name = document.forms["myform"]["first_name"]; 
        var last_name= document.forms["myform"]["last_name"]; 
        var email= document.forms["myform"]["email"]; 
        var phone = document.forms["myform"]["phone"]; 
        var hiredate = document.forms["myform"]["hiredate"]; 
    
        var jobid= document.forms["myform"]["jobid"]; 
        var salary = document.forms["myform"]["salary"]; 
        var com= document.forms["myform"]["com"]; 
        var managerid = document.forms["myform"]["managerid"]; 
        var deptid= document.forms["myform"]["deptid"];


        if (employee_id.value == "") { 
            window.alert("Please enter employee id."); 
            employee_id.focus(); 
            return false; 
        } 
  
        if (first_name.value == "") { 
            window.alert("Please enter your first name."); 
            first_name.focus(); 
            return false; 
        } 
  
        if (last_name.value == "") { 
            window.alert( "Please enter last name."); 
            last_name.focus(); 
            return false; 
        } 
        if (email.value == "") { 
            window.alert("Please enter email."); 
            email.focus(); 
            return false; 
        }
  
        if (phone.value == "") { 
            window.alert("Please enter your phone number."); 
            phone.focus(); 
            return false; 
        } 
  
        if (hiredate.value == "") { 
            window.alert("Please enter your hiredate"); 
            hiredate.focus(); 
            return false; 
        } 
  
        


  if (jobid.selectedIndex < 1) { 
                    alert("Please select."); 
                    jobid.focus(); 
                    return false; 
                } 

if (salary.value == "") { 
            window.alert("Please enter your salary"); 
            salary.focus(); 
            return false; 
        }
        if (com.value == "") { 
            window.alert("Please enter your commissionpct"); 
            com.focus(); 
            return false; 
        }

if (managerid.selectedIndex < 1) { 
                    alert("Please select."); 
                    managerid.focus(); 
                    return false; 
                } 

if (deptid.selectedIndex < 1) { 
                    alert("Please select."); 
                    deptid.focus(); 
                    return false; 
                } 
        return true; 
    } 
    function call_save()
{
  window.location = "emp_save.php";
}


function setTwoNumberDecimal(el) {
        el.value = parseFloat(el.value).toFixed(2);
    };
</script> 

</head>



<body>
    

    <h1>
        <center>
            EMPLOYEE MASTER
        </center>
        <form  id="emp_form" name="emp_form" action="emp_save.php"  method="post" onsubmit="return validate();">
        <center>
        <table style="">
        <tr>
        <td>EmployeeId:</td>
        <td><input type="text" id="empid" name="empid" required />
        <span class="error">*</span></td></tr>
        <tr>
        <td>First Name:</td>
        <td><input type="text" id="first_name" name="first_name" required />
        <span class="error">*</span></td></tr>
        <tr>
        <td>Last Name:</td>
        <td><input type="text" id="last_name" name="last_name" required />
        <span class="error">*</span></td>
        </tr>
        <tr>
        <td>EmailId:</td>
        <td><input type="email" id="email" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  required  />
                        <span class="error">* </span>
                      </td>
                            </tr>
                            <tr>
                            <td>Phone Number:</td>
                            <td><input type="text" id="phone" name="phone" pattern="\d{10}" maxlength="10" required/>
  
                        <span class="error">*</span></td></tr>
                        <tr>  
                        <td>Hire Date:</td>
                        <td><input type="date" id="hiredate" name="hiredate" value="" min="1997-01-01" max="2020-12-10" required ></td>
                        </tr>
                       
                        <tr>
                        <td>Jobid:</td>
                        <td>
                        <?php
$conn = oci_connect('hr', 'hr', 'devpdb1');

$stid = oci_parse($conn, 'SELECT * FROM jobs ');
oci_execute($stid);

echo "<select id='jobid' name='jobid'  >";
echo " <option value='' selected='selected'>Select job id</option>";

while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))
{
    echo "<option value='" . $row['JOB_ID'] . "'>" . $row['JOB_TITLE'] . "</option>";
}

echo " </select> ";

?>



<span class="error">*</span></td>
</tr>
<tr>
<td>Salary:</td>
<td><input type="number" id="salary" name="salary" min="1" oninput="this.value = 
                            !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null">

                        <span class="error">*</span></td>
                        </tr>
                        <tr>
                        <td>Commission_PCT :</td>
                        <td><input type="number"  oninput="setTwoNumberDecimal(this)" min="0.0" max="0.99" step="0.01"   name="com" id="com" required />
                        <span class="error">*</span></td>
                        </tr>
                        <tr>
                        <td>ManagerID:</td>
                        <td><?php




$conn = oci_connect('hr', 'hr', 'devpdb1');


$sql =  " select a.manager_id, b.manager_name " .
        " from (select distinct manager_id from employees) a, " .
        " (select employee_id, first_name || ' ' || last_name manager_name " .
        " from employees) b " .
        " where a.manager_id = b.employee_id ";





$stid = oci_parse($conn, $sql);
oci_execute($stid);

echo "<select id='managerid' name='managerid'>";
echo " <option value='' selected='selected'>Select manager id</option>";


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<option value='" . $row['MANAGER_ID'] . "'>" . $row['MANAGER_NAME'] ."</option>" ;
}

echo " </select> ";

?>
<span class="error">*</span> </td>
</tr>
<tr>
<td>Dept ID:</td>
<td><?php

//to connect to database
$conn = oci_connect('hr', 'hr', 'devpdb1');

$sql =  'SELECT * FROM departments';

//to create statement id
$stid = oci_parse($conn, $sql );

//to execute sql statement
oci_execute($stid);


//to create drop down 
echo "<select id='deptid'  name='deptid'                        >";

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
                        
                        <span class="error">*</span> </td>
                        </tr>
                        </form>
                        </table>
                        <table1>
                        
                        <td>
                        
                       
                        <input type="Submit" name="submit" id="submit" style="margin:0;" >
                        <input type="reset" value="Clear">
                  
    <input type="button" value="Back" onclick="history.back()" style="margin:0;"></input></form></td>
  </form>

    

</center>
</table1>
</body>
</html>
                        
    

        
        