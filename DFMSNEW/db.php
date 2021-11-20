<?php

$username = "DFMSNEW";
$password = "12345";
$connection_string = "localhost:1521/XE";

$conn = oci_connect($username,$password,$connection_string);

if($conn)
{
	echo "connected";
}else{
	echo "Not connected";
}
?>