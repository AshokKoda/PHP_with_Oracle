<?php
    $conn=oci_connect("RINLERP","0000","localhost:1521/XE");
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
?>