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
<!--scripting starts here-->
<script>
//validation of form
function validateForm() {
  var x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("ID must be given");
    return false;
  }
}
//calling  add php page
function call_add() {
window.location = "emp_add.php";
}
//calling  list php page
function call_list()
{
  window.location = "emp_list.php";
}
//calling display php page
function call_display()
{
  var employee_id;
  //getting elements using id
  employee_id = document.getElementById("employee_id").value;
  url = "emp_display.php?employee_id=" + employee_id ;
  if( employee_id==""){
    //for checking
    alert("PLEASE ENTER EMPLOYEE ID");
    return false;
  } 
  window.location = url;

}
//calling update php page
function call_update()
{
  var employee_id;
  employee_id = document.getElementById("employee_id").value;
  url = "emp_update.php?employee_id=" + employee_id ;
  if( employee_id==""){
    alert("PLEASE ENTER EMPLOYEE ID");
    return false;
  } 
  window.location = url;


}
//caliing delete php page
function call_delete()
{
  var employee_id;
  employee_id = document.getElementById("employee_id").value;
  url = "emp_delete.php?employee_id=" + employee_id ;
  if( employee_id==""){
    alert("PLEASE ENTER EMPLOYEE ID");
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
            EMPLOYEE DETAILS
        </center>
    </h1>
    <div>
    <center>
        

<form name="myForm" action="emp_add.php" onsubmit="return validateForm()" method="post"><!--to call the validate form function using action and post method-->
<!--to enter employee id-->
  Employee ID: <input type="text" id="employee_id" name="employee_id" maxlength="10"> <br><br>
  <!--button to call add function-->
  <input type="button" value="Add" onclick="return call_add()">
  <!--button to call update function-->
  <input type="button" value="Update" onclick="return call_update()">
  <!--button to call display function-->
   <input type="button" name="Display" value="Display" onclick="return call_display()">
   <!--button to call delete function-->
  <input type="button" name="Delete" value="Delete" onclick="return call_delete()">
  <!--button to call list function-->
  <input type= "button" name="List" value="list" onclick="return call_list()">
  <!--button to exit the page-->
  <input type="button" value="Exit" onclick="history.back()">
  <!--button to reset the values  -->
  <input type="reset" value="Clear"> 
</form>

</center>

</div>

</body>
</html>