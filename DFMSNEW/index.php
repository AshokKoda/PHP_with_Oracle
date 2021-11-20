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

    <script type="text/javascript">
        function call_display()
        {
            var df_id;
            //getting elements using id
            df_id = document.getElementById("file").value;
            url = "display.php?file=" + df_id ;
            if( df_id==""){
            //for checking
            alert("Please Choose File ID");
            return false;
            } 
        window.location = url;
        }
    </script>

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
        <form action="index.php" method="post" onsubmit="return validateForm()">
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
                <!-- <a class="btn btn-primary btn-block" href="excel.php">Download</a> -->
                <input type="button" class="btn btn-primary btn-block" value="Get Data" onclick="return call_display()" />
            </div>
        </form>
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