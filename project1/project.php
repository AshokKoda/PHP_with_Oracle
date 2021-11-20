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

function call_display()
{
  var proj_name;
  //getting elements using id
  proj_name = document.getElementById("proj_name").value;
  url = "pan_display.php?project_id=" + proj_name ;
  if( proj_name==""){
    //for checking
    alert("PLEASE SELECT PROJECT NAME");
    return false;
  } 
  window.location = url;

}
//calling update php page
function call_update()
{
  var proj_name;
  proj_name = document.getElementById("proj_name").value;
  url = "pan_update.php?project_id=" + proj_name ;
  if( proj_name==""){
    alert("PLEASE SELECT PROJECT NAME");
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
            PROJECT DETAILS
        </center>
    </h1>
    <div>
    <center>
        

<form name="myForm" action="pan.js" ><!--to call the validate form function using action and post method-->
<!--to enter employee id-->
  PROJECT NAME: <?php
$conn = oci_connect('hdk', 'hdk', 'devpdb1');
$sql="SELECT PROJECT_ID, PROJ_NAME FROM IQMS_PAN";
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
  <input type="button" value="Update" onclick="return call_update()">
  <!--button to call display function-->
   <input type="button" name="Display" value="Display" onclick="return call_display()">

  
  <!--button to exit the page-->
  <input type="button" value="Exit" onclick="history.back()">
  <!--button to reset the values  -->
  <input type="reset" value="Clear"> 
</form>

</center>

</div>

</body>
</html>