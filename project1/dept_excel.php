<?php  
 //excel.php  
 //header('Content-Type: application/vnd.ms-excel');
 //header('Content-Disposition: attachment; filename=download.xls'); 

$conn = oci_connect('hr', 'hr', 'devpdb1');

$stid = oci_parse($conn, "SELECT * FROM departments ");
oci_execute($stid);

echo "DEPARTMENT_ID"."\t". 
     "DEPARTMENT_NAME"."\t".
     "MANAGER_ID"."\t".
     "LOCATION_ID"."\n";

      while($rows=OCI_fetch_assoc($stid)) 
		{ 
        echo $rows['DEPARTMENT_ID'] . "\t" .
             $rows['DEPARTMENT_NAME'] . "\t" .
             $rows['MANAGER_ID'] . "\t" .
             $rows['LOCATION_ID'] . "\n";
        } 
 ?>  

