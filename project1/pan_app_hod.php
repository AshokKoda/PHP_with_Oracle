<?php
//approval by hod
$conn = oci_connect('hdk', 'hdk', 'devpdb1');

//print_r ($_POST);
$p_project_id = $_REQUEST['p_project_id'];
$p_hod_approved = $_REQUEST['p_hod_approved'];
$p_approved_by = $_REQUEST['p_approved_by'];
$p_remarks_hod = $_REQUEST['p_remarks_hod'];
$p_mail_approved_by = 'tvkrao@vizagsteel.com';
$RESULT = '';

//stored procedure for pan approval
$sql = "begin" .

":result := pan.approval_by_hod(p_project_id => :p_project_id," .
                               "p_hod_approved => :p_hod_approved," .
                               "p_approved_by => :p_approved_by," . 
                               "p_remarks_hod => :p_remarks_hod," . 
                               "p_mail_approved_by => :p_mail_approved_by);" . 
"end;";
$stid = oci_parse($conn, $sql);
oci_bind_by_name($stid, ":result", $RESULT, 3000);

oci_bind_by_name($stid, ':p_project_id', $p_project_id);
oci_bind_by_name($stid, ':p_hod_approved', $p_hod_approved);
oci_bind_by_name($stid, ':p_approved_by', $p_approved_by);
oci_bind_by_name($stid, ':p_remarks_hod', $p_remarks_hod);
oci_bind_by_name($stid, ':p_mail_approved_by', $p_mail_approved_by);

oci_execute($stid);

echo "<br>";

echo "p_project_id : " . $p_project_id . "<br>";
echo "p_hod_approved : " . $p_hod_approved . "<br>";
echo "p_approved_by : " . $p_approved_by . "<br>";
echo "p_remarks_hod : " . $p_remarks_hod . "<br>";
echo "p_mail_approved_by : " . $p_mail_approved_by . "<br>";

echo "<br>";

echo $RESULT;

echo "<br>";

?><!DOCTYPE html> 
<body>
   <script>
      function call_menu()
      {
          window.location = "hod_home.php";
      
      }
   </script> 
   <h1>
      <center>
         <br>
         <br>
         <input type="button" value="Main Menu" onclick="return call_menu();">
         <!--to go back to main menu-->
      </center>
   </h1>
</body>
</html>      