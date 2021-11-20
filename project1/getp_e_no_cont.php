<?php
// connection to database
$conn = oci_connect('hdk', 'hdk', 'devpdb1');

if (!empty($_POST["p_dept_cd"]))
{
    // Query to get data from table
    $sql = "SELECT empno, ename  FROM VHRIS_EMP_PROFILE_GEN where dept_cd ='" . $_POST["p_dept_cd"] . "'";
    //Parsing values to sql
    $stid = oci_parse($conn, $sql);
    //For execution
    oci_execute($stid);
?>
<select id='p_e_no_cont' name='p_e_no_cont'  >
<option value="">Select </option>
<?php
    //fetching values from database
    while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS))
    {

        echo "<option value='" . $row['EMPNO'] . "'>" . $row['ENAME'] . "</option>";
?>
<?php
    }
}
echo " </select> ";
?>
