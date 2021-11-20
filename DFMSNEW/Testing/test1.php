<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DFMS - NEW</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
    <div class="login-form">
        <form action="test1.php" method="post">
            <h4 class="text-center" style="color: #000;">DFMS - TEST</h4>
            <br/>
            <div class="form-group">
                <label>Select File Name: </label>
                <?php
                    $conn=oci_connect("DFMSNEW","12345","localhost:1521/XE");
                    $query = "SELECT df_id, df_name, df_desc, df_col FROM dfms_df_mast";
                    $stid = oci_parse($conn, $query);
                    $result = oci_execute($stid, OCI_DEFAULT);
                ?>
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
        </form>
    </div>
    
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <h4 style="text-align:center"><b>DFMS EXCEL FORMAT</b></h4>
                <thead>
                    <tr id="heading">
                        <th style="text-align:center">File-ID</th>
                        <th style="text-align:center">File Name</th>
                        <th style="text-align:center">Col-Name</th>
                        <th style="text-align:center">Col-Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="records">
                        <td style="text-align:center" id="df_id"></td>
                        <td style="text-align:center" id="df_name"></td>
                        <td style="text-align:center" id="df_col_name"></td>
                        <td style="text-align:center" id="df_col_desc"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <div class="row" id="no_records"><div class="col-sm-4">Plese select file name to view details</div></div>
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
			url: 'getTest.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(fileData) {
			   if(fileData) {
					$("#heading").show();		  
					$("#no_records").hide();					
					$("#df_id").text(fileData.DF_ID);
					$("#df_name").text(fileData.DF_NAME);
					$("#df_col_name").text(fileData.DF_COL_NAME);
                    $("#df_col_desc").text(fileData.DF_COL_DESC);
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
