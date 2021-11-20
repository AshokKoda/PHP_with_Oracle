<?php



$conn = oci_connect('hr', 'hr', 'devpdb1');

$stid = oci_parse($conn, 'SELECT * FROM  EMPLOYEES');
oci_execute($stid);

echo "<select id='empid'>";
echo " <option value='' selected='selected'>Select FIRST NAME</option>";


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<option value='" . $row['EMPLOYEE_ID'] . "'>" . $row['FIRST_NAME'] ."</option>" ;
    
}
echo " </select> ";

$stid = oci_parse($conn, 'SELECT * FROM  EMPLOYEES');
oci_execute($stid);

echo "<select id='empid'>";
echo " <option value='' selected='selected'>Select last name</option>";


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<option value='" . $row['EMPLOYEE_ID'] . "'>" . $row['LAST_NAME'] ."</option>" ;
    
}


echo " </select> ";

$stid = oci_parse($conn, 'SELECT * FROM  EMPLOYEES');
oci_execute($stid);

echo "<select id='empid'>";
echo " <option value='' selected='selected'>Select JOB_ID </option>";


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    
    echo "<option value='" . $row['EMPLOYEE_ID'] . "'>" . $row['JOB_ID'] ."</option>" ;
}

echo " </select> ";

$stid = oci_parse($conn, 'SELECT * FROM  EMPLOYEES');
oci_execute($stid);

echo "<select id='empid'>";
echo " <option value='' selected='selected'>Select hire date</option>";


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<option value='" . $row['EMPLOYEE_ID'] . "'>" . $row['HIRE_DATE'] ."</option>" ;
    
}

echo " </select> ";

$stid = oci_parse($conn, 'SELECT * FROM  EMPLOYEES');
oci_execute($stid);

echo "<select id='empid'>";
echo " <option value='' selected='selected'>Select COMMISIONPCT</option>";


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    
    echo "<option value='" . $row['EMPLOYEE_ID'] . "'>" . $row['COMMISION_PCT'] ."</option>" ;
}

echo " </select> ";

?>