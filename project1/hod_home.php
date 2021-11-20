<!DOCTYPE html>
<html>
   <head>
      <!--styling--> 
      <style>
         div {
         background-color:white;
         width: 430px;
         border: 2px solid black;
         padding: 50px;
         margin: 20px;
         margin-right:100px;
         margin-left:410px;
         }
      </style>
      <script>
         //function for approval page
         function call_approved()
         {
           var proj_name;
           //getting elements using id
           proj_name = document.getElementById("proj_name").value;
           url = "pan_hod.php?project_id=" + proj_name ;
           if( proj_name==""){
             //for checking
             alert("PLEASE SELECT PROJECT ID");
             return false;
           } 
           window.location = url;
         
         }
         
         
      </script>
   </head>
   <body>
      <!--heading-->
      <h1>
         <center>
            APPROVAL REQUEST
         </center>
      </h1>
      <div>
         <center>
            <form name="myForm" action="pan.js" >
               <!--to call the validate form function using action and post method-->
               <!--to enter project id-->
               PROJECT ID: <?php
                  $conn = oci_connect('hdk', 'hdk', 'devpdb1');
                  $sql="select PROJECT_ID, PROJ_NAME  from iqms_pan where pan_sts IN ('REC')";
                  $stid = oci_parse($conn, $sql);
                  oci_execute($stid);
                  
                  echo "<select id='proj_name' name='proj_name'  >";
                  echo " <option value='' selected='selected'>-- Select --</option>";
                  
                  while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))
                  {
                      echo "<option value='" . $row['PROJECT_ID'] . "'>" . $row['PROJ_NAME'] . "</option>";
                  }
                  
                  echo " </select> ";
                  
                  ?>  <br><br>
               <!--button to call update function-->
               <input type="button" value="Approved by HOD" onclick="return call_approved()">
               <!--button to exit the page-->
               <input type="button" value="Exit" onclick="history.back()">
            </form>
         </center>
      </div>
   </body>
</html>