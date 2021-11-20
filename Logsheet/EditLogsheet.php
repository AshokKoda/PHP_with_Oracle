<?php
$conn=oci_connect("LOGDB","0000","localhost:1521/XE");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

if(count($_POST)>0)
{
  $query = oci_parse($conn, "UPDATE logdata SET LOG_ID='" . $_POST['log_id'] . "', LOGDATE='" . $_POST['logdate'] . "', EXECUTIVE='" . $_POST['executive'] . "', SHIFT='" . $_POST['shift'] . "' ,
  BFAPPSERVER1='" . $_POST['bfappserver1'] . "' ,
  BFAPPSTORAGE='" . $_POST['bfappstorage'] . "' ,
  BFXML='" . $_POST['bfxml'] . "' ,
  BFAPPSERVER2='" . $_POST['bfappserver2'] . "' ,
  BFDBSTORAGE='" . $_POST['bfdbstorage'] . "' ,
  BFMIMIC='" . $_POST['bfmimic'] . "' ,
  BFDBSERVER1='" . $_POST['bfdbserver1'] . "' ,
  BFFIREWALL='" . $_POST['bffirewall'] . "' ,
  BFL2HMI='" . $_POST['bfl2hmi'] . "' ,
  BFDBSERVER2='" . $_POST['bfdbserver2'] . "' ,
  BFNWSWITCH='" . $_POST['bfnwswitch'] . "' ,
  BFL1OPC='" . $_POST['bfl1opc'] . "' ,
  BFDCSERVER1='" . $_POST['bfdcserver1'] . "' ,
  BFL2HMIPC='" . $_POST['bfl2hmipc'] . "' ,
  BFL2SERVICES='" . $_POST['bfl2services'] . "' ,
  BFDCSERVER2='" . $_POST['bfdcserver2'] . "' ,
  BFBHS1PC='" . $_POST['bfbhs1pc'] . "' ,
  BFL3ERP='" . $_POST['bfl3erp'] . "' ,
  BFDEVPC='" . $_POST['bfdevpc'] . "' ,
  BFCRL2PC='" . $_POST['bfcrl2pc'] . "' ,
  BFPORTAL='" . $_POST['bfportal'] . "' ,
  BFLABPC='" . $_POST['bflabpc'] . "' ,
  BFREMOTEPC='" . $_POST['bfremotepc'] . "' ,
  BF2APPSERVER1='" . $_POST['bf2appserver1'] . "' ,
  BF2APPSTORAGE='" . $_POST['bf2appstorage'] . "' ,
  BF2XML='" . $_POST['bf2xml'] . "' ,
  BF2APPSERVER2='" . $_POST['bf2appserver2'] . "' ,
  BF2DBSTORAGE='" . $_POST['bf2dbstorage'] . "' ,
  BF2MIMIC='" . $_POST['bf2mimic'] . "' ,
  BF2DBSERVER1='" . $_POST['bf2dbserver1'] . "' ,
  BF2FIREWALL='" . $_POST['bf2firewall'] . "' ,
  BF2L2HMI='" . $_POST['bf2l2hmi'] . "' ,
  BF2DCSERVER2='" . $_POST['bf2dcserver2'] . "' ,
  BF2NWSWITCH='" . $_POST['bf2nwswitch'] . "' ,
  BF2L1OPC='" . $_POST['bf2l1opc'] . "' ,
  BF2DCSERVER1='" . $_POST['bf2dcserver1'] . "' ,
  BF2L2HMIPC='" . $_POST['bf2l2hmipc'] . "' ,
  BF2L2SERVICES='" . $_POST['bf2l2services'] . "' ,
  BF2DCSERVER2='" . $_POST['bf2dcserver2'] . "' ,
  BF2BHS1PC='" . $_POST['bf2bhs1pc'] . "' ,
  BF2L3ERP='" . $_POST['bf2l3erp'] . "' ,
  BF2WEBSERVER='" . $_POST['bf2webserver'] . "' ,
  BF2CRL2='" . $_POST['bf2crl2'] . "' ,
  BF2PORTAL='" . $_POST['bf2portal'] . "' ,
  BF2DEVPC='" . $_POST['bf2devpc'] . "' ,
  BF2REMOTEPC='" . $_POST['bf2remotepc'] . "' ,
  BF2LABPC='" . $_POST['bf2labpc'] . "' ,
  BF3APPSERVER1='" . $_POST['bf2appserver1'] . "' ,
  BF3APPSTORAGE='" . $_POST['bf2appstorage'] . "' ,
  BF3HSMODEL='" . $_POST['bf2xml'] . "' ,
  BF3APPSERVER2='" . $_POST['bf3appserver2'] . "' ,
  BF3DBSTORAGE='" . $_POST['bf3dbstorage'] . "' ,
  BF3SACHEM='" . $_POST['bf3sachem'] . "' ,
  BF3DBSERVER1='" . $_POST['bf3dbserver1'] . "' ,
  BF3FIREWALL='" . $_POST['bf3firewall'] . "' ,
  BF3XML='" . $_POST['bf3xml'] . "' ,
  BF3DBSERVER2='" . $_POST['bf3dbserver2'] . "' ,
  BF3NWSWITCH='" . $_POST['bf3nwswitch'] . "' ,
  BF3MIMIC='" . $_POST['bf3mimic'] . "' ,
  BF3DCSERVER1='" . $_POST['bf3dcserver1'] . "' ,
  BF3L2HMIPC='" . $_POST['bf3l2hmipc'] . "' ,
  BF3L2HMI='" . $_POST['bf3l2hmi'] . "' ,
  BF3DCSERVER2='" . $_POST['bf3dcserver2'] . "' ,
  BF3LABPC='" . $_POST['bf3labpc'] . "' ,
  BF3L1OPCLINK='" . $_POST['bf3l1opclink'] . "' ,
  BF3WEBSERVER='" . $_POST['bf3webserver'] . "' ,
  BF3CRL2='" . $_POST['bf3crl2'] . "' ,
  BF3L2SERVICE='" . $_POST['bf3l2service'] . "' ,
  BF3DEVPC='" . $_POST['bf3devpc'] . "' ,
  BF3ERP='" . $_POST['bf3erp'] . "' ,
  BF3PORTAL='" . $_POST['bf3portal'] . "' ,
  WHERE log_id='" . $_POST['log_id'] . "'"); 
	$result = oci_execute($query, OCI_DEFAULT);  

    if($result)
    {
        oci_commit($conn);
		echo "<div class='alert alert-success'><b>Record was updated successfully!..</b></div>";
    }
    else
    {
        echo "<div class='alert alert-success'><b>Unable to update record.</b></div>";
    }
}

$query="SELECT * FROM logdata WHERE LOG_ID='" . $_GET['LOG_ID'] . "'";
$result=oci_parse($conn,$query);
oci_execute($result);
$row=oci_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
  border-collapse: collapse;
}
</style>
<body>
<form action="" method="post" name="frmUser">
    <h2 align="center">UPDATE LOG SHEET</h2>
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
      <div>
        <input type="text" name="logdate" value="<?php echo $row['LOGDATE']; ?>" />
        <input type="hidden" name="log_id" value="<?php echo $row['LOG_ID']; ?>">
      </div>
    </th>
    <th>
      SHIFT :
      <div>
        <select name="shift">
          <option value='' selected='selected'><?php echo $row['SHIFT']; ?></option>
          <option value='A'>A-Shift</option>
          <option value='B'>B-Shift</option>
          <option value='C'>C-Shift</option>
        </select>
      <div>
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
      <div>
        <input type="text" name="executive" placeholder="Exe Name" value="<?php echo $row['EXECUTIVE']; ?>" required />
      </div>
    </th>
    <!--BF1 Status-->
    <th>
      App Server-1:
      <div>
        <select name="bfappserver1">
          <option value='' selected='selected'><?php echo $row['BFAPPSERVER1']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      App Storage:
      <div>
        <select name="bfappstorage">
          <option value='' selected='selected'><?php echo $row['BFAPPSTORAGE']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      XML:
      <div>
        <select name="bfxml">
          <option value='' selected='selected'><?php echo $row['BFXML']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      App Server-1:
      <div>
        <select name="bf2appserver1">
          <option value='' selected='selected'><?php echo $row['BF2APPSERVER1']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      App Storage:
      <div>
        <select name="bf2appstorage">
          <option value='' selected='selected'><?php echo $row['BF2APPSTORAGE']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      XML:
      <div>
        <select name="bf2xml">
          <option value='' selected='selected'><?php echo $row['BF2XML']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      App Server-1:
      <div>
        <select name="bf3appserver1">
          <option value='' selected='selected'><?php echo $row['BF3APPSERVER1']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      App Storage:
      <div>
        <select name="bf3appstorage">
          <option value='' selected='selected'><?php echo $row['BF3APPSTORAGE']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      HS Model:
      <div>
        <select name="bf3hsmodel">
          <option value='' selected='selected'><?php echo $row['BF3HSMODEL']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF3 End-->
  </tr>

  <!-------------------------------------------------------------------------------------------------------------->
  <tr>
    <!--BF1 Status-->
    <th>
      App Server-2:
      <div>
        <select name="bfappserver2">
          <option value='' selected='selected'><?php echo $row['BFAPPSERVER2']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      DB Storage:
      <div>
        <select name="bfdbstorage">
          <option value='' selected='selected'><?php echo $row['BFDBSTORAGE']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      MIMIC:
      <div>
        <select name="bfmimic">
          <option value='' selected='selected'><?php echo $row['BFMIMIC']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      App Server-2:
      <div>
        <select name="bf2appserver2">
          <option value='' selected='selected'><?php echo $row['BF2APPSERVER2']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      DB Storage:
      <div>
        <select name="bf2dbstorage">
          <option value='' selected='selected'><?php echo $row['BF2DBSTORAGE']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      MIMIC:
      <div>
        <select name="bf2mimic">
          <option value='' selected='selected'><?php echo $row['BF2MIMIC']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      App Server-2:
      <div>
        <select name="bf3appserver2">
          <option value='' selected='selected'><?php echo $row['BF3APPSERVER2']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      DB Storage:
      <div>
        <select name="bf3dbstorage">
          <option value='' selected='selected'><?php echo $row['BF3DBSTORAGE']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      sachem:
      <div>
        <select name="bf3sachem">
          <option value='' selected='selected'><?php echo $row['BF3SACHEM']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF3 End-->
  </tr>

  <!-------------------------------------------------------------------------------------------------------------->
  <tr>
    <!--BF1 Status-->
    <th>
      DB Server-2:
      <div>
        <select name="bfdbserver1">
          <option value='' selected='selected'><?php echo $row['BFDBSERVER1']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      Firewall:
      <div>
        <select name="bffirewall">
          <option value='' selected='selected'><?php echo $row['BFFIREWALL']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 HMI:
      <div>
        <select name="bfl2hmi">
          <option value='' selected='selected'><?php echo $row['BFL2HMI']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      DB Server-1:
      <div>
        <select name="bf2dbserver1">
          <option value='' selected='selected'><?php echo $row['BF2DBSERVER1']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      Firewall:
      <div>
        <select name="bf2firewall">
          <option value='' selected='selected'><?php echo $row['BF2FIREWALL']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 HMI:
      <div>
        <select name="bf2l2hmi">
          <option value='' selected='selected'><?php echo $row['BF2L2HMI']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      DB Server-1:
      <div>
        <select name="bf3dbserver1">
          <option value='' selected='selected'><?php echo $row['BF3DBSERVER1']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      Firewall:
      <div>
        <select name="bf3firewall">
          <option value='' selected='selected'><?php echo $row['BF3FIREWALL']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      XML:
      <div>
        <select name="bf3xml">
          <option value='' selected='selected'><?php echo $row['BF3XML']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF3 End-->
  </tr>

  <!-------------------------------------------------------------------------------------------------------------->
  <tr>
    <!--BF1 Status-->
    <th>
      DB Server-2:
      <div>
        <select name="bfdbserver2">
          <option value='' selected='selected'><?php echo $row['BFDBSERVER2']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      N/W Switch:
      <div>
        <select name="bfnwswitch">
          <option value='' selected='selected'><?php echo $row['BFNWSWITCH']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L1 OPC Link:
      <div>
        <select name="bfl1opc">
          <option value='' selected='selected'><?php echo $row['BFL1OPC']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      DB Server-2:
      <div>
        <select name="bf2dbserver2">
          <option value='' selected='selected'><?php echo $row['BF2DBSERVER2']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      N/W Switch:
      <div>
        <select name="bf2nwswitch">
          <option value='' selected='selected'><?php echo $row['BF2NWSWITCH']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L1 OPC LINK:
      <div>
        <select name="bf2l1opc">
          <option value='' selected='selected'><?php echo $row['BF2L1OPC']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      DB Server-2:
      <div>
        <select name="bf3dbserver2">
          <option value='' selected='selected'><?php echo $row['BF3DBSERVER2']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      N/W Switch:
      <div>
        <select name="bf3nwswitch">
          <option value='' selected='selected'><?php echo $row['BF3NWSWITCH']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      MIMIC:
      <div>
        <select name="bf3mimic">
          <option value='' selected='selected'><?php echo $row['BF3MIMIC']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF3 End-->
  </tr>

  <!-------------------------------------------------------------------------------------------------------------->
  <tr>
    <!--BF1 Status-->
    <th>
      DC Server-1:
      <div>
        <select name="bfdcserver1">
          <option value='' selected='selected'><?php echo $row['BFDCSERVER1']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 HMI PC:
      <div>
        <select name="bfl2hmipc">
          <option value='' selected='selected'><?php echo $row['BFL2HMIPC']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 Services:
      <div>
        <select name="bfl2services">
          <option value='' selected='selected'><?php echo $row['BFL2SERVICES']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      DC Server-1:
      <div>
        <select name="bf2dcserver1">
          <option value='' selected='selected'><?php echo $row['BF2DCSERVER1']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 HMI PC:
      <div>
        <select name="bf2l2hmipc">
          <option value='' selected='selected'><?php echo $row['BF2L2HMIPC']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 Services:
      <div>
        <select name="bf2l2services">
          <option value='' selected='selected'><?php echo $row['BF2L2SERVICES']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      DC Server-1:
      <div>
        <select name="bf3dcserver1">
          <option value='' selected='selected'><?php echo $row['BF3DCSERVER1']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 HMI PC:
      <div>
        <select name="bf3l2hmipc">
          <option value='' selected='selected'><?php echo $row['BF3L2HMIPC']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 HMI:
      <div>
        <select name="bf3l2hmi">
          <option value='' selected='selected'><?php echo $row['BF3L2HMI']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF3 End-->
  </tr>

  <!-------------------------------------------------------------------------------------------------------------->
  <tr>
    <!--BF1 Status-->
    <th>
      DC Server-2:
      <div>
        <select name="bfdcserver2">
          <option value='' selected='selected'><?php echo $row['BFDCSERVER2']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      BSH1 PC:
      <div>
        <select name="bfbhs1pc">
          <option value='' selected='selected'><?php echo $row['BFBHS1PC']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L3/ERP Link:
      <div>
        <select name="bfl3erp">
          <option value='' selected='selected'><?php echo $row['BFL3ERP']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      DC Server-2:
      <div>
        <select name="bf2dcserver2">
          <option value='' selected='selected'><?php echo $row['BF2DCSERVER2']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      BHS1 PC:
      <div>
        <select name="bf2bhs1pc">
          <option value='' selected='selected'><?php echo $row['BF2BHS1PC']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L3/ERP Link:
      <div>
        <select name="bf2l3erp">
          <option value='' selected='selected'><?php echo $row['BF2L3ERP']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      DC Server-2:
      <div>
        <select name="bf3dcserver2">
          <option value='' selected='selected'><?php echo $row['BF3DCSERVER2']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      LAB PC:
      <div>
        <select name="bf3labpc">
          <option value='' selected='selected'><?php echo $row['BF3LABPC']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L1 OPC LINK:
      <div>
        <select name="bf3l1opclink">
          <option value='' selected='selected'><?php echo $row['BF3L1OPCLINK']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF3 End-->
  </tr>

  <!-------------------------------------------------------------------------------------------------------------->
  <tr>
    <!--BF1 Status-->
    <th>
      DEV PC:
      <div>
        <select name="bfdevpc">
          <option value='' selected='selected'><?php echo $row['BFDEVPC']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      C/R L2 PC:
      <div>
        <select name="bfcrl2pc">
          <option value='' selected='selected'><?php echo $row['BFCRL2PC']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      BF1 Portal:
      <div>
        <select name="bfportal">
          <option value='' selected='selected'><?php echo $row['BFPORTAL']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      Web Server:
      <div>
        <select name="bf2webserver">
          <option value='' selected='selected'><?php echo $row['BF2WEBSERVER']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      C/R L2 PC:
      <div>
        <select name="bf2crl2">
          <option value='' selected='selected'><?php echo $row['BF2CRL2']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      BF2 Portal:
      <div>
        <select name="bf2portal">
          <option value='' selected='selected'><?php echo $row['BF2PORTAL']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      Web Server:
      <div>
        <select name="bf3webserver">
          <option value='' selected='selected'><?php echo $row['BF3WEBSERVER']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      C/R L2 PC:
      <div>
        <select name="bf3crl2">
          <option value='' selected='selected'><?php echo $row['BF3CRL2']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 Services:
      <div>
        <select name="bf3l2service">
          <option value='' selected='selected'><?php echo $row['BF3L2SERVICE']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF3 End-->
  </tr>

  <!-------------------------------------------------------------------------------------------------------------->
  <tr>
    <!--BF1 Status-->
    <th>
      LAB PC:
      <div>
        <select name="bflabpc">
          <option value='' selected='selected'><?php echo $row['BFLABPC']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      Remote PC:
      <div>
        <select name="bfremotepc">
          <option value='' selected='selected'><?php echo $row['BFREMOTEPC']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      Null
    </th>
    <!--BF1 End-->

    <!--BF2 Status-->
    <th>
      DEV PC:
      <div>
        <select name="bf2devpc">
          <option value='' selected='selected'><?php echo $row['BF2DEVPC']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      Remote PC:
      <div>
        <select name="bf2remotepc">
          <option value='' selected='selected'><?php echo $row['BF2REMOTEPC']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      Null
    </th>
    <!--BF2 End-->

    <!--BF3 Status-->
    <th>
      DEV PC:
      <div>
        <select name="bf3devpc">
          <option value='' selected='selected'><?php echo $row['BF3DEVPC']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      Null
    </th>
    <th>
      L3/ERP LINK:
      <div>
        <select name="bf3erp">
          <option value='' selected='selected'><?php echo $row['BF3ERP']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
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
      <div>
        <select name="bf2labpc">
          <option value='' selected='selected'><?php echo $row['BF2LABPC']; ?></option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
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
      <div>
        <select name="bf3portal">
          <option value='' selected='selected'><?php echo $row['BF3PORTAL']; ?></option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
    </th>
    <!--BF3 End-->
  </tr>

  <!---------------------------------------------------------------------------------------------------------------->
  <!-- <tr>
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
      <input type="text" name="bf1temp" placeholder="BF1 Temp" />
    </th>
    <th colspan="3">
      <input type="text" name="bf2temp" placeholder="BF2 Temp" />
    </th>
    <th colspan="3">
      <input type="text" name="bf3temp" placeholder="BF3 Temp" />
    </th>
    <th colspan="3">
      <input type="text" name="remarks" placeholder="Remarks" />
    </th>
  </tr>
  <tr>
    <th align="left">A/C Working</th>
    <th colspan="3">
      <input type="text" name="bf1ac" placeholder="BF1 A/C" />
    </th>
    <th colspan="3">
      <input type="text" name="bf2ac" placeholder="BF2 A/C" />
    </th>
    <th colspan="3">
      <input type="text" name="bf3ac" placeholder="BF3 A/C" />
    </th>
    <th colspan="3">
      <input type="text" name="remarksac" placeholder="Remarks" />
    </th>
  </tr>
  <tr>
    <th align="left">UPS/Power Supply</th>
    <th colspan="3">
      <input type="text" name="bf1ups" placeholder="BF1 UPS" />
    </th>
    <th colspan="3">
      <input type="text" name="bf2ups" placeholder="BF2 UPS" />
    </th>
    <th colspan="3">
      <input type="text" name="bf3ups" placeholder="BF3 UPS" />
    </th>
    <th colspan="3">
      <input type="text" name="remarksups" placeholder="Remarks" />
    </th>
  </tr>
  <tr>
    <th align="left">Backup Taken</th>
    <th colspan="3">
      <input type="text" name="bf1backup" placeholder="BF1 Backup" />
    </th>
    <th colspan="3">
      <input type="text" name="bf2backup" placeholder="BF2 Backup" />
    </th>
    <th colspan="3">
      <input type="text" name="bf3backup" placeholder="BF3 Backup" />
    </th>
    <th colspan="3">
      <input type="text" name="remarksback" placeholder="Remarks" />
    </th>
  </tr>
  <tr>
    <th align="left">System Downtime</th>
    <th colspan="3">
      <input type="text" name="bf1backup" placeholder="BF1 Backup" />
    </th>
    <th colspan="3">
      <input type="text" name="bf2backup" placeholder="BF2 Backup" />
    </th>
    <th colspan="3">
      <input type="text" name="bf3backup" placeholder="BF3 Backup" />
    </th>
    <th colspan="3" align="left">
      Total Downtime:
      <input type="text" name="remarksback" />
    </th>
  </tr> -->

  <!---------------------------------------------------------------------------------------------------------------->
  <!-- <tr>
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
      <input type="text" name="area" placeholder="Area/Location" />
    </th>
    <th colspan="3">
      <input type="text" name="device" placeholder="Eqpt/Device" />
    </th>
    <th colspan="3">
      <textarea type="text" name="job" placeholder="Jobdone"></textarea>
    </th>
    <th colspan="3">
      <input type="text" name="abnormal" placeholder="Abnormality" />
    </th>
    <th colspan="3">
      <input type="text" name="remrk" placeholder="Remarks" />
    </th>
  </tr> -->

  <!---------------------------------------------------------------------------------------------------------------->
  <!-- <tr>
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
      <input type="text" name="sno" placeholder="s.no" />
    </th>
    <th colspan="1">
      <input type="text" name="person" placeholder="Person" />
    </th>
    <th colspan="3">
      <textarea type="text" name="desc" placeholder="Problem Description"></textarea>
    </th>
    <th colspan="3">
      <input type="text" name="reptime" placeholder="Rep Time" />
    </th>
    <th colspan="">
      <input type="text" name="acttime" placeholder="Action time" />
    </th>
    <th colspan="">
      <input type="text" name="closetime" placeholder="Close time" />
    </th>
    <th colspan="">
      <input type="text" name="rmarks" placeholder="Remarks" />
    </th>
  </tr> -->

  <!---------------------------------------------------------------------------------------------------------------->
  <!-- <tr>
    <th colspan="7">Other Jobs Done/ Taken Up</th>
    <th colspan="7">Follow up/ Instructions</th>
  </tr>
  <tr>
    <th align="left" colspan="1">
      S.No
      <input type="number" name="ssno" placeholder="S.no" />
    </th>
    <th align="left" colspan="">
      Loc/Person
      <input type="text" name="locperson" placeholder="Loc/Person" />
    </th>
    <th align="left" colspan="5">
      <textarea type="text" name="locperson" placeholder="Loc/Person"></textarea>
    </th>
    <th align="left" colspan="5">
      <textarea type="text" name="locperson" placeholder="Loc/Person"></textarea>
    </th>
  </tr> -->

  <!---------------------------------------------------------------------------------------------------------------->
  <!-- <tr>
    <th colspan="100">Other Information</th>
  </tr>
  <tr>
    <th colspan="100">
      <p>
        <input type="text" name="" placeholder="Any Other Information" />
      </p>
    </th>
  </tr> -->

  <!---------------------------------------------------------------------------------------------------------------->
  <!-- <tr>
    <th colspan="100" align="left">Signature: </th>
  </tr> -->
</table>
<br>
<div align="center">
  <input type="submit" name="update" value="UPDATE" style="background-color: #4CAF50; border: none; color: white; padding: 12px 25px; text-align: center;
  text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; transition-duration: 0.4s; cursor: pointer;" />
</div>
</form>
</body>
</html>

<!--------------------------PHP CODE-------------------------------------------------->