<!-- WORKING -->

<tr>
  <td>Job</td>
    <td>
      <select name="job">
          <?php 

              $conn = oci_connect("hr", "hr", "devpdb1");
              $sql = 'select job_id, job_title  from jobs ';
              $stid = oci_parse($conn, $sql);
              $success = oci_execute($stid);
              echo $success;


              while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC))
              {
                  echo "<option value=\"unit1\">" . $row['JOB_ID'] . "</option>";
              }
          ?>
      </select>
    </td>
</tr>