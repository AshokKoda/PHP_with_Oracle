<html>
<title>HTML FORM</title>
<style>
    .error {color: #FF0000;}
    div
    {
        background-color:white;
  width: 400px;
  border: 2px solid black;
  padding: 10px;
  margin: 20px;
  margin-right:200px;
  margin-left:320px;
  margin-top:20px;
  margin-bottom:20px;
    }
    p
    {
        border:5px black;
        border-radius: 20px;
        padding: 10px;
        text-align:center;
    }
    label{
        width:400px;
        display:inline-block;
        text-align:left;
        float:left;
        clear:left;
    }
    input
    {
        display:inline-block;
        
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
              $emailErr = "";
            } else {
              $email = test_input($_POST["email"]);
            }
if (empty($_POST["gender"])) {
    $genderErr = "";
  } else {
    $gender = test_input($_POST["gender"]);
  }

if (empty($_POST["phone"])) {
    $phnnumErr = "phone numberis required";
  } else {
    $phnnum = test_input($_POST["phone"]);
  }
  if (empty($_POST["sal"])) {
    $salErr = "Salary is required";
  } else {
    $sal = test_input($_POST["sal"]);
  }
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
            EMPLOYEE MASTER
        </center>
    </h1>
    <form>
       
        <div>
            
            <center>
                <p>
<label>
                    <form method="post" action="empreg2.php">

                        <label>Employee ID:</label><input type="text" name="empid" required />
                        <span class="error">*</span>
                        <br><br>
                        <label>First Name :</label><input type="text" name="first_name" required />
                        <span class="error">* </span>
                        <br><br>

                        <label>Last Name :</label> <input type="text" name="last_name" required  />
                        <span class="error">* </span>
                        <br><br>

                        <label>Email ID :</label> <input type="email" name="email "  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  required  />
                        <span class="error">* </span>
                        <span class="error">
                            <?php echo $emailErr;?></span><br><br>

                        
                        <label for="phone">Phone number:</label><br>
                        <input type="text" id="phone" name="phone" pattern="\d{10}" maxlength="10" required/>
  
                        <span class="error">*</span>
                        <br><br>
                        <label for="start">Hire date:</label>

                        <input type="date" id="start" name="hiredate" value="" min="1997-01-01" max="2020-12-10" required ><br><br>
                        <label>Gender: </label><input type="radio" name="gender" value="female">Female
                        <input type="radio" name="gender" value="male">Male
                        <input type="radio" name="gender" value="other">Other
                        <span class="error">* <?php echo $genderErr;?></span>
                        <br><br>




<label>JobId:</label><br>
<?php

//WORKING CODE.


$conn = oci_connect('hr', 'hr', 'devpdb1');

$stid = oci_parse($conn, 'SELECT * FROM jobs ');
oci_execute($stid);

echo "<select id='empid'>";
echo " <option value='' selected='selected'>Select job id</option>";


while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<option value='" . $row['JOB_ID'] . "'>" . $row['JOB_TITLE'] ."</option>" ;
}

echo " </select> ";


?>












                        
















                        
                        <br><br>
                        <label>Salary:</label><input type="number" min="1" oninput="this.value = 
                            !!this.value && Math.abs(this.value) >= 1 ? Math.abs(this.value) : null">

                        <span class="error">*</span>

                        <br><br>
                        <label>Commission_PCT :</label><input type="number" name="com" placeholder="" maxlength="2" required />
                        <span class="error">*</span>
                        <br><br>
                        <label>ManagerID:</label><select id="managerid">
                            <option value="" selected="selected">select Manager ID </option>
                            <option value="1">200</option>
                            <option value="2">201</option>
                            <option value="3">114</option>
                            <option value="4">203</option>
                            <option value="5">121</option>
                        </select>
                        <span class="error">*</span>
                        <br><br>
                        <label>Dept ID:</label><select id="depid">
                            <option value="" selected="selected">Select Dept ID</option>
                            <option value="1">10</option>
                            <option value="2">20</option>
                            <option value="3">30</option>
                            <option value="4">40</option>
                            <option value="5">50</option>
                            <span class="error">*</span>
                        </select>
                        

                </p>
</label>


                <closeform></closeform>
    </form>
    <br><br>
    <form >
    <input type="submit" name="Save" value="submit">

    <input type="button" name="Cancel" value="Clear">
    <input type="button" value="Back" onclick="history.back()">
  
    
</form>
    </center>

    </div>

    </form>

</body>

</html>