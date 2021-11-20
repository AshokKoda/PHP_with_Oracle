<?php
$conn = oci_connect("LOGDB", "0000", "localhost:1521/XE");
$stid = oci_parse($conn, "SELECT * FROM logdata");
oci_execute($stid);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc;
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}

table, th, td {
  border:1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>

<h2 align="center">LOG SHEET DETAILS FROM DATABASE</h2>
<a href="SheetLog.php" style="background-color: #555555; border: none; color: white; padding: 12px 25px; text-align: center;
  text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; transition-duration: 0.4s; cursor: pointer;">ADD NEW</a>
  <br>
<?php
while ($rows = OCI_fetch_assoc($stid)) 
{
?>
<button class="accordion"><?php echo $rows['EXECUTIVE']; ?></button>
<form action="SheetLog.php" method="post" class="panel">
<table style="width:100%">
  <tr>
    <th colspan="100">VISAKHAPATNAM STEEL PLANT</th>
  </tr>
  <tr>
    <th colspan="100">BF PROCESS CONTROL SYSTEMS LOG SHEET</th>
  </tr>
  <tr>
    <th>
      DATE :
        <b style="color: green;">
            <?php echo $rows['LOGDATE']; ?>
        </b>
    </th>
    <th>
      SHIFT :
        <b style="color: green;">
            <?php echo $rows['SHIFT']; ?>
        </b>
    </th>
    <th colspan="3">BF1 STATUS</th>
    <th colspan="3">BF2 STATUS</th>
    <th colspan="3">BF3 STATUS</th>
  </tr>
  <tr>
    <th colspan="2">Service Executives</th>
    <th colspan="2">HARDWARE</th>
    <th>APPLICATION</th>
    <th colspan="2">HARDWARE</th>
    <th>APPLICATION</th>
    <th colspan="2">HARDWARE</th>
    <th>APPLICATION</th>
  </tr>
  <tr>
    <th rowspan="9" colspan="2">
      Executive Name:
        <b style="color: green;">
            <?php echo $rows['EXECUTIVE']; ?>
        </b>
    </th>
    <!--BF1 Status-->
    <th>
      App Server-1:
        <b style="color: green;">
            <?php echo $rows['BFAPPSERVER1']; ?>
        </b>
    </th>
    <th>
      App Storage:
        <b style="color: green;">
            <?php echo $rows['BFAPPSTORAGE']; ?>
        </b>
    </th>
    <th>
      XML:
        <b style="color: green;">
            <?php echo $rows['BFXML']; ?>
        </b>
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      App Server-1:
        <b style="color: green;">
            <?php echo $rows['BF2APPSERVER1']; ?>
        </b>
    </th>
    <th>
      App Storage:
        <b style="color: green;">
            <?php echo $rows['BF2APPSTORAGE']; ?>
        </b>
    </th>
    <th>
      XML:
        <b style="color: green;">
            <?php echo $rows['BF2XML']; ?>
        </b>
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      App Server-1:
        <b style="color: green;">
            <?php echo $rows['BF3APPSERVER1']; ?>
        </b>
    </th>
    <th>
      App Storage:
        <b style="color: green;">
            <?php echo $rows['BF3APPSTORAGE']; ?>
        </b>
    </th>
    <th>
      HS Model:
        <b style="color: green;">
            <?php echo $rows['BF3HSMODEL']; ?>
        </b>
    </th>
    <!--BF3 End-->
  </tr>

  <!-------------------------------------------------------------------------------------------------------------->
  <tr>
    <!--BF1 Status-->
    <th>
      App Server-2:
        <b style="color: green;">
            <?php echo $rows['BFAPPSERVER2']; ?>
        </b>
    </th>
    <th>
      DB Storage:
        <b style="color: green;">
            <?php echo $rows['BFDBSTORAGE']; ?>
        </b>
    </th>
    <th>
      MIMIC:
        <b style="color: green;">
            <?php echo $rows['BFMIMIC']; ?>
        </b>
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      App Server-2:
        <b style="color: green;">
            <?php echo $rows['BF2APPSERVER2']; ?>
        </b>
    </th>
    <th>
      DB Storage:
        <b style="color: green;">
            <?php echo $rows['BF2DBSTORAGE']; ?>
        </b>
    </th>
    <th>
      MIMIC:
        <b style="color: green;">
            <?php echo $rows['BF2MIMIC']; ?>
        </b>
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      App Server-2:
        <b style="color: green;">
            <?php echo $rows['BF3APPSERVER2']; ?>
        </b>
    </th>
    <th>
      DB Storage:
        <b style="color: green;">
            <?php echo $rows['BF3DBSTORAGE']; ?>
        </b>
    </th>
    <th>
      sachem:
        <b style="color: green;">
            <?php echo $rows['BF3SACHEM']; ?>
        </b>
    </th>
    <!--BF3 End-->
  </tr>

  <!-------------------------------------------------------------------------------------------------------------->
  <tr>
    <!--BF1 Status-->
    <th>
      DB Server-2:
        <b style="color: green;">
            <?php echo $rows['BFDBSERVER2']; ?>
        </b>
    </th>
    <th>
      Firewall:
      <b style="color: green;">
            <?php echo $rows['BFFIREWALL']; ?>
        </b>
    </th>
    <th>
      L2 HMI:
      <b style="color: green;">
            <?php echo $rows['BFL2HMI']; ?>
        </b>
      
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      DB Server-1:
      <b style="color: green;">
            <?php echo $rows['BF2DBSERVER1']; ?>
        </b>
    </th>
    <th>
      Firewall:
      <b style="color: green;">
            <?php echo $rows['BF2FIREWALL']; ?>
        </b>
    </th>
    <th>
      L2 HMI:
      <b style="color: green;">
            <?php echo $rows['BF2L2HMI']; ?>
        </b>
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      DB Server-1:
      <b style="color: green;">
            <?php echo $rows['BF2DBSERVER1']; ?>
        </b>
    </th>
    <th>
      Firewall:
      <b style="color: green;">
            <?php echo $rows['BF3FIREWALL']; ?>
        </b>
    </th>
    <th>
      XML:
      <b style="color: green;">
            <?php echo $rows['BF3XML']; ?>
        </b>
    </th>
    <!--BF3 End-->
  </tr>

  <!-------------------------------------------------------------------------------------------------------------->
  <tr>
    <!--BF1 Status-->
    <th>
      DB Server-2:
      <b style="color: green;">
            <?php echo $rows['BFDBSERVER2']; ?>
        </b>
    </th>
    <th>
      N/W Switch:
      <b style="color: green;">
            <?php echo $rows['BFNWSWITCH']; ?>
        </b>
    </th>
    <th>
      L1 OPC Link:
      <b style="color: green;">
            <?php echo $rows['BFL1OPC']; ?>
        </b>
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      DB Server-2:
      <b style="color: green;">
            <?php echo $rows['BF2DBSERVER2']; ?>
        </b>
    </th>
    <th>
      N/W Switch:
      <b style="color: green;">
            <?php echo $rows['BF2NWSWITCH']; ?>
        </b>
    </th>
    <th>
      L1 OPC LINK:
      <b style="color: green;">
            <?php echo $rows['BF2L1OPC']; ?>
        </b>
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      DB Server-2:
      <b style="color: green;">
            <?php echo $rows['BF3DBSERVER2']; ?>
        </b>
    </th>
    <th>
      N/W Switch:
      <b style="color: green;">
            <?php echo $rows['BF3NWSWITCH']; ?>
        </b>
    </th>
    <th>
      MIMIC:
      <b style="color: green;">
            <?php echo $rows['BF3MIMIC']; ?>
        </b>
    </th>
    <!--BF3 End-->
  </tr>

  <!-------------------------------------------------------------------------------------------------------------->
  <tr>
    <!--BF1 Status-->
    <th>
      DC Server-1:
      <b style="color: green;">
            <?php echo $rows['BFDCSERVER1']; ?>
        </b>
    </th>
    <th>
      L2 HMI PC:
      <b style="color: green;">
            <?php echo $rows['BFL2HMI']; ?>
        </b>
    </th>
    <th>
      L2 Services:
      <b style="color: green;">
            <?php echo $rows['BFL2SERVICES']; ?>
        </b>
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      DC Server-1:
      <b style="color: green;">
            <?php echo $rows['BF2DCSERVER1']; ?>
        </b>
    </th>
    <th>
      L2 HMI PC:
      <b style="color: green;">
            <?php echo $rows['BF2L2HMIPC']; ?>
        </b>
    </th>
    <th>
      L2 Services:
      <b style="color: green;">
            <?php echo $rows['BF2L2SERVICES']; ?>
        </b>
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      DC Server-1:
      <b style="color: green;">
            <?php echo $rows['BF3DCSERVER1']; ?>
        </b>
    </th>
    <th>
      L2 HMI PC:
      <b style="color: green;">
            <?php echo $rows['BF3L2HMIPC']; ?>
        </b>
    </th>
    <th>
      L2 HMI:
      <b style="color: green;">
            <?php echo $rows['BF3L2HMI']; ?>
        </b>
    </th>
    <!--BF3 End-->
  </tr>

  <!-------------------------------------------------------------------------------------------------------------->
  <tr>
    <!--BF1 Status-->
    <th>
      DC Server-2:
      <b style="color: green;">
            <?php echo $rows['BFDCSERVER2']; ?>
        </b>
    </th>
    <th>
      BSH1 PC:
      <b style="color: green;">
            <?php echo $rows['BFBHS1PC']; ?>
        </b>
    </th>
    <th>
      L3/ERP Link:
      <b style="color: green;">
            <?php echo $rows['BFL3ERP']; ?>
        </b>
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      DC Server-2:
      <b style="color: green;">
            <?php echo $rows['BF2DCSERVER2']; ?>
        </b>
    </th>
    <th>
      BHS1 PC:
      <b style="color: green;">
            <?php echo $rows['BF2BHS1PC']; ?>
        </b>
    </th>
    <th>
      L3/ERP Link:
      <b style="color: green;">
            <?php echo $rows['BF2L3ERP']; ?>
        </b>
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      DC Server-2:
      <b style="color: green;">
            <?php echo $rows['BF3DCSERVER2']; ?>
        </b>
    </th>
    <th>
      LAB PC:
      <b style="color: green;">
            <?php echo $rows['BF3LABPC']; ?>
        </b>
    </th>
    <th>
      L1 OPC LINK:
      <b style="color: green;">
            <?php echo $rows['BF3L1OPCLINK']; ?>
        </b>
    </th>
    <!--BF3 End-->
  </tr>

  <!-------------------------------------------------------------------------------------------------------------->
  <tr>
    <!--BF1 Status-->
    <th>
      DEV PC:
      <b style="color: green;">
            <?php echo $rows['BFDEVPC']; ?>
        </b>
    </th>
    <th>
      C/R L2 PC:
      <b style="color: green;">
            <?php echo $rows['BFCRL2PC']; ?>
        </b>
    </th>
    <th>
      BF1 Portal:
      <b style="color: green;">
            <?php echo $rows['BFPORTAL']; ?>
        </b>
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      Web Server:
      <b style="color: green;">
            <?php echo $rows['BF2WEBSERVER']; ?>
        </b>
    </th>
    <th>
      C/R L2 PC:
      <b style="color: green;">
            <?php echo $rows['BF2CRL2']; ?>
        </b>
    </th>
    <th>
      BF2 Portal:
      <b style="color: green;">
            <?php echo $rows['BF2PORTAL']; ?>
        </b>
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      Web Server:
      <b style="color: green;">
            <?php echo $rows['BF3WEBSERVER']; ?>
        </b>
    </th>
    <th>
      C/R L2 PC:
      <b style="color: green;">
            <?php echo $rows['BF3CRL2']; ?>
        </b>
    </th>
    <th>
      L2 Services:
      <b style="color: green;">
            <?php echo $rows['BF3L2SERVICE']; ?>
        </b>
    </th>
    <!--BF3 End-->
  </tr>

  <!-------------------------------------------------------------------------------------------------------------->
  <tr>
    <!--BF1 Status-->
    <th>
      LAB PC:
      <b style="color: green;">
            <?php echo $rows['BFLABPC']; ?>
        </b>
    </th>
    <th>
      Remote PC:
      <b style="color: green;">
            <?php echo $rows['BFREMOTEPC']; ?>
        </b>
    </th>
    <th>
      Null
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      DEV PC:
      <b style="color: green;">
            <?php echo $rows['BF2DEVPC']; ?>
        </b>
    </th>
    <th>
      Remote PC:
      <b style="color: green;">
            <?php echo $rows['BF2REMOTEPC']; ?>
        </b>
    </th>
    <th>
      Null
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      DEV PC:
      <b style="color: green;">
            <?php echo $rows['BF3DEVPC']; ?>
        </b>
    </th>
    <th>
      Null
    </th>
    <th>
      L3/ERP LINK:
      <b style="color: green;">
            <?php echo $rows['BF3ERP']; ?>
        </b>
    <!--BF3 End-->
  </tr>

  <!-------------------------------------------------------------------------------------------------------------->
  <tr>
    <!--BF1 Status-->
    <th>
      Null
    </th>
    <th>
      Null
    </th>
    <th>
      Null
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      LAB PC:
      <b style="color: green;">
            <?php echo $rows['BF2LABPC']; ?>
        </b>
    </th>
    <th>
      Null
    </th>
    <th>
      Null
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      Null
    </th>
    <th>
      Null
    </th>
    <th>
      BF3 Portal:
      <b style="color: green;">
            <?php echo $rows['BF3PORTAL']; ?>
        </b>
    </th>
    <!--BF3 End-->
  </tr>

  <!---------------------------------------------------------------------------------------------------------------->
  <tr>
    <th colspan="100">BF LEVEL-2 Room Environment Status</th>
  </tr>
  <tr>
    <th colspan="1" align="left">Parameter</th>
    <th colspan="3">BF1</th>
    <th colspan="3">BF2</th>
    <th colspan="3">BF3</th>
    <th colspan="6">REMARKS</th>
  </tr>
  <tr>
    <th align="left">Temperature</th>
    <th colspan="3">
      <b style="color: green;">
        <?php echo $rows['BF1TEMP']; ?>
      </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
        <?php echo $rows['BF2TEMP']; ?>
      </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
        <?php echo $rows['BF3TEMP']; ?>
      </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
        <?php echo $rows['REMARKS']; ?>
      </b>
    </th>
  </tr>
  <tr>
    <th align="left">A/C Working</th>
    <th colspan="3">
      <b style="color: green;">
        <?php echo $rows['BF1AC']; ?>
      </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
        <?php echo $rows['BF2AC']; ?>
      </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
        <?php echo $rows['BF3AC']; ?>
      </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
        <?php echo $rows['REMARKSAC']; ?>
      </b>
    </th>
  </tr>
  <tr>
    <th align="left">UPS/Power Supply</th>
    <th colspan="3">
      <b style="color: green;">
        <?php echo $rows['BF1UPS']; ?>
      </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
        <?php echo $rows['BF2UPS']; ?>
      </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
        <?php echo $rows['BF3UPS']; ?>
      </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
        <?php echo $rows['REMARKSUPS']; ?>
      </b>
    </th>
  </tr>
  <tr>
    <th align="left">Backup Taken</th>
    <th colspan="3">
      <b style="color: green;">
        <?php echo $rows['BF1BACKUP']; ?>
      </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
            <?php echo $rows['BF2BACKUP']; ?>
        </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
            <?php echo $rows['BF3BACKUP']; ?>
        </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
            <?php echo $rows['REMARKSBACK']; ?>
        </b>
    </th>
  </tr>
  <tr>
    <th align="left">System Downtime</th>
    <th colspan="3">
      <b style="color: green;">
            <?php echo $rows['BF1BACK']; ?>
        </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
            <?php echo $rows['BF2BACK']; ?>
        </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
            <?php echo $rows['BF3BACK']; ?>
        </b>
    </th>
    <th colspan="3" align="left">
      Total Downtime:
      <b style="color: green;">
            <?php echo $rows['DOWNTIME']; ?>
        </b>
    </th>
  </tr>

  <!---------------------------------------------------------------------------------------------------------------->
  <tr>
    <th colspan="100">PMs Done</th>
  </tr>
  <tr>
    <th colspan="1">Area/Location</th>
    <th colspan="3">Eqpt/Device</th>
    <th colspan="3">Job Done</th>
    <th colspan="3">Abnormality Observed</th>
    <th>Remarks</th>
  </tr>
  <tr>
    <th colspan="1">
      <b style="color: green;">
            <?php echo $rows['AREA']; ?>
        </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
            <?php echo $rows['DEVICE']; ?>
        </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
            <?php echo $rows['JOB']; ?>
        </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
            <?php echo $rows['ABNORMAL']; ?>
        </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
            <?php echo $rows['PMREMARKS']; ?>
        </b>
    </th>
  </tr>

  <!---------------------------------------------------------------------------------------------------------------->
  <tr>
    <th colspan="100">Customer Complaints</th>
  </tr>
  <tr>
    <th align="left" colspan="1">S.No</th>
    <th align="left" colspan="1">Loc/Person</th>
    <th colspan="3">Problem Description</th>
    <th colspan="3">Rep Time</th>
    <th colspan="">Action Taken</th>
    <th colspan="">Close Time</th>
    <th colspan="">Remarks</th>
  </tr>
  <tr>
    <th colspan="1">
      <b style="color: green;">
            <?php echo $rows['SNO']; ?>
        </b>
    </th>
    <th colspan="1">
      <b style="color: green;">
            <?php echo $rows['PERSON']; ?>
        </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
            <?php echo $rows['DESS']; ?>
        </b>
    </th>
    <th colspan="3">
      <b style="color: green;">
            <?php echo $rows['REPTIME']; ?>
        </b>
    </th>
    <th colspan="">
      <b style="color: green;">
            <?php echo $rows['ACTTIME']; ?>
        </b>
    </th>
    <th colspan="">
      <b style="color: green;">
            <?php echo $rows['CLOSETIME']; ?>
        </b>
    </th>
    <th colspan="">
      <b style="color: green;">
            <?php echo $rows['CUREMARKS']; ?>
        </b>
    </th>
  </tr>

  <!---------------------------------------------------------------------------------------------------------------->
  <tr>
    <th colspan="7">Other Jobs Done/ Taken Up</th>
    <th colspan="7">Follow up/ Instructions</th>
  </tr>
  <tr>
    <th align="left" colspan="1">
      S.No
      <b style="color: green;">
            <?php echo $rows['SSNO']; ?>
        </b>
    </th>
    <th align="left" colspan="">
      Loc/Person
      <b style="color: green;">
            <?php echo $rows['LOCPERSON1']; ?>
        </b>
    </th>
    <th align="left" colspan="5">
    <b style="color: green;">
            <?php echo $rows['LOCPERSON2']; ?>
        </b>
    </th>
    <th align="left" colspan="5">
    <b style="color: green;">
            <?php echo $rows['LOCPERSON3']; ?>
        </b>
    </th>
  </tr>

  <!---------------------------------------------------------------------------------------------------------------->
  <tr>
    <th colspan="100">Other Information</th>
  </tr>
  <tr>
    <th colspan="100">
      <p>
      <b style="color: green;">
            <?php echo $rows['INFORMATION']; ?>
        </b>
      </p>
    </th>
  </tr>

  <!---------------------------------------------------------------------------------------------------------------->
  <tr>
    <th colspan="100" align="left">Signature: </th>
  </tr>
</table>
<br>
<div align="center">
<a href="EditLogsheet.php?LOG_ID=<?php echo $rows['LOG_ID']; ?>" style="background-color: #4CAF50; border: none; color: white; padding: 12px 25px; text-align: center;
  text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; transition-duration: 0.4s; cursor: pointer;">EDIT</a>

<a href="Delete.php?LOG_ID=<?php echo $rows['LOG_ID']; ?>" style="background-color: #f44336; border: none; color: white; padding: 12px 25px; text-align: center;
  text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; transition-duration: 0.4s; cursor: pointer;">DELETE</a>
</div>
<br>
</form>
<?php
}
?>

<!--------------------------------Script Code------------------------------------------->
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>

</body>
</html>
