<?php
$conn=oci_connect("LOGDB","0000","localhost:1521/XE");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$query = oci_parse($conn, "DELETE FROM logdata WHERE LOG_ID='" . $_GET["LOG_ID"] . "'");
$result = oci_execute($query, OCI_DEFAULT); 

if($result)
    {
        oci_commit($conn);
		echo "<div class='alert alert-success'><b>Record was deleted successfully!..</b></div>";
    }
    else
    {
        echo "<div class='alert alert-success'><b>Unable to delete record.</b></div>";
    }
?>