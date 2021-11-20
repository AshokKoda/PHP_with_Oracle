<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
  border-collapse: collapse;
}
</style>
<body>
<form action="SheetLog.php" method="post">
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
        <input type="date" name="logdate" placeholder="dd/mm/yyyy" required />
      </div>
    </th>
    <th>
      SHIFT :
      <div>
        <select name="shift">
          <option value='' selected='selected'>-- Select Shift --</option>
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
        <input type="text" name="executive" placeholder="Exe Name" required />
      </div>
    </th>
    <!--BF1 Status-->
    <th>
      App Server-1:
      <div>
        <select name="bfappserver1">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      App Storage:
      <div>
        <select name="bfappstorage">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      XML:
      <div>
        <select name="bfxml">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      App Storage:
      <div>
        <select name="bf2appstorage">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      XML:
      <div>
        <select name="bf2xml">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      App Storage:
      <div>
        <select name="bf3appstorage">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      HS Model:
      <div>
        <select name="bf3hsmodel">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      DB Storage:
      <div>
        <select name="bfdbstorage">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      MIMIC:
      <div>
        <select name="bfmimic">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      DB Storage:
      <div>
        <select name="bf2dbstorage">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      MIMIC:
      <div>
        <select name="bf2mimic">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      DB Storage:
      <div>
        <select name="bf3dbstorage">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      sachem:
      <div>
        <select name="bf3sachem">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      Firewall:
      <div>
        <select name="bffirewall">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 HMI:
      <div>
        <select name="bfl2hmi">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      Firewall:
      <div>
        <select name="bf2firewall">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 HMI:
      <div>
        <select name="bf2l2hmi">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      Firewall:
      <div>
        <select name="bf3firewall">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      XML:
      <div>
        <select name="bf3xml">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      N/W Switch:
      <div>
        <select name="bfnwswitch">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L1 OPC Link:
      <div>
        <select name="bfl1opc">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      N/W Switch:
      <div>
        <select name="bf2nwswitch">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L1 OPC LINK:
      <div>
        <select name="bf2l1opc">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      N/W Switch:
      <div>
        <select name="bf3nwswitch">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      MIMIC:
      <div>
        <select name="bf3mimic">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 HMI PC:
      <div>
        <select name="bfl2hmipc">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 Services:
      <div>
        <select name="bfl2services">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 HMI PC:
      <div>
        <select name="bf2l2hmipc">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 Services:
      <div>
        <select name="bf2l2services">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 HMI PC:
      <div>
        <select name="bf3l2hmipc">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 HMI:
      <div>
        <select name="bf3l2hmi">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      BSH1 PC:
      <div>
        <select name="bfbhs1pc">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L3/ERP Link:
      <div>
        <select name="bfl3erp">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      BHS1 PC:
      <div>
        <select name="bf2bhs1pc">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L3/ERP Link:
      <div>
        <select name="bf2l3erp">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      LAB PC:
      <div>
        <select name="bf3labpc">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L1 OPC LINK:
      <div>
        <select name="bf3l1opclink">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      C/R L2 PC:
      <div>
        <select name="bfcrl2pc">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      BF1 Portal:
      <div>
        <select name="bfportal">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      C/R L2 PC:
      <div>
        <select name="bf2crl2">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      BF2 Portal:
      <div>
        <select name="bf2portal">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      C/R L2 PC:
      <div>
        <select name="bf3crl2">
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      L2 Services:
      <div>
        <select name="bf3l2service">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      Remote PC:
      <div>
        <select name="bfremotepc">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Ok">Ok</option>
          <option value="NotOk">Not Ok</option>
        </select>
      </div>
    </th>
    <th>
      Remote PC:
      <div>
        <select name="bf2remotepc">
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
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
          <option value='' selected='selected'>-- Not Select --</option>
          <option value="Running">Running</option>
          <option value="NotRunning">Not Running</option>
        </select>
      </div>
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
      <div>
        <input type="text" name="bf1temp" placeholder="BF1 Temp" />
      </div>
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
      <input type="text" name="bf1back" placeholder="BF1 Backup" />
    </th>
    <th colspan="3">
      <input type="text" name="bf2back" placeholder="BF2 Backup" />
    </th>
    <th colspan="3">
      <input type="text" name="bf3back" placeholder="BF3 Backup" />
    </th>
    <th colspan="3" align="left">
      Total Downtime:
      <input type="text" name="downtime"  />
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
      <input type="text" name="pmremarks" placeholder="Remarks" />
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
      <input type="text" name="sno" placeholder="s.no" />
    </th>
    <th colspan="1">
      <input type="text" name="person" placeholder="Person" />
    </th>
    <th colspan="3">
      <textarea type="text" name="dess" placeholder="Problem Description"></textarea>
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
      <input type="text" name="curemarks" placeholder="Remarks" />
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
      <input type="number" name="ssno" placeholder="S.no" />
    </th>
    <th align="left" colspan="">
      Loc/Person
      <input type="text" name="locperson1" placeholder="Loc/Person" />
    </th>
    <th align="left" colspan="5">
      <textarea type="text" name="locperson2" placeholder="Loc/Person"></textarea>
    </th>
    <th align="left" colspan="5">
      <textarea type="text" name="locperson3" placeholder="Loc/Person"></textarea>
    </th>
  </tr>

  <!---------------------------------------------------------------------------------------------------------------->
  <tr>
    <th colspan="100">Other Information</th>
  </tr>
  <tr>
    <th colspan="100">
      <p>
        <input type="text" name="information" placeholder="Any Other Information" />
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
  <input type="submit" name="submit" value="Submit" style="background-color: #4CAF50; border: none; color: white; padding: 12px 25px; text-align: center;
  text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; transition-duration: 0.4s; cursor: pointer;" />
