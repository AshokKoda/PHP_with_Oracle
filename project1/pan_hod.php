<?php
$conn = oci_connect('hdk', 'hdk', 'devpdb1');
//print_r ($_POST);
//to receive parameter into a local variable
$project_id = $_REQUEST['project_id'];
//echo $proj_name='UTILITIES MIS SYSTEM';

$sql = "SELECT * FROM iqms_pan where project_id='" . $project_id . "'";

//echo $sql;

$stid = oci_parse($conn, $sql);

oci_execute($stid);

?>
<!-- request for aprroval or rejection-->
<!DOCTYPE html>
<html>
   <head>
      <style>
         table,th,td{
         width: 500px;
         border:1px solid black;
         border-collapse:collapse;
         }
         th,td{
         padding:10px;
         }
      </style>
   </head>
   <body>
      <h2>
         <center>
            HOD PROJECT APPROVAL REQUEST
         </center>
      </h2>
      <center>
         <form method="post"  action="pan_app_hod.php" onsubmit="">
            <br>
            <br>
            <table align="">
               <?php while(($rows = oci_fetch_assoc($stid)) != false)
                  { 
                  ?> 
               <tr>
                  <td>Project ID:</td>
                  <td><input type="text" id="p_project_id" name="p_project_id" value="<?php echo $rows['PROJECT_ID']; ?>"  style="background-color : lightgrey;" size="30" readonly> </td>
               </tr>
               <tr>
                  <td>Project Name:</td>
                  <td><input type="text"  value="<?php echo $rows['PROJ_NAME']; ?>" id="p_proj_name" name="p_proj_name" style="background-color : lightgrey;"  size="40" readonly>
                  </td>
               </tr>
               <?php
                  }
                  ?>
               <tr>
                  <td>Approved by:</td>
                  <td><input type="number" name="p_approved_by" id="p_approved_by" style="background-color : lightgrey;" value="104084" readonly />
                  </td>
               </tr>
               <tr>
                  <td>Remarks:</td>
                  <td><textarea rows="4" cols="50" name="p_remarks_hod" id="p_remarks_hod"></textarea></td>
               </tr>
               <tr>
                  <td>Action:</td>
                  <td>
                     <select name="p_hod_approved" id="p_hod_approved">
                        <option value="">--select action--</option>
                        <option value="Y">Approve</option>
                        <option value="N">Reject</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td>ID Modified:</td>
                  <td><input type="number" name="modify" id="modify" style="background-color : lightgrey;" value="109755" readonly />
                  </td>
               </tr>
            </table>
      </center>
      <br><br>
      <center>
      <input type="submit" value="Approve">
      <input type="button" value="Exit" onclick="history.back()">
      <br>
      <br>
      </center>
      </form>
   </body>
</html>