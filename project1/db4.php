<?php

//WORKING CODE.


$conn = oci_connect('hr', 'hr', 'devpdb1');

$stid = oci_parse($conn, 'SELECT * FROM jobs ');
oci_execute($stid);

echo "<table border='1'>\n";
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>\n";
    echo "    <td>" .  $row['JOB_ID']   . "</td>\n";
    echo "</tr>\n";
}
echo "</table>\n";


// echo "<option value=" . $row['JOB_ID']  . ">" .  President  . "</option>"
// <option value="AD_PRES">President</option>
?>


