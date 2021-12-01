<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
<body>
    <div class="login-form">
    <br></br>
    <form action="register.php" method="post" name="form1">
        <h4 class="text-center" style="color: red;">Employee Registration</h4> 
        <hr/>      
        <div class="form-group">
            <input type="text" name="employeeno" id="employeeno" class="form-control" placeholder="Enter Your Employee No">
        </div>
        <div class="form-group">
            <input type="text" name="empname" id="empname" class="form-control" placeholder="Enter Your Name">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Create New Password">
        </div>
        <div class="form-group">
            <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password">
        </div>
        <div class="form-group">
            <input type="submit" name="register" value="Create" class="btn btn-primary btn-block" />
            <a href="index.php" class="btn btn-info btn-block">Already have an account? Login</a>
        </div>
    </form>
    </div>
</body>
</html>

<!----------------------------------------PHP CODE----------------------------------->
<?php
include("connect.php");
if(isset($_POST['register'])){
    $employeeno = $_POST['employeeno'];
    $empname = $_POST['empname'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $data = $_POST;
    if ($data['password'] !== $data['cpassword'])
    {
        die('Password and Confirm password should match!');   
    }

    if(empty($data['employeeno']) || empty($data['empname']) || empty($data['password']) || empty($data['cpassword'])) {
        die('Please fill all required fields!');
    }
    else
    {
        $query = oci_parse($conn, "INSERT INTO login(employeeno, empname, password, cpassword) VALUES('$employeeno', '$empname', '$password', '$cpassword')");
        $result = oci_execute($query);
        if ($result)
        {
            echo "<div class='alert alert-success'><b>Employee was saved successfully!.</b></div>";
            exit();
        }
        else
        {
            echo "<div class='alert alert-danger'><b>Unable to save employee.</b></div>";
            exit();
        }
    }
}
?>
<!-----------------------------PHP CODE---------------------->
