<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DFMS - NEW</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        .login-form {
            width: 340px;
            margin: 50px auto;
  	        font-size: 13px;
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
<head>
<body>
<div class="text-center" style="margin-top:30px;">
    <div class="w3-bar">
        <a class="btn btn-danger" href="index.php">SEARCH</a>
        <a class="btn btn-danger" href="addFile.php">DFMS FILE</a>
        <a class="btn btn-danger" href="addcol.php">DFMS COLUMNS</a>
        <a class="btn btn-danger" href="noofcol.php">ADD COLUMNS</a>
    </div>
</div>
    <div class="login-form">
        <form action="noofcol.php" method="post">
            <h4 class="text-center" style="color: #000;">DFMS - DFMS COLUMN COUNT</h4>
            <br/>
            <div class="form-group">
                <input type="number" name="col_no" class="form-control" placeholder="Enter Noof Columns" required="required">
            </div>
            <div class="form-group">
                <input type="submit" name="save" value="Save" class="btn btn-danger btn-block" />
            </div>
        </form>

        <!-- PHP Code START -->
        <?php
        $conn=oci_connect("DFMSNEW","12345","localhost:1521/XE");
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }
        if(isset($_POST['save']))
        {
            $col_no = $_POST['col_no'];

            $query = oci_parse($conn, "INSERT INTO dfms_col_cnt(col_no) 
            values ('$col_no')");

            $result = oci_execute($query);

            if ($result) {
                echo "<div class='alert alert-success'><b>Columns was saved successfully!.</b></div>";
                exit();
            }
            else
            {
                echo "<div class='alert alert-success'><b>Unable to save Columns.</b></div>";
                exit();
            }
        }
        ?>
        <!-- PHP Code END -->
    </div>
</body>
<html>