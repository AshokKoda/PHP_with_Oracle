<?php
if($_REQUEST['id']) {
    $conn=oci_connect("DFMSNEW","12345","localhost:1521/XE");
	$sql = "SELECT df_id, df_name, df_desc, df_col FROM dfms_df_mast WHERE df_id='".$_REQUEST['id']."'";
    $stid = oci_parse($conn, $sql);
	$result = oci_execute($stid, OCI_DEFAULT);
	
	$data = array();
	while( $rows = oci_fetch_array($stid, $result) ) {
		$data = $rows;
	}
	echo json_encode($data);
} else {
	echo 0;	
}
?>
