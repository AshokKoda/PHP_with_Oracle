<?php


$TABLE_NAME=$_REQUEST['TABLE_NAME'];
$FORM_ID=$_REQUEST['FORM_ID'];
$FORM_NAME=$_REQUEST['FORM_NAME'];
$FORM_DESC=$_REQUEST['FORM_DESC'];
$PREFIX=$_REQUEST['PREFIX'];
$OWNER=$_REQUEST['OWNER'];
$RESULT='';

echo "<br>" ;

$conn = oci_connect('hdk', 'hdk', 'devpdb1');


//$sql = 'BEGIN sayHello(:name, :message); END;';





$sql = "begin".
        "  :result := rg.create_new_form(p_table_name => :p_table_name,".
        "                                p_form_id => :p_form_id,".
        "                                p_form_name => :p_form_name,".
        "                                p_form_desc => :p_form_desc,".
        "                                p_prefix => :p_prefix,".
        "                                p_owner => :p_owner);".
        "end;";

$stid = oci_parse($conn, $sql );

//for OUT type and RETURN values : length should be specified. else length too small error will come.
oci_bind_by_name($stid, ":result", $RESULT, 3000);

oci_bind_by_name($stid, ":p_table_name", $TABLE_NAME);
oci_bind_by_name($stid, ":p_form_id", $FORM_ID);
oci_bind_by_name($stid, ":p_form_name", $FORM_NAME);
oci_bind_by_name($stid, ":p_form_desc", $FORM_DESC);
oci_bind_by_name($stid, ":p_prefix", $PREFIX);
oci_bind_by_name($stid, ":p_owner", $OWNER);

oci_execute($stid);



?>
