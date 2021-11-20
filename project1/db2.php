<?php
$conn = oci_connect('hr', 'hr', 'devpdb1');

$strSql = " select job_id, job_title  from jobs  ";


$stid = oci_parse($conn, $strSql);

$result = oci_execute($stid, OCI_DEFAULT);






echo '<select>';

while ($row = oci_fetch_array($result)) {
echo '<option value="' . $row['job_id'] . '">'.$row['job_id'].'</option>';
}
echo '</select>';

?>