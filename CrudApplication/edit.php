<?php session_start(); ?>
<!---------------------------------PHP CODE---------------------------------->
<?php
 if(!isset($_SESSION['empname']))
 {
     header("location:index.php");
 }
 ?>
 <!---------------------------------PHP CODE---------------------------------->
 <?php
 include_once("connect.php");
 if(isset($_POST['update']))
 {
    $erpid = $_POST['erpid'];
    $erpdate = $_POST['erpdate'];
    $erpshift = $_POST['erpshift'];
    $erpdis = $_POST['erpdis'];

    $data = $_POST;
    if(empty($data['erpdate']) || empty($data['erpshift']) || empty($data['erpdis'])) {
        die('Please fill all required fields!');
    }
    else
    {
        $query = oci_parse($conn, "UPDATE erpdata SET erpdate='$erpdate', erpshift='$erpshift', erpdis='$erpdis' WHERE erpid=$erpid");
        $result = oci_execute($query);
        if ($result)
        {
            echo "<div class='alert alert-success'><b>Data was updated successfully!.</b></div>";
            header("Location: main.php");
            exit();
        }
        else
        {
            echo "<div class='alert alert-danger'><b>Unable to update data.</b></div>";
            exit();
        }
    }
 }
 ?>
 <!---------------------------------PHP CODE---------------------------------->
 <?php
 $erpid = $_GET['erpid'];
 $sql = "SELECT * FROM erpdata WHERE erpid=$erpid";
 $stid = oci_parse($conn, $sql);
 $result = oci_execute($stid, OCI_DEFAULT);

 while($res = oci_fetch_array($stid, $result))
 {
    $erpdate = $res['ERPDATE'];
    $erpshift = $res['ERPSHIFT'];
    $erpdis = $res['ERPDIS'];
 }
 ?>
 <!---------------------------------PHP CODE---------------------------------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit</title>
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
    <form action="edit.php" method="post" name="form1">
        <h4 class="text-center" style="color: red;">Update Details</h4> 
        <hr/>      
        <div class="form-group">
            <input type="date" name="erpdate" class="form-control" value="<?php echo $erpdate; ?>">
        </div>
        <div class="form-group">
            <select name="erpshift" class="form-control">
                <option value='0' selected='selected'>-- Select Shift --</option>
                <option value='A' <?php echo $erpshift == 'A' ? 'selected' : ''; ?> >A-Shift</option>
                <option value='B' <?php echo $erpshift == 'B' ? 'selected' : ''; ?> >B-Shift</option>
                <option value='C' <?php echo $erpshift == 'C' ? 'selected' : ''; ?> >C-Shift</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="erpdis" class="form-control" value="<?php echo $erpdis;?>">
        </div>
        <div class="form-group">
            <input type="hidden" name="erpid" value=<?php echo $_GET['erpid'];?>>
            <input type="submit" name="update" value="Update" class="btn btn-primary btn-block" />
            <input type="button" class="btn btn-danger btn-block" value="Back" onclick="history.back()">
        </div>
    </form>
    </div>
</body>
</html>

<!----------------------------------------PHP CODE----------------------------------->

<!-----------------------------PHP CODE---------------------->
