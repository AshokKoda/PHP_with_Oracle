<?php session_start(); ?>
<!---------------------------------PHP CODE---------------------------------->
<?php
 if(!isset($_SESSION['empname']))
 {
     header("location:index.php");
 }
 ?>
 <!---------------------------------PHP CODE---------------------------------->

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
<div class="container">
<br/>
    <h5>Employee Name : <b style="color: red"><?php echo $_SESSION['empname'] ?></b></h5>
<br/>
</div>
<div class="container">
    <a class="btn btn-danger" href="logout.php" style="float: right;">Logout</a>
</div>

    <div class="login-form">
    <br></br>
    <form action="changepassword.php" method="post" name="form1">
        <h4 class="text-center" style="color: red;">Change Password</h4> 
        <hr/>      
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Current Password">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Create new password">
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Confirm Password">
        </div>
        <div class="form-group">
            <input type="submit" name="change" value="Change Password" class="btn btn-primary btn-block" />
            <input type="button" class="btn btn-danger btn-block" value="Back" onclick="history.back()">
        </div>
    </form>
    </div>
</body>
</html>

<!----------------------------------------PHP CODE----------------------------------->

<!-----------------------------PHP CODE---------------------->
