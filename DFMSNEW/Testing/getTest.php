<?php
if($_REQUEST['id']) {
    $conn=oci_connect("DFMSNEW","12345","localhost:1521/XE");
    $sql = "select df_id,df_name, null df_col_name, null df_col_desc from (select df_id,df_name from dfms_df_mast where df_id='".$_REQUEST['id']."')a,
            (select col_no from dfms_col_cnt where col_no<=(select df_col from dfms_df_mast where df_id= '".$_REQUEST['id']."'))b order by col_no";
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
