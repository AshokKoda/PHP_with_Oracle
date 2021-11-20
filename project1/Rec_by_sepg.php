<?php

$conn = oci_connect('hdk', 'hdk', 'devpdb1');

//print_r ($_POST);

$p_project_id=$_REQUEST['p_project_id'];
$p_e_no_sqa=$_REQUEST['p_e_no_sqa'];
$p_e_no_sepg=$_REQUEST['p_e_no_sepg'];
$p_id_user_modified='109755';
$p_remarks_sepg=$_REQUEST['p_remarks_sepg'];
$p_recommend_flag=$_REQUEST['p_recommend_flag'];;
$p_mail_recommend_by='tvkrao@vizagsteel.com';
$RESULT='';

$sql = "begin".
        ":result := pan.recommend_by_sepg(p_project_id => :p_project_id,".
                                  " p_e_no_sqa => :p_e_no_sqa,".
                                   "p_e_no_sepg => :p_e_no_sepg,".
                                   "p_id_user_modified => :p_id_user_modified,".
                                   "p_remarks_sepg => :p_remarks_sepg,".
                                   "p_recommend_flag => :p_recommend_flag,".
                                   "p_mail_recommend_by => :p_mail_recommend_by);".
"end;";

 $stid = oci_parse($conn, $sql );
 oci_bind_by_name($stid, ":result", $RESULT, 3000);   
 
oci_bind_by_name($stid, ':p_project_id',$p_project_id);
oci_bind_by_name($stid, ':p_e_no_sqa',$p_e_no_sqa);
oci_bind_by_name($stid, ':p_e_no_sepg',$p_e_no_sepg);
oci_bind_by_name($stid, ':p_id_user_modified',$p_id_user_modified);
oci_bind_by_name($stid, ':p_remarks_sepg',$p_remarks_sepg);
oci_bind_by_name($stid, ':p_recommend_flag',$p_recommend_flag);
oci_bind_by_name($stid, ':p_mail_recommend_by',$p_mail_recommend_by);
 
oci_execute($stid);


echo "<br>";

echo "p_project_id : " .$p_project_id . "<br>";
echo "p_e_no_sqa : " .$p_e_no_sqa . "<br>";
echo "p_e_no_sepg : " .$p_e_no_sepg . "<br>";
echo "p_id_user_modified : " .$p_id_user_modified . "<br>";
echo "p_remarks_sepg : " .$p_remarks_sepg . "<br>";
echo "p_recommend_flag : " .$p_recommend_flag . "<br>";
echo "p_mail_recommend_by : " .$p_mail_recommend_by . "<br>";


echo "<br>";

echo $RESULT;

echo "<br>";

?>

<!DOCTYPE html> 
<body>
<script>
function call_menu()
{
    window.location = "sepg_home.php";
}
</script> 
    <h1>
        <center>
          <br>
          <br>
         <input type="button" value="Main Menu" onclick="return call_menu();">
        </center>
    </h1>
</body>
</html>
