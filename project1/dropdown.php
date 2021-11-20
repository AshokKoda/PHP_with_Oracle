<html>
    <head>
    <?php
echo '<link href="page.css" rel="stylesheet" type="text/css" />';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script>
function getcname(val) {
$.ajax({
type: "POST",
url: "get_cname.php",
data:'p_dept_cd='+val,
success: function(data){
$("#p_e_no_cont").html(data);
}
});
}
</script>
</head>
    <body>
    <form name="" action="" method="post">
<table align=""> 
 <tr><b> Department Details</b>
</tr>   
 <tr>
         <td>Customer Department:</td>
         <td><?php
$conn = oci_connect('hdk', 'hdk', 'devpdb1');

$sql="select DEPT_CD,  DEPT_DESC from vhris_emp_profile_gen
GROUP BY DEPT_CD, DEPT_DESC ";
$stid = oci_parse($conn, $sql);
oci_execute($stid);

echo '<select onChange="getcname(this.value);"  name="customer" id="customer" class="form-control" >';
echo " <option value='' selected='selected'>-- Select --</option>";

while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))
{
    echo "<option value='" . $row['DEPT_CD'] . "'>" . $row['DEPT_DESC'] . "</option>";
}

echo " </select> ";

?>
</td>
</tr>
<tr>
<td scope="row">Customer Name :</td>
<td><select name="p_e_no_cont" id="p_e_no_cont" class="form-control">
<option value="">Select</option>
</select>



</td>
</tr>
</table>
</form>
</body>
</html>