</div>
</form>
</body>
</html>

<!--------------------------PHP CODE-------------------------------------------------->
<?php
$conn=oci_connect("LOGDB","0000","localhost:1521/XE");
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

if(isset($_POST['submit']))
{
    $logdate = $_POST['logdate'];
    $executive = $_POST['executive'];
    $shift = $_POST['shift'];
    $bfappserver1 = $_POST['bfappserver1'];
    $bfappstorage = $_POST['bfappstorage'];
    $bfxml = $_POST['bfxml'];
    $bfappserver2 = $_POST['bfappserver2'];
    $bfdbstorage = $_POST['bfdbstorage'];
    $bfmimic = $_POST['bfmimic'];
    $bfdbserver1 = $_POST['bfdbserver1'];
    $bffirewall = $_POST['bffirewall'];
    $bfl2hmi = $_POST['bfl2hmi'];
    $bfdbserver2 = $_POST['bfdbserver2'];
    $bfnwswitch = $_POST['bfnwswitch'];
    $bfl1opc = $_POST['bfl1opc'];
    $bfdcserver1 = $_POST['bfdcserver1'];
    $bfl2hmipc = $_POST['bfl2hmipc'];
    $bfl2services = $_POST['bfl2services'];
    $bfdcserver2 = $_POST['bfdcserver2'];
    $bfbhs1pc = $_POST['bfbhs1pc'];
    $bfl3erp = $_POST['bfl3erp'];
    $bfdevpc = $_POST['bfdevpc'];
    $bfcrl2pc = $_POST['bfcrl2pc'];
    $bfportal = $_POST['bfportal'];
    $bflabpc = $_POST['bflabpc'];
    $bfremotepc = $_POST['bfremotepc'];

    //BF2 Status
    $bf2appserver1 = $_POST['bf2appserver1'];
    $bf2appstorage = $_POST['bf2appstorage'];
    $bf2xml = $_POST['bf2xml'];
    $bf2appserver2 = $_POST['bf2appserver2'];
    $bf2dbstorage = $_POST['bf2dbstorage'];
    $bf2mimic = $_POST['bf2mimic'];
    $bf2dbserver1 = $_POST['bf2dbserver1'];
    $bf2firewall = $_POST['bf2firewall'];
    $bf2l2hmi = $_POST['bf2l2hmi'];
    $bf2dbserver2 = $_POST['bf2dbserver2'];
    $bf2nwswitch = $_POST['bf2nwswitch'];
    $bf2l1opc = $_POST['bf2l1opc'];
    $bf2dcserver1 = $_POST['bf2dcserver1'];
    $bf2l2hmipc = $_POST['bf2l2hmipc'];
    $bf2l2services = $_POST['bf2l2services'];
    $bf2dcserver2 = $_POST['bf2dcserver2'];
    $bf2bhs1pc = $_POST['bf2bhs1pc'];
    $bf2l3erp = $_POST['bf2l3erp'];
    $bf2webserver = $_POST['bf2webserver'];
    $bf2crl2 = $_POST['bf2crl2'];
    $bf2portal = $_POST['bf2portal'];
    $bf2devpc = $_POST['bf2devpc'];
    $bf2remotepc = $_POST['bf2remotepc'];
    $bf2labpc = $_POST['bf2labpc'];


    //BF3 Status
    $bf3appserver1 = $_POST['bf3appserver1'];
    $bf3appstorage = $_POST['bf3appstorage'];
    $bf3hsmodel = $_POST['bf3hsmodel'];
    $bf3appserver2 = $_POST['bf3appserver2'];
    $bf3dbstorage = $_POST['bf3dbstorage'];
    $bf3sachem = $_POST['bf3sachem'];
    $bf3dbserver1 = $_POST['bf3dbserver1'];
    $bf3firewall = $_POST['bf3firewall'];
    $bf3xml = $_POST['bf3xml'];
    $bf3dbserver2 = $_POST['bf3dbserver2'];
    $bf3nwswitch = $_POST['bf3nwswitch'];
    $bf3mimic = $_POST['bf3mimic'];
    $bf3dcserver1 = $_POST['bf3dcserver1'];
    $bf3l2hmipc = $_POST['bf3l2hmipc'];
    $bf3l2hmi = $_POST['bf3l2hmi'];
    $bf3dcserver2 = $_POST['bf3dcserver2'];
    $bf3labpc = $_POST['bf3labpc'];
    $bf3l1opclink = $_POST['bf3l1opclink'];
    $bf3webserver = $_POST['bf3webserver'];
    $bf3crl2 = $_POST['bf3crl2'];
    $bf3l2service = $_POST['bf3l2service'];
    $bf3devpc = $_POST['bf3devpc'];
    $bf3erp = $_POST['bf3erp'];
    $bf3portal = $_POST['bf3portal'];

    //BF LEVEL-2 Room Environment Status
    $bf1temp = $_POST['bf1temp'];
    $bf2temp = $_POST['bf2temp'];
    $bf3temp = $_POST['bf3temp'];
    $remarks = $_POST['remarks'];
    $bf1ac = $_POST['bf1ac'];
    $bf2ac = $_POST['bf2ac'];
    $bf3ac = $_POST['bf3ac'];
    $remarksac = $_POST['remarksac'];
    $bf1ups = $_POST['bf1ups'];
    $bf2ups = $_POST['bf2ups'];
    $bf3ups = $_POST['bf3ups'];
    $remarksups = $_POST['remarksups'];
    $bf1backup = $_POST['bf1backup'];
    $bf2backup = $_POST['bf2backup'];
    $bf3backup = $_POST['bf3backup'];
    $remarksback = $_POST['remarksback'];
    $bf1back = $_POST['bf1back'];
    $bf2back = $_POST['bf2back'];
    $bf3back = $_POST['bf3back'];
    $downtime = $_POST['downtime'];

    //PMs Done
    $area = $_POST['area'];
    $device = $_POST['device'];
    $job = $_POST['job'];
    $abnormal = $_POST['abnormal'];
    $pmremarks = $_POST['pmremarks'];

    //PMs Done
    $sno = $_POST['sno'];
    $person = $_POST['person'];
    $dess = $_POST['dess'];
    $reptime = $_POST['reptime'];
    $acttime = $_POST['acttime'];
    $closetime = $_POST['closetime'];
    $curemarks = $_POST['curemarks'];

    //Other Jobs Done/ Taken Up
    $ssno = $_POST['ssno'];
    $locperson1 = $_POST['locperson1'];
    $locperson2 = $_POST['locperson2'];
    $locperson3 = $_POST['locperson3'];

    $information = $_POST['information'];

    $query = oci_parse($conn, "INSERT INTO logdata(logdate,executive,shift,bfappserver1,bfappstorage,bfxml,bfappserver2,bfdbstorage,bfmimic,bfdbserver1,bffirewall,bfl2hmi,bfdbserver2,bfnwswitch,bfl1opc,bfdcserver1,bfl2hmipc,bfl2services,bfdcserver2,bfbhs1pc,bfl3erp,bfdevpc,bfcrl2pc,bfportal,bflabpc,bfremotepc,bf2appserver1,bf2appstorage,bf2xml,bf2appserver2,bf2dbstorage,bf2mimic,bf2dbserver1,bf2firewall,bf2l2hmi,bf2dbserver2,bf2nwswitch,bf2l1opc,bf2dcserver1,bf2l2hmipc,bf2l2services,bf2dcserver2,bf2bhs1pc,bf2l3erp,bf2webserver,bf2crl2,bf2portal,bf2devpc,bf2remotepc,bf2labpc,bf3appserver1,bf3appstorage,bf3hsmodel,bf3appserver2,bf3dbstorage,bf3sachem,bf3dbserver1,bf3firewall,bf3xml,bf3dbserver2,bf3nwswitch,bf3mimic,bf3dcserver1,bf3l2hmipc,bf3l2hmi,bf3dcserver2,bf3labpc,bf3l1opclink,bf3webserver,bf3crl2,bf3l2service,bf3devpc,bf3erp,bf3portal,bf1temp,bf2temp,bf3temp,remarks,bf1ac,bf2ac,bf3ac,remarksac,bf1ups,bf2ups,bf3ups,remarksups,bf1backup,bf2backup,bf3backup,remarksback,bf1back,bf2back,bf3back,downtime,area,device,job,abnormal,pmremarks,sno,person,dess,reptime,acttime,closetime,curemarks,ssno,locperson1,locperson2,locperson3,information) 
    values ('$logdate','$executive','$shift','$bfappserver1','$bfappstorage','$bfxml','$bfappserver2','$bfdbstorage','$bfmimic','$bfdbserver1','$bffirewall','$bfl2hmi','$bfdbserver2','$bfnwswitch','$bfl1opc','$bfdcserver1','$bfl2hmipc','$bfl2services','$bfdcserver2','$bfbhs1pc','$bfl3erp','$bfdevpc','$bfcrl2pc','$bfportal','$bflabpc','$bfremotepc','$bf2appserver1','$bf2appstorage','$bf2xml','$bf2appserver2','$bf2dbstorage','$bf2mimic','$bf2dbserver1','$bf2firewall','$bf2l2hmi','$bf2dbserver2','$bf2nwswitch','$bf2l1opc','$bf2dcserver1','$bf2l2hmipc','$bf2l2services','$bf2dcserver2','$bf2bhs1pc','$bf2l3erp','$bf2webserver','$bf2crl2','$bf2portal','$bf2devpc','$bf2remotepc','$bf2labpc','$bf3appserver1','$bf3appstorage','$bf3hsmodel','$bf3appserver2','$bf3dbstorage','$bf3sachem','$bf3dbserver1','$bf3firewall','$bf3xml','$bf3dbserver2','$bf3nwswitch','$bf3mimic','$bf3dcserver1','$bf3l2hmipc','$bf3l2hmi','$bf3dcserver2','$bf3labpc','$bf3l1opclink','$bf3webserver','$bf3crl2','$bf3l2service','$bf3devpc','$bf3erp','$bf3portal','$bf1temp','$bf2temp','$bf3temp','$remarks','$bf1ac','$bf2ac','$bf3ac','$remarksac','$bf1ups','$bf2ups','$bf3ups','$remarksups','$bf1backup','$bf2backup','$bf3backup','$remarksback','$bf1back','$bf2back','$bf3back','$downtime','$area','$device','$job','$abnormal','$pmremarks','$sno','$person','$dess','$reptime','$acttime','$closetime','$curemarks','$ssno','$locperson1','$locperson2','$locperson3','$information')");

    $result = oci_execute($query);

        if ($result) {
            echo "<div class='alert alert-success'><b>Record was saved successfully!.</b></div>";
            exit();
        }
        else
        {
            echo "<div class='alert alert-success'><b>Unable to save record.</b></div>";
            exit();
        }
    }
?>