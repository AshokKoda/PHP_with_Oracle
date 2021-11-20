<?php

        $con = oci_connect('hr', 'hr', 'xe');

        $strSql = " select JOB_ID  from jobs  ";
        $stid = oci_parse($con,$strSql);
        oci_execute($stid);
        $nrows = oci_fetch_all($stid, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //echo "$nrows rows fetched";
        //var_dump($res);

        //echo "<br>";

        header('Content-type: application/json');
        echo json_encode( $res );


        ?>
