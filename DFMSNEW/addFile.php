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
        <a class="btn btn-warning" href="index.php">SEARCH</a>
        <a class="btn btn-warning" href="addFile.php">DFMS FILE</a>
        <a class="btn btn-warning" href="addcol.php">DFMS COLUMNS</a>
        <a class="btn btn-warning" href="noofcol.php">ADD COLUMNS</a>
    </div>
</div>
    <div class="login-form">
        <form action="addFile.php" method="post">
            <h4 class="text-center" style="color: #000;">DFMS - DFMS DF MAST</h4>
            <br/>
            <div class="form-group">
                <input type="text" name="df_name" class="form-control" placeholder="File Name" required="required">
            </div>
            <div class="form-group">
                <input type="text" name="df_desc" class="form-control" placeholder="File Description" required="required">
            </div>
            <div class="form-group">
                <?php
                    $conn=oci_connect("DFMSNEW","12345","localhost:1521/XE");
                    $query = "select distinct * from dfms_col_cnt order by col_no asc";
                    $stid = oci_parse($conn, $query);
                    $result = oci_execute($stid, OCI_DEFAULT);

                    echo '<select class="form-control" name="df_col">';
                    echo " <option value='' selected='selected'>Select no.of columns</option>";
                    while($row = oci_fetch_array($stid, $result))
                    {
                        echo '<option value="'.$row['COL_NO'].'">'.$row['COL_NO'].'</option>'; 
                    }
                    echo '</select>';
                ?>
            </div>
            <div class="form-group">
                <input type="submit" name="save" value="Save" class="btn btn-warning btn-block" />
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
            $df_name = $_POST['df_name'];
            $df_desc = $_POST['df_desc'];
            $df_col = $_POST['df_col'];

            $query = oci_parse($conn, "INSERT INTO dfms_df_mast(df_name,df_desc, df_col) 
            values ('$df_name','$df_desc', '$df_col')");

            $result = oci_execute($query);

            if ($result) {
                echo "<div class='alert alert-success'><b>Record was saved successfully!.</b></div>";
                exit();
            }
            else
            {
                echo "<div class='alert alert-success'><b>Unable to save record.</b></div>";
                exit();
            }
        }
        ?>
        <!-- PHP Code END -->
    </div>
</body>
<html>
