<html>
<title>HTML FORM</title>
<style>
    .error {color: #FF0000;}
    div
    {
        background-color: white;
        width: 550px;
        border: 15px black;
        padding: 40px;
        margin: 20px;
        margin-left: 220px;
        margin-right: 350px;
    }
    p
    {
        border:5px black;
        border-radius: 20px;
        padding: 10px;
    }
    
</style>

<body>
    <?php
       
        $nameErr = $emailErr = $genderErr = "";
        $name = $email = $gender =  "";

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
                        First Name :<input type="text" name="first_name" />
                        <span class="error">* required field</span>
                        <br><br>
                            
                        Last Name : <input type="text" name="last_name" />
                        <span class="error">* required field</span>
                        <br><br>

                        Email ID : <input type="text" name="email " />
                        <span class="error">* required field</span>
                        <span class="error"> <?php echo $emailErr;?></span><br><br>

                        password : <input type="password" name="password" />
                        <span class="error">* required field</span>
                        <br><br>
                        Gender:  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
                        select date of birth :<input type="date">
                </p><br>
                <script>
                    var stateObject = {
                        "India": {
                            "Delhi": ["new Delhi", "North Delhi"],
                            "Kerala": ["Thiruvananthapuram", "Palakkad"],
                            "Goa": ["North Goa", "South Goa"],
                            "Andhra Pradesh": ["Vizag", "vijayawada", "Rajamundary"],
                            "Telangana": ["Hydrabad", "Karimnagar", "Chittor", "Rangareddy"],
                        },
                        "Australia": {
                            "South Australia": ["Dunstan", "Mitchell"],
                            "Victoria": ["Altona", "Euroa"]
                        }, "Canada": {
                            "Alberta": ["Acadia", "Bighorn"],
                            "Columbia": ["Washington", ""]
                        },
                    }
                    window.onload = function () {
                        var countySel = document.getElementById("countySel"),
                            stateSel = document.getElementById("stateSel"),
                            districtSel = document.getElementById("districtSel");
                        for (var country in stateObject) {
                            countySel.options[countySel.options.length] = new Option(country, country);
                        }
                        countySel.onchange = function () {
                            stateSel.length = 1; // remove all options bar first
                            districtSel.length = 1; // remove all options bar first
                            if (this.selectedIndex < 1) return; // done 
                            for (var state in stateObject[this.value]) {
                                stateSel.options[stateSel.options.length] = new Option(state, state);
                            }
                        }
                        countySel.onchange(); // reset in case page is reloaded
                        stateSel.onchange = function () {
                            districtSel.length = 1; // remove all options bar first
                            if (this.selectedIndex < 1) return; // done 
                            var district = stateObject[countySel.value][this.value];
                            for (var i = 0; i < district.length; i++) {
                                districtSel.options[districtSel.options.length] = new Option(district[i], district[i]);
                            }
                        }
                    }

                </script>
                <form name="myform" id="myForm">
                    Select Country: <select name="state" id="countySel" size="1">
                        <option value="" selected="selected">Select Country</option>
                    </select>
                    <br>
                    <br>
                    Select State: <select name="countrya" id="stateSel" size="1">
                        <option value="" selected="selected"> Select State</option>
                    </select>
                    <br>
                    <br>
                    Select District: <select name="district" id="districtSel" size="1">
                        <option value="" selected="selected">Select District</option>
                    </select><br>

                    <closeform></closeform>
                </form>
                <br><br>

                <input type="submit" name="submit" value="submit">
                <input type="reset" name="reset" value="reset">
                <input type="button" name="ok" value="OK">
            </center>
        </div>
    </form>
    
</body>

</html>