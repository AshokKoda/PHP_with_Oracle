<html>
<title>HTML FORM</title>
<style>
    .error {color: #FF0000;}
    div
    {
        background-color:white;
  width: 400px;
  border: 2px solid black;
  padding: 50px;
  margin: 20px;
  margin-right:100px;
  margin-left:330px;
  
    }
    p
    {
        border:5px black;
        border-radius: 20px;
        padding: 10px;
        text-align:center;
    }
    
</style>

<body>
    <?php
       
        $nameErr = $emailErr = $genderErr = $phnnum = $sal = "";
        $name = $email = $gender = $phnnum = $sal = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
              $nameErr = "Name is required";
            } else {
              $name = test_input($_POST["name"]);
            }
            
            if (empty($_POST["email"])) {
              $emailErr = "Email is required";
            } else {
              $email = test_input($_POST["email"]);
            }
if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
if (empty($_POST["phnnum"])) {
    $phnnumErr = "phone numberis required";
  } else {
    $phnnum = test_input($_POST["phnnum"]);
  }
  if (empty($_POST["sal"])) {
    $salErr = "Salary is required";
  } else {
    $sal = test_input($_POST["sal"]);
  }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>


    <h1>
        <center>
            REGISTRATION FORM
        </center>
    </h1>
    <form>
        <div>
            <center>
                <p>
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                Employee ID:<input type="text" name="empid"/>
                <span class="error">*required field</span>
                <br><br>
                        First Name :<input type="text" name="first_name" />
                        <span class="error">* required field</span>
                        <br><br>
                            
                        Last Name : <input type="text" name="last_name" />
                        <span class="error">* required field</span>
                        <br><br>

                        Email ID : <input type="text" name="email " />
                        <span class="error">* required field</span>
                        <span class="error"> <?php echo $emailErr;?></span><br><br>

                        Phone num: <input type="Phonenumber" name="phnnum" />
                        <span class="error">* required field</span>
                        <br><br>
                        Hire Date :<input type="date"><br><br>
                        Gender:  <input type="radio" name="gender" value="female">Female
                        <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
                       
                Jobid:<select id="empid">
                <option value="" selected="selected">Select job id</option>
  <option value="1">AD_PRES</option>
  <option value="2">AD_VP</option>
  <option value="3">AD_ASST</option>
  <option value="4">FI_MGR</option>
  <option value="5">FI_ACCOUNT</option>
</select>
<br><br>
Salary:<input type="text" name="sal"/>
                        <span class="error">*required field</span>

                <br><br>
                Commission_PCT :<input type="text" name="com"/>
                <br><br>
                ManagerID:<select id="managerid">
                <option value="" selected="selected">select Manager ID </option>
  <option value="1">200</option>
  <option value="2">201</option>
  <option value="3">114</option>
  <option value="4">203</option>
  <option value="5">121</option>
</select>
                <br><br>
                Dept ID:<select id="depid">
                <option value="" selected="selected">Select Dept ID</option>
  <option value="1">10</option>
  <option value="2">20</option>
  <option value="3">30</option>
  <option value="4">40</option>
  <option value="5">50</option>
</select>

</p>
                 


                    <closeform></closeform>
                </form>
                <br><br>

                <input type="submit" name="Save" value="submit">
                
                <input type="button" name="Cancel" value="OK">
            </center>
        </div>
    </form>
    
</body>
</html>