<?php session_start(); ?>
<!---------------------------------PHP CODE---------------------------------->
<?php
if(isset($_SESSION['valid']))
{
    include("connect.php");	
    $query = "SELECT * FROM login";
    $stid = oci_parse($conn, $query);
    $result = oci_execute($stid, OCI_DEFAULT);
}
?>
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
 $query = "SELECT * FROM erpdata WHERE login_id=".$_SESSION['empid']." ORDER BY erpid DESC";
 $stid = oci_parse($conn, $query);
 $result = oci_execute($stid, OCI_DEFAULT);
 ?>
 <!---------------------------------PHP CODE---------------------------------->

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RINL - Details</title>
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
            <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add</button>
                <a class="btn btn-danger" href="logout.php" style="float: right;">Logout</a>
                <a class="btn btn-warning" href="changepassword.php" style="float: right;">Change Password</a>
            </div>
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add New Details</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="add.php" method="post" name="form1">
                                <div class="form-group">
                                    <input type="date" name="erpdate" id="erpdate" class="form-control" placeholder="Enter Date">
                                </div>
                                <div class="form-group">
                                    <select name="erpshift" class="form-control">
                                        <option value='' selected='selected'>-- Select Shift --</option>
                                        <option value='A'>A-Shift</option>
                                        <option value='B'>B-Shift</option>
                                        <option value='C'>C-Shift</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="erpdis" id="erpdis" class="form-control" placeholder="Enter Description">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="add" value="Submit" class="btn btn-primary btn-block" />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!----------------------------List View------------------------------------------>
            <br></br>
            <table class="table">
                <thread>
                    <tr>
                        <th>Date</th>
                        <th>Shift</th>
                        <th>Display</th>
                        <!-- <th>Employee Name</th> -->
                        <th>Options</th>
                    </tr>
                    <?php
                    while($res = oci_fetch_array($stid, $result)){
                    ?>
                    <tr>
                        <td><?php echo $res['ERPDATE'] ?></td>
                        <td><?php echo $res['ERPSHIFT'] ?></td>
                        <td><?php echo $res['ERPDIS'] ?></td>
                        <!-- <td><?php echo $res['LOGIN_ID'] ?></td> -->
                        <td>
                            <a class="btn btn-success" href="edit.php?erpid=<?php echo $res['ERPID']; ?>">Edit</a>&nbsp;
                            <a class="btn btn-danger" href="delete.php?erpid=<?php echo $res['ERPID']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </thread>
            </table>
        </div>
    </body>
</html>