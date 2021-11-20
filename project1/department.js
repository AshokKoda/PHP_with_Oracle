//calling  list php page





function validate1() { 



  
  if ((document.getElementById("department_name").value == null) || (document.getElementById("department_name").value == ""))
      {
          alert("Please enter department_name");
          document.getElementById("department_name").focus();
          return false;
      }

     

      
      if ((document.getElementById("managerid").value == null) || (document.getElementById("managerid").value == ""))
      {
          alert("Please select manager id");
          document.getElementById("managerid").focus();
          return false;
      }
      if ((document.getElementById("location_id").value == null) || (document.getElementById("location_id").value == ""))
      {
          alert("Please select location_id");
          document.getElementById("location_id").focus();
          return false;
      }
     


  return true; 
} 


//calling dept save page
function call_save()
{
window.location = "dept_update_save.php";
}



function call_menu()
{
    window.location = "dept.html";

}

function validate() { 
  if ((document.getElementById("dept_id").value == null) || (document.getElementById("dept_id").value == ""))
      {
          alert("Please enter department id");
          document.getElementById("dept_id").focus();
          return false;
      }

     
  if ((document.getElementById("department_name").value == null) || (document.getElementById("department_name").value == ""))
      {
          alert("Please enter department_name");
          document.getElementById("department_name").focus();
          return false;
      }

     

      
      if ((document.getElementById("managerid").value == null) || (document.getElementById("managerid").value == ""))
      {
          alert("Please select manager id");
          document.getElementById("managerid").focus();
          return false;
      }
      if ((document.getElementById("location_id").value == null) || (document.getElementById("location_id").value == ""))
      {
          alert("Please select location_id");
          document.getElementById("location_id").focus();
          return false;
      }
     


  return true; 
} 


function call_save1()
{
window.location = "dept_save.php";
}
