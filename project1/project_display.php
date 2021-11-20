<?php
//to show converted table
$conn = oci_connect('hdk', 'hdk', 'devpdb1');

//print_r ($_POST);
$p_project_id = $_REQUEST['p_project_id'];
$RESULT = '';

//stored procedure for project conversion
$sql = "begin" .

":result := pan.create_project_from_pan(p_project_id => :p_project_id);" . "end;";
$stid = oci_parse($conn, $sql);
oci_bind_by_name($stid, ":result", $RESULT, 3000);

oci_bind_by_name($stid, ':p_project_id', $p_project_id);
oci_execute($stid);

echo "<br>";

echo "p_project_id : " . $p_project_id . "<br>";
echo "<br>";

echo $RESULT;

echo "<br>";

?>

  <?php
//give proper comments


$conn = oci_connect('hdk', 'hdk', 'devpdb1');
print_r($_POST);
//to receive parameter into a local variable
$project_id = $_REQUEST['p_project_id'];
//echo $proj_name='UTILITIES MIS SYSTEM';
//$employee_id='105';
$sql1 = "SELECT * FROM tels_projects  where project_id='" . $p_project_id . "'";

echo $sql1;

$stid1 = oci_parse($conn, $sql1);

oci_execute($stid1);

?>
<!DOCTYPE html> 
<body>
   <script>
      function call_menu()
      {
          window.location = "pan_to_proj.php";
      
      }
      
      
        if(result=='0')
              Pan Is Converted To Project Successfully
              
   </script> 
   <head>
      <title> Fetch Data From Database </title>
      <style>
         table,th,td{
         width: 400px;
         border:1px solid black;
         border-collapse:collapse;
         }
         th,td{
         padding:10px;
         }
         th{
         text-align:left;
         }
      </style>
   </head>
   <body>
      <h1>
         <center>
            PROJECT DETAILS
         </center>
      </h1>
      <table align="center" border="1px" ; line-height:"40px;">  
      <?php while($rows=OCI_fetch_assoc($stid1)) 
         { 
         ?> 
      <!--to display project fields-->
      <tr>
         <td>Project ID:</td>
         <td><?php echo $rows['PROJECT_ID']; ?></td>
      </tr>
      <tr>
         <td>Project Name:</td>
         <td><?php echo $rows['PROJ_NAME']; ?></td>
      </tr>
      <tr>
         <td> Project Type:</td>
         <td><?php echo $rows['PROJECT_TYPE']; ?></td>
      </tr>
      <tr>
         <td>Group:</td>
         <td><?php echo $rows['APP_GRP_ID']; ?></td>
      </tr>
      <tr>
         <td>Acronym:</td>
         <td><?php echo $rows['PROJ_ACRONYM']; ?></td>
      </tr>
      <tr>
         <td>Customer Department:</td>
         <td><?php echo $rows['DEPT_CD']; ?></td>
      </tr>
      <tr>
         <td>Customer Name:</td>
         <td><?php echo $rows['E_NO_CONT']; ?></td>
      </tr>
      <tr>
         <td>Contact Person :</td>
         <td><?php echo $rows['E_NO_CUST']; ?></td>
      </tr>
      <tr>
         <td>Mobile Number:</td>
         <td><?php echo $rows['E_MOBILE_CONT']; ?></td>
      </tr>
      <tr>
         <td>Person's Email:</td>
         <td><?php echo $rows['E_MAIL_ID_CONT']; ?></td>
      </tr>
      <tr>
         <td>Team size:</td>
         <td><?php echo $rows['TEAM_SIZE']; ?></td>
      </tr>
      <tr>
         <td>Scheduled Month:</td>
         <td><?php echo $rows['SCHEDULE_MONTHS']; ?></td>
      </tr>
      <tr>
         <td>Estimated Start Date:</td>
         <td><?php echo $rows['DATE_STARTED']; ?></td>
      </tr>
      <tr>
         <td>Estimated Target Date:</td>
         <td><?php echo $rows['DATE_TARGET']; ?></td>
      </tr>
      <tr>
         <td>Estimated Effort:</td>
         <td><?php echo $rows['EST_EFFORTS']; ?></td>
      </tr>
      <tr>
         <td>Estimated Size:</td>
         <td><?php echo $rows['EST_SIZE']; ?></td>
      </tr>
      <tr>
         <td>Project Manager:</td>
         <td><?php echo $rows['E_NO_PROJ_MGR']; ?></td>
      </tr>
      <tr>
         <td>Reason:</td>
         <td><?php echo $rows['REASONS_NOSIZE']; ?></td>
      </tr>
      <tr>
         <td>Created by:</td>
         <td><?php echo $rows['ID_USER_ENTERED']; ?></td>
      </tr>
      <?php 
         } 
         ?> 
      </table>
      <br>
      <br>
      <center>
         <input type="button" value="Main Menu" onclick="return call_menu();">
         <!--to go back to main menu-->
      </center>
</body>
</html>