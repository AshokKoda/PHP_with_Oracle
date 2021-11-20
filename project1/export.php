<?php   
 $connect = oci_connect('hr', "hr","devpdb1");  
 $query = "SELECT * FROM departments";
 $stid = oci_parse($connect, $query);
 oci_execute($stid);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Export HTML table to Excel File using Jquery with PHP</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:700px;">  
                <h3 class="text-center">Export HTML table to Excel File using Jquery with PHP</h3><br />  
                <div class="department_table" id="department_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="10%">department_id</th>  
                               <th width="30%">department_name</th>  
                               <th width="10%">manager_id</th>  
                               <th width="50%">location_id</th>  
                          </tr>  
                          <?php   
                          while($row = oci_fetch_array($stid))  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $row['DEPARTMENT_ID']; ?></td>  
                               <td><?php echo $row['DEPARTMENT_NAME']; ?></td>  
                               <td><?php echo $row['MANAGER_ID']; ?></td>  
                               <td><?php echo $row['LOCATION_ID']; ?></td>  
                          </tr>  
                          <?php                           
                          }  
                          ?>  
                     </table>  
                </div>  
                <div align="center">  
                     <button name="create_excel" id="create_excel" class="btn btn-success">Create Excel File</button>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#create_excel').click(function(){  
           var excel_data = $('#department_table').html(); 
           var page = "index.php?data=" + excel_data; 
           window.location = page;  
      });  
 });  
 </script>  


 