<?php
$conn=oci_connect("DFMSNEW","12345","localhost:1521/XE");
$df_id=$_REQUEST['file'];
$sql="select df_id,df_name,col_no,null df_col_name, null df_col_desc from (select df_id,df_name from dfms_df_mast where df_id= '" . $df_id  ."')a,
(select col_no from dfms_col_cnt where col_no <=(select df_col from dfms_df_mast where df_id= '" . $df_id  ."'))b order by col_no "; 
                        
$stid = oci_parse($conn, $sql);
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

    <script src="table2excel.js" type="text/javascript"></script>
    <script type="text/javascript">
        function Export()
        {
            $("#df_id").table2excel({
                filename: "Table.xls"
            });
        }
    </script>
<head>
<body>
    <div class="container">
        <div class="table-responsive">
        <table class="table table-hover table-bordered" id="df_id">
            <h3 style="text-align:center"><b>DFMS EXCEL FORMAT</b></h3><br>
                <thead class="thead-dark">
                    <tr>
                        <th>File ID</th>
                        <th>File Name</th>
                        <th>Col Name</th>
                        <th>Col Decsription</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row = oci_fetch_array($stid, $result)){
                    ?>
                    <tr>
                        <td><?php echo $row['DF_ID'] ?></td>
                        <td><?php echo $row['DF_NAME'] ?></td>
                        <!-- <td><?php echo $row['DF_COL_NAME'] ?> -->
                        <!-- <td><?php echo $row['DF_COL_DESC'] ?></td> -->
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
        </table>
        <br>
        <div class="text-center">
            <input type="button" class="btn btn-danger" value="Back" onclick="history.back()">
            &nbsp;&nbsp;&nbsp;
            <input type="button" id="btnExport" class="btn btn-success" value="Export" onclick="Export()">
        </div>
        </div>
    </div>
</body>
<html>