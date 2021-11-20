<?php




$conn = oci_connect('hr', 'hr', 'devpdb1');

$stid = oci_parse($conn, 'SELECT * FROM departments ');
oci_execute($stid);

echo "<select id='depid'>";
echo " <option value='' selected='selected'>Select manager id</option>";


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<option value='" . $row['DEPARTMENT_ID'] . "'>" . $row['MANAGER_ID'] ."</option>" ;
}

echo " </select> ";

?>



