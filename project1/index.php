<?php  
 //excel.php  
 header('Content-Type: application/vnd.ms-excel');
 header('Content-Disposition: attachment; filename=download.xls'); 

$conn = oci_connect('hr', 'hr', 'devpdb1');

$stid = oci_parse($conn, "SELECT * FROM employees ");
oci_execute($stid);

echo "EMPLOYEE_ID" ."\t". 
     "FIRST_NAME" . "\n";

      while($rows=OCI_fetch_assoc($stid)) 
		{ 
        echo $rows['EMPLOYEE_ID'] . "\t" . 
             $rows['FIRST_NAME'] . "\n";
         } 
 ?>  

