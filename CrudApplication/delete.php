<?php session_start(); ?>
<!---------------------------------PHP CODE---------------------------------->
<?php
 if(!isset($_SESSION['empname']))
 {
     header("location:index.php");
 }
 ?>
 <!---------------------------------PHP CODE---------------------------------->
 <?php
 include("connect.php");
 $erpid = $_GET['erpid'];
 $query = oci_parse($conn, "DELETE FROM erpdata WHERE erpid=$erpid");
 $result = oci_execute($query, OCI_DEFAULT); 

 if($result)
 {
    oci_commit($conn);
    echo "<div class='alert alert-success'><b>Record was deleted successfully!..</b></div>";
    header("Location:main.php");
 }else{
    echo "<div class='alert alert-success'><b>Unable to delete record.</b></div>";
 }
 ?>
 <!---------------------------------PHP CODE---------------------------------->
 