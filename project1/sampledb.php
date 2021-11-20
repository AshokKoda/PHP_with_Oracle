<?php

//WORKING CODE.


$conn = oci_connect('hr', 'hr', 'devpdb1');

$stid = oci_parse($conn, 'SELECT * FROM jobs ');
oci_execute($stid);

echo "<select id='empid'>";
echo " <option value='' selected='selected'>Select job id</option>";


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<option value='" . $row['JOB_ID'] . "'>" . $row['JOB_TITLE'] ."            MIN_SALARY:" . $row['MIN_SALARY'] ."           MAX_SALARY:" . $row['MAX_SALARY'] ."</option>" ;
}

echo " </select> ";

?>