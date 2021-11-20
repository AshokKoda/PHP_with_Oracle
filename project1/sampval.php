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
<script type="text/javascript">
fuction validation()
{
    var empid = documnet.getElementById('empid').value;
    if(empid == "")
    {
        documnet.getElementById('empid').innerHTML ="**please enter employeeid";
        return false;
    }
}




<body>
    

    <h1>
        <center>
            EMPLOYEE MASTER
        </center>
        <center>
        <table style="">
        <tr>
        <td>EmployeeId:</td>
        <td><input type="text" name="empid" class="form-control" id="empid" autocomplete="off" />
        <span id="empid" class="text-danger font-weight-bold"></span></td></tr>
        <tr>
        <td>First Name:</td>
        <td><input type="text" name="first_name" required />
        <span class="error">*</span></td></tr>
        <tr>
        <td>Last Name:</td>
        <td><input type="text" name="last_name" required />
        <span class="error">*</span></td>
        </tr>
        <tr>
        <td>EmailId:</td>
        <td><input type="email" name="email "  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  required  />
                        <span class="error">* </span>
                        <span class="error">
                            </span></td>
                            </tr>
                            <tr>
                            <td>Phone Number:</td>
                            <td><input type="text" id="phone" name="phone" pattern="\d{10}" maxlength="10" required/>
  
                        <span class="error">*</span></td></tr>
                        <tr>  
                        <td>Hire Date:</td>
                        <td><input type="date" id="start" name="hiredate" value="" min="1997-01-01" max="2020-12-10" required ></td>
                        </tr>
                        <tr>
                        <td>Gender:</td>
                        <td><input type="radio" name="gender" value="female">Female
                        <input type="radio" name="gender" value="male">Male
                        <input type="radio" name="gender" value="other">Other
                        <span class="error">* </span></td>
                        </tr>
                        <tr>
                        <td>Jobid:</td>
                        <td><?php







$conn = oci_connect('hr', 'hr', 'devpdb1');

$stid = oci_parse($conn, 'SELECT * FROM jobs ');
oci_execute($stid);

echo "<select id='empid'>";
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
<td><input type="number" min="1" oninput="this.value = 
                            !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null">

                        <span class="error">*</span></td>
                        </tr>
                        <tr>
                        <td>Commission_PCT :</td>
                        <td><input type="number" name="com" placeholder="" maxlength="2" required />
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

echo "<select id='mgrid'>";
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
echo "<select id='depid'>";

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
                        </table>
                        <table1>
                        
                        <td><form><input type="Submit" name="submit" style="margin:0;" >

    <input type="button" name="Cancel" value="Clear" style="margin:0;">
    <input type="button" value="Back" onclick="history.back()" style="margin:0;"></input></form></td>
  
    

</center>
</table1>
                        
    

        
        