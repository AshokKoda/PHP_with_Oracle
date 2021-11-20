<!DOCTYPE html>
<html>
   <head>
      <?php
         //Styling link
         echo '<link href="pan.css" rel="stylesheet" type="text/css" />';
         ?>
      <!-- To access ajax -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
         //function for dependent dropdown box
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
         <!--navigation bar-->
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
            <!--to insert image -->
            <img src="download.jpg"  width="700" height="300">
         </center>
         <!--heading-->
         <h2>
            <center>
               NEW PROJECT APPROVAL REQUEST
            </center>
         </h2>
         <center>
            <!--link to js page--> 
            <script src="pan.js"></script>
            <form method="post"  action="pan_sp.php" onsubmit="return validate();">
               <br>
               <br>
               <table align="">
                  <tr><b> Project Details</b></tr>
                  <td>Project Type:</td>
                  <td>
                     <select name="p_project_type" id="p_project_type">
                        <option value="">--select project type--</option>
                        <option value="DVP">DVP</option>
                        <option value="MNT">MNT</option>
                     </select>
                  </td>
                  <tr>
                     <td>Group:</td>
                     <td><?php
                        $conn = oci_connect('hdk', 'hdk', 'devpdb1');
                        $sql="select APP_GRP_ID, APP_GRP_DESC from tels_app_groups";
                        $stid = oci_parse($conn, $sql);
                        oci_execute($stid);
                        
                        echo "<select id='p_app_grp_id' name='p_app_grp_id'  >";
                        echo " <option value='' selected='selected'>-- Select --</option>";
                        
                        while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))
                        {
                            echo "<option value='" . $row['APP_GRP_ID'] . "'>" . $row['APP_GRP_DESC'] . "</option>";
                        }
                        
                        echo " </select> ";
                        
                        ?></td>
                  </tr>
                  <tr>
                     <td>Project Name:</td>
                     <td><input type="text"  value="" id="p_proj_name" name="p_proj_name">
                        <span class="error">*</span> 
                  <tr>
                     <td>Acronym:</td>
                     <td><input type="text"  value="" id="p_proj_acronym" name="p_proj_acronym">
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
                     </td>
                  </tr>
                  <tr>
                     <td scope="row">Customer Name :</td>
                     <td>
                        <select name="p_e_no_cont" id="p_e_no_cont" class="form-control">
                           <option value="">Select</option>
                        </select>
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
                     </td>
                  </tr>
                  <tr>
                     <td>Mobile Number:</td>
                     <td><input type="text" id="p_e_mobile_cont" name="p_e_mobile_cont" pattern="\d{10}" maxlength="10"/></td>
                  </tr>
                  <tr>
                     <td>Person's Email:</td>
                     <td><input type="text"  value="" id="p_e_mail_id_cont" name="p_e_mail_id_cont" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                     </td>
                  </tr>
               </table>
               <br><br>
               <table align="">
                  <tr><b> Estimation Details</b></tr>
                  <tr>
                     <td>Team size:</td>
                     <td><input type="number" name="p_team_size" id="p_team_size" min="1" maxlength="2" oninput="this.value = 
                        !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null"/>
                     </td>
                  </tr>
                  <tr>
                     <td>Scheduled Month:</td>
                     <td><input type="number"   min="1" max="12" step="1"   name="p_schedule_months" id="p_schedule_months"  />
                     </td>
                  </tr>
                  <tr>
                     <td>Estimated Start Date:</td>
                     <td><input type="text" id="p_date_started" name="p_date_started" placeholder = "dd-mm-yyyy" ></td>
                     </td>
                  </tr>
                  <tr>
                     <td>Estimated Target Date:</td>
                     <td><input type="text" id="p_date_target" name="p_date_target" placeholder = "dd-mm-yyyy"></td>
                     </td>
                  </tr>
                  <tr>
                     <td>Estimated Effort:</td>
                     <td><input type="number"  min="1" max="" step="1"   name="p_est_efforts" id="p_est_efforts"  />
                     </td>
                  </tr>
                  <tr>
                     <td>Estimated Size:</td>
                     <td><input type="number"  min="1" max="" step="1"   name="p_est_size" id="p_est_size"  />
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
                        
                        ?> </td>
                  </tr>
                  <tr>
                     <td>Reason:</td>
                     <td><input type="text" value="" id="p_reasons_nosize" name="p_reasons_nosize">
                     </td>
                  </tr>
                  <tr>
                     <td>Created by:</td>
                     <td>
                        <input type="number" name="p_id_user_entered" id="p_id_user_entered" style="background-color : lightgrey;" value="109755"readonly />
                        <!--  created by value is fixed -->
                     </td>
                  </tr>
               </table>
               <br><br>
         </center>
         <center>
         <!-- button for adding fields -->
         <input type="submit" value="Save">
         <!--button to exit from page  -->
         <input type="button" value="Exit" onclick="history.back()">
         <br>
         <br>
         </center>
         </form>
      </div>
   </body>
</html>