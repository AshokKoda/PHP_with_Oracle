<?php

//WORKING CODE.

$conn = oci_connect('hr', 'hr', 'devpdb1');

$sql = "select table_name from user_tables where tablespace_name ='EXAMPLE'";

$stid = oci_parse($conn, $sql );

oci_execute($stid);


header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");


?>