<?php
    $conn=oci_connect("DFMSNEW","12345","localhost:1521/XE");
    $query = "SELECT df_id, df_name, df_desc, df_col FROM dfms_df_mast";
    $stid = oci_parse($conn, $query);
    $result = oci_execute($stid, OCI_DEFAULT);
?>

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
        <a class="btn btn-success" href="index.php">SEARCH</a>
        <a class="btn btn-success" href="addFile.php">DFMS FILE</a>
        <a class="btn btn-success" href="addcol.php">DFMS COLUMNS</a>
        <a class="btn btn-success" href="noofcol.php">ADD COLUMNS</a>
    </div>
</div>
    <div class="login-form">
        <form action="addcol.php" method="post">
            <h3 class="text-center" style="color: #000;">DFMS - DFMS DF COL</h3>
            <br/>
            <div class="form-group">
                <!-- Dropdown-->
                <select class="form-control" id="file">
                    <option value='' selected='selected'>-- Select file --</option>
                    <?php
                        while($row = oci_fetch_array($stid, $result)){
                    ?>
                    <option value="<?php echo $row['DF_ID']; ?> " > <?php echo $row['DF_NAME']; ?> </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="df_col_name" class="form-control" placeholder="Column Name" />
            </div>
            <div class="form-group">
                <input type="text" name="df_col_desc" class="form-control" placeholder="Column Description"/>
            </div>
            <div class="form-group">
                <input type="submit" name="save" value="Save" class="btn btn-success btn-block" />
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
            $df_id = $_POST['df_id'];
            $df_col_name = $_POST['df_col_name'];
            $df_col_desc = $_POST['df_col_desc'];

            $query = oci_parse($conn, "INSERT INTO dfms_df_col(df_col_name, df_col_desc, df_id) 
            values ('$df_col_name', '$df_col_desc','$df_id')");

            $result = oci_execute($query);

            if ($result) {
                echo "<div class='alert alert-success'><b>Record was saved successfully!.</b></div>";
                exit();
            }
            else
            {
                echo "<div class='alert alert-danger'><b>Unable to save record.</b></div>";
                exit();
            }
        }
        ?>
        <!-- PHP Code END -->
    </div>
</body>
<html>