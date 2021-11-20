<?php

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


