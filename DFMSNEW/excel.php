<?php
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=download.xls');

$conn=oci_connect("DFMSNEW","12345","localhost:1521/XE");
$query = "select df_id,df_name,col_no,null df_col_name, null df_col_desc from (select df_id,df_name from dfms_df_mast where df_id= '" . $df_id  ."')a,
(select col_no from dfms_col_cnt where col_no <=(select df_col from dfms_df_mast where df_id= '" . $df_id  ."'))b order by col_no ";
$stid = oci_parse($conn, $query);
oci_execute($stid);
?>