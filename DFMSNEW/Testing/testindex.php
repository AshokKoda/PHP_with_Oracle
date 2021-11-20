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

    <!-- <script src="table2excel.js" type="text/javascript"></script> -->
    <!-- <script type="text/javascript">
        function Export() {
            $("#tblCustomers").table2excel({
                filename: "Table.xls"
            });
        }
    </script> -->

    <style>
        .login-form {
            width: 340px;
            margin: 40px auto;
  	        font-size: 13px;
        }
      
        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 20px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control, .btn {
            min-height: 30px;
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
        <a class="btn btn-primary" href="index.php">SEARCH</a>
        <a class="btn btn-primary" href="addFile.php">DFMS FILE</a>
        <a class="btn btn-primary" href="addcol.php">DFMS COLUMNS</a>
        <a class="btn btn-primary" href="noofcol.php">ADD COLUMNS</a>
    </div>
</div>
    <div class="login-form">
        <form action="index.php" method="post">
            <h3 class="text-center" style="color: #000;">Data File Management System</h3>
            <br/>
            <div class="form-group">
                <label>Select File Name: </label>
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
            <div class="form-group" id="records">
                <label>File Description: </label>
                <div class="form-control" id="df_desc"></div><br>

                <label>Total Columns: </label>
                <div class="form-control" id="df_col"></div>
            </div>
            <div class="form-group">
                <a class="btn btn-primary btn-block" href="excel.php">Download</a>

                <!-- <input type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal" value="Get Data" /> -->
            </div>
        </form>

        <div class="container">
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" style="float:left">Data File Management System</h3>
                            <a class="btn btn-success" href="excel.php" style="float:right">Download</a>
                            <!-- <input type="button" class="btn btn-success" id="btnExport" style="float:right" value="Download" onclick="Export()" /> -->
                        </div>
                        <div class="modal-body">
                            <h3 style="text-align:center"><b>DFMS EXCEL FORMAT</b></h3><br>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="tblCustomers">
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
                                        //fetch data
                                        $sql="select df_id,df_name,col_no,null df_col_name, null df_col_desc from (select df_id,df_name from dfms_df_mast where df_id= 1)a,
                                                (select col_no from dfms_col_cnt where col_no <=(select df_col from dfms_df_mast where df_id= 1))b order by col_no "; 

                                        $stid = oci_parse($conn, $sql);
                                        $result = oci_execute($stid, OCI_DEFAULT);

                                        while($row = oci_fetch_array($stid, $result)){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['DF_ID'] ?></td>
                                            <td><?php echo $row['DF_NAME'] ?></td>
                                            <!-- <td><?php echo $row['DF_COL_NAME'] ?></td> -->
                                            <!-- <td><?php echo $row['DF_COL_DESC'] ?></td> -->
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<html>

<script type="text/javascript">
$(document).ready(function(){  
	// code to get all records from table via select box
	$("#file").change(function() {    
		var df_id = $(this).find(":selected").val();
		var dataString = 'id='+ df_id;    
		$.ajax({
			url: 'getFile.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(fileData) {
			   if(fileData) {
					$("#heading").show();		  
					$("#no_records").hide();					
					$("#df_name").text(fileData.DF_NAME);
					$("#df_desc").text(fileData.DF_DESC);
					$("#df_col").text(fileData.DF_COL);
					$("#records").show();		 
				} else {
					$("#heading").hide();
					$("#records").hide();
					$("#no_records").show();
				}   	
			} 
		});
 	}) 
});

</script>