<?php
   $conn = oci_connect('hdk', 'hdk', 'devpdb1');
   //print_r ($_POST);
   //to receive parameter into a local variable
   $project_id = $_REQUEST['project_id'];
   //echo $proj_name='UTILITIES MIS SYSTEM';
   
   
   $sql = "SELECT * FROM iqms_pan where project_id='" . $project_id . "'";
   
   //echo $sql;
   
   
   $stid1 = oci_parse($conn, $sql);
   
   oci_execute($stid1);
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <?php
         echo '<link href="pan.css" rel="stylesheet" type="text/css" />';
         ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
         function getp_e_no_cont(val) {
           $.ajax({
             type: "POST",
             url: "getp_e_no_cont.php",
             data: 'p_dept_cd=' + val,
             success: function(data) {
               $("#p_e_no_cont").html(data);
               $("#p_e_no_cust").html(data);
             }
           });
         }
      </script>
   </head>
   <body>
      <div class= "split left">
         <ul>
            <li><a class="active" href="#home">Home</a></li>
            <li><a href="emp.php">Create a new project</a></li>
            <li><a href="#Update">Update a new Project</a></li>
            <li><a href="#recommend">Recommend by SEPG</a></li>
            <li><a href="#approved">Approved by HOD</a></li>
            <li><a href="#logout">Logout</a></li>
         </ul>
      </div>
      <div class ="split right">
         <center>
            <img src="download.jpg"  width="700" height="300">
         </center>
         <!--heading-->
         <h2>
            <center>
               NEW PROJECT APPROVAL REQUEST
            </center>
         </h2>
         <center>
            <script src="pan.js"></script>
            <form method="post"  action="pan_update_save.php" onsubmit="return validate();">
               <br>
               <br>
               <table align="">
                  <?php while(($rows = oci_fetch_assoc($stid1)) != false)
                     { 
                     ?> 
                  <tr><b> Project Details</b></tr>
                  <tr>
                     <td>Project ID:</td>
                     <td><input type="text" id="project_id" name="project_id" value="<?php echo $rows['PROJECT_ID']; ?>"  style="background-color : lightgrey;" size="30" readonly> </td>
                  </tr>
                  <tr>
                     <td>Project Type:</td>
                     <td>
                        <input type="text"  id="p_project_type" name="p_project_type" value="  <?php echo $rows['PROJECT_TYPE']; ?>"  style="background-color : lightgrey;" readonly>
                     </td>
                  </tr>
                  <tr>
                     <td>Group:</td>
                     <td>
                        <input type="text" id="p_app_grp_id1" name="p_app_grp_id1" value="<?php echo $rows['APP_GRP_DESC']; ?>" style="background-color : lightgrey;"  size="30" readonly>
                     </td>
                  </tr>
                  <tr>
                     <td>Project Name:</td>
                     <td><input type="text"  value="<?php echo $rows['PROJ_NAME']; ?>" id="p_proj_name" name="p_proj_name" style="background-color : lightgrey;" readonly>
                        <span class="error">*</span> 
                  <tr>
                     <td>Acronym:</td>
                     <td><input type="text"  value="<?php echo $rows['PROJ_ACRONYM']; ?>" id="p_proj_acronym" name="p_proj_acronym" style="background-color : lightgrey;" readonly>
                        <span class="error">*</span> 
                     </td>
                  </tr>
               </table>
               <br><br>
               <table align="">
                  <tr><b> Department Details</b></tr>
                  <tr>
                     <td>Customer Department:</td>
                     <td><?php
                        $conn = oci_connect('hdk', 'hdk', 'devpdb1');
                        
                        $sql="select DEPT_CD,  DEPT_DESC from vhris_emp_profile_gen
                        GROUP BY DEPT_CD, DEPT_DESC ";
                        
                        $stid = oci_parse($conn, $sql);
                        oci_execute($stid);
                        
                        echo '<select onChange="getp_e_no_cont(this.value);"  name="p_dept_cd" id="p_dept_cd" class="form-control" >';
                        
                        echo " <option value='' selected='selected'>-- Select --</option>";
                        
                        while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))
                        {
                            echo "<option value='" . $row['DEPT_CD'] . "'>" . $row['DEPT_DESC'] . "</option>";
                        }
                        
                        echo " </select> ";
                        
                        ?>
                        <input type="text" id="p_dept_cd1" name="p_dept_cd1" value="<?php echo $rows['DEPT_CD']; ?>"/>
                     </td>
                  </tr>
                  <tr>
                     <td scope="row">Customer Name :</td>
                     <td>
                        <select name="p_e_no_cont" id="p_e_no_cont"  class="form-control">
                           <option value="">Select</option>
                        </select>
                        <input type="text" id="p_e_no_cont1" name="p_e_no_cont1" value="<?php echo $rows['E_NO_CONT']; ?>"/>
                     </td>
                  </tr>
               </table>
               <br><br>
               <table align="">
                  <tr><b> Customer Details</b></tr>
                  <tr>
                     <td scope="row">Contact Person :</td>
                     <td>
                        <select name="p_e_no_cust" id="p_e_no_cust" class="form-control">
                           <option value="">Select</option>
                        </select>
                        <input type="text" id="p_e_no_cust1" name="p_e_no_cust1" value="<?php echo $rows['E_NO_CUST']; ?>"/>
                     </td>
                  </tr>
                  <tr>
                     <td>Mobile Number:</td>
                     <td><input type="text" id="p_e_mobile_cont" name="p_e_mobile_cont" value="<?php echo $rows['E_MOBILE_CONT']; ?>"pattern="\d{10}" maxlength="10"/></td>
                  </tr>
                  <tr>
                     <td>Person's Email:</td>
                     <td><input type="text" id="p_e_mail_id_cont" name="p_e_mail_id_cont" value="<?php echo $rows['E_MAIL_ID_CONT']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"/>
                     </td>
                  </tr>
               </table>
               <br><br>
               <table align="">
                  <tr><b> Estimation Details</b></tr>
                  <tr>
                     <td>Team size:</td>
                     <td><input type="number" name="p_team_size" id="p_team_size" value="<?php echo $rows['TEAM_SIZE']; ?>" min="1" maxlength="2" oninput="this.value = 
                        !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null"/>
                     </td>
                  </tr>
                  <tr>
                     <td>Scheduled Month:</td>
                     <td><input type="number"   min="1" max="12" step="1" value="<?php echo $rows['SCHEDULE_MONTHS']; ?>"  name="p_schedule_months" id="p_schedule_months"  />
                     </td>
                  </tr>
                  <tr>
                     <td>Estimated Start Date:</td>
                     <td><input type="text" id="p_date_started" name="p_date_started" value="<?php echo $rows['DATE_STARTED']; ?>"placeholder = "dd-mm-yyyy" ></td>
                     </td>
                  </tr>
                  <tr>
                     <td>Estimated Target Date:</td>
                     <td><input type="text" id="p_date_target" name="p_date_target"value="<?php echo $rows['DATE_TARGET']; ?>" placeholder = "dd-mm-yyyy"></td>
                     </td>
                  </tr>
                  <tr>
                     <td>Estimated Effort:</td>
                     <td><input type="number"  min="1" max="" step="1" value="<?php echo $rows['EST_EFFORTS']; ?>"  name="p_est_efforts" id="p_est_efforts"  />
                     </td>
                  </tr>
                  <tr>
                     <td>Estimated Size:</td>
                     <td><input type="number"  min="1" max="" step="1"  value="<?php echo $rows['EST_SIZE']; ?>" name="p_est_size" id="p_est_size"  />
                     </td>
                  </tr>
                  <tr>
                     <td>Project Manager:</td>
                     <td><?php
                        $conn = oci_connect('hdk', 'hdk', 'devpdb1');
                        $sql="SELECT empno, ename  FROM VHRIS_EMP_PROFILE_GEN where dept_cd ='7900'";
                        $stid = oci_parse($conn, $sql);
                        oci_execute($stid);
                        
                        echo "<select id='p_e_no_proj_mgr' name='p_e_no_proj_mgr'  >";
                        echo " <option value='' selected='selected'>-- Select --</option>";
                        
                        while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))
                        {
                            echo "<option value='" . $row['EMPNO'] . "'>" . $row['ENAME'] . "</option>";
                        }
                        
                        echo " </select> ";
                        
                        ?> 
                        <input type="text" value="<?php echo $rows['E_NO_PROJ_MGR']; ?>" name="p_e_no_proj_mgr1" id="p_e_no_proj_mgr1"  />
                     </td>
                  </tr>
                  <tr>
                     <td>Reason:</td>
                     <td><input type="text" value="<?php echo $rows['REASONS_NOSIZE']; ?>" id="p_reasons_nosize" name="p_reasons_nosize">
                     </td>
                  </tr>
                  <tr>
                     <td>Created by:</td>
                     <td><input type="number" name="p_id_user_modified" id="p_id_user_modified" min="1" maxlength="10" oninput="this.value = 
                        !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null"   style="background-color : lightgrey;" value="109755"readonly />
                     </td>
                  </tr>
                  <?php 
                     } 
                     ?>
               </table>
               <br><br>
         </center>
         <center>
         <input type="submit" value="Save">
         <input type="button" value="Exit" onclick="history.back()">
         <br>
         <br>
         </center>
         </form>
      </div>
   </body>
</html>