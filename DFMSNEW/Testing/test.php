<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>DFMS - NEW</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<head>
<body>
  <div class="container">
    <h2>Get details with ID</h2>
    <div class="page-header">
      <h3>
        <select id="file">
          <option value="" selected="selected">Select File Name</option>
		      <?php
            $conn=oci_connect("DFMSNEW","12345","localhost:1521/XE");
		        $sql = "SELECT df_id, df_name, df_desc, df_col FROM dfms_df_mast";
            $stid = oci_parse($conn, $sql);
		        $result = oci_execute($stid, OCI_DEFAULT);
		        while( $rows = oci_fetch_array($stid, $result) ) { 
		      ?>
		        <option value="<?php echo $rows["DF_ID"]; ?>"><?php echo $rows["DF_NAME"]; ?></option>
		        <?php }	?>
		    </select>
      </h3>	
    </div>
    <div id="display">
      <div class="row" id="heading" style="display:none;">
        <h3>
          <div class="col-sm-4">
            <strong>File Name</strong>
          </div>
          <div class="col-sm-4">
            <strong>File Description</strong>
          </div>
          <div class="col-sm-4">
            <strong>Noof Columns</strong>
          </div>
        </h3>
      </div>
      <br>

      <div class="row" id="records">
          <div class="col-sm-4" id="df_name"></div>
          <div class="col-sm-4" id="df_desc"></div>
          <div class="col-sm-4" id="df_col"></div>
      </div>
      <br>

      <div class="row" id="no_records"><div class="col-sm-4">Plese select employee name to view details</div></div>
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
