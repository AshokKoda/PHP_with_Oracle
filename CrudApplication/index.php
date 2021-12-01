<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
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
<?php
include("connect.php");
if(isset($_POST['login']))
{
    $employeeno = $_POST['employeeno'];
    $password = $_POST['password'];

    $data = $_POST;
    if(empty($data['employeeno']) || empty($data['password'])) {
        die('Either Employee No or password field is empty.');
    }
    else
    {
        $query = oci_parse($conn, "SELECT * FROM login WHERE employeeno='$employeeno' AND password='$password'");
        $result = oci_execute($query);
        $row = oci_fetch_assoc($query);

        if(is_array($row) && !empty($row))
        {
            $validuser = $row['EMPLOYEENO'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['empname'] = $row['EMPNAME'];
            $_SESSION['empid'] = $row['EMPID'];
        }
        else
        {
            echo "<div class='alert alert-danger'><b>Invalid employee no or password.</b></div>";
            exit();
        }

        if(isset($_SESSION['valid']))
        {
            header('Location: main.php');	
        }
    }
} else {
?>
    <div class="login-form">
    <br></br>
    <form action="index.php" method="post" name="form1">
        <h4 class="text-center" style="color: red;">Employee Login</h4> 
        <hr/>      
        <div class="form-group">
            <input type="text" name="employeeno" id="employeeno" class="form-control" placeholder="Enter Your Employee No">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Create New Password">
        </div>
        <div class="form-group">
            <input type="submit" name="login" value="Login" class="btn btn-primary btn-block" />
            <a href="register.php" class="btn btn-primary btn-block">New Employee Registration</a>
        </div>
    </form>
    </div>
<?php
}
?>
</body>
</html>