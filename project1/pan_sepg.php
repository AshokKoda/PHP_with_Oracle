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
            RECOMMEND BY SEPG
         </center>
      </h2>
      <center>
         <form method="post"  action="Rec_by_sepg.php" onsubmit="">
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
                  <td>SQA Auditor:</td>
                  <td><?php
                     $conn = oci_connect('hdk', 'hdk', 'devpdb1');
                     $sql="SELECT * FROM IQMS_SQA_IQA_VIEW";
                     $stid = oci_parse($conn, $sql);
                     oci_execute($stid);
                     
                     echo "<select id='p_e_no_sqa' name='p_e_no_sqa'  >";
                     echo " <option value='' selected='selected'>-- Select --</option>";
                     
                     while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))
                     {
                         echo "<option value='" . $row['EMP_NO'] . "'>" . $row['EMP_NAME'] . "</option>";
                     }
                     
                     echo " </select> ";
                     
                     ?></td>
               </tr>
               <tr>
                  <td>SEPG Reviewer :</td>
                  <td><?php
                     $conn = oci_connect('hdk', 'hdk', 'devpdb1');
                     $sql="SELECT CODE_DESC EMP_NO,  CR.GET_EMP_NAME ( CODE_DESC ) EMP_NAME FROM  IQMS_COMMON_CODES
                     WHERE CODE_TYPE = 208 AND ACTIVE_STS = 'A'";
                     $stid = oci_parse($conn, $sql);
                     oci_execute($stid);
                     
                     echo "<select id='p_e_no_sepg' name='p_e_no_sepg'  >";
                     echo " <option value='' selected='selected'>-- Select --</option>";
                     
                     while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))
                     {
                         echo "<option value='" . $row['EMP_NO'] . "'>" . $row['EMP_NAME'] . "</option>";
                     }
                     
                     echo " </select> ";
                     
                     ?></td>
               </tr>
               <tr>
                  <td>SEPG Remarks:</td>
                  <td><textarea rows="4" cols="50" name="p_remarks_sepg" id="p_remarks_sepg"></textarea></td>
               </tr>
               <tr>
                  <td>Action:</td>
                  <td>
                     <!-- to select flag-->
                     <select name="p_recommend_flag" id="p_recommend_flag">
                        <option value="">--select action--</option>
                        <option value="R">Recommend</option>
                        <!--to recommend-->
                        <option value="J">Send Back</option>
                        <!--to Reject-->
                     </select>
                  </td>
               </tr>
            </table>
      </center>
      <br><br>
      <center>
      <input type="submit" value="Recommend">
      <br>
      <br>
      </center>
      </form>
   </body>
</html>