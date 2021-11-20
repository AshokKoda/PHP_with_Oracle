<!DOCTYPE html>
<html>
   <head>
      <!--styling--> 
      <style>
         div {
         background-color:white;
         width: 300px;
         border: 2px solid black;
         padding: 50px;
         margin: 20px;
         margin-right:100px;
         margin-left:460px;
         }
      </style>
   </head>
   <body>
      <!--heading-->
      <h1>
         <center>
            Data Download To Excel
         </center>
      </h1>
      <div>
         <center>
            <form name="myForm" action="download.php" onsubmit="" method="post">
            <!--to call the validate form function using action and post method-->
            <!--to enter employee id-->
            Table name:
<?php
$conn = oci_connect('hr', 'hr', 'devpdb1');
$sql = "select table_name from user_tables where tablespace_name ='EXAMPLE'";

$stid = oci_parse($conn, $sql);
oci_execute($stid);

echo "<select id = 'Table_name' name ='Table_name'  >";
echo " <option value='' selected='selected'>Select </option>";

while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))
{
    echo "<option value='" . $row['TABLE_NAME'] . "'>" . $row['TABLE_NAME'] . "</option>";
}

echo " </select> ";

?>

<br><br>
            <!--button to call add function-->
            <input type="submit" value="Download" onclick="download.php">
            </form>
         </center>
      </div>
   </body>
</html>