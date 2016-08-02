<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ProductionLog</title>
</head>

<body>
<table width="1024" height="454" border="0">
  <tr>
    <td height="50" colspan="10"><div align="center"><font size='+6'>Employee Production Log</font></div></td>
  </tr>
  <tr>
    <td width="55" height="61">&nbsp;</td>
    <td width="146">&nbsp;</td>
    <td width="64">&nbsp;</td>
    <td width="68">Employee</td>
    <td colspan="2" align="center"><form id="Employee Name" name="Employee Name" method="post" action="">
      <input name="EmployeeName" type="text" id="EmployeeName" size="40" />
    </form></td>
    <td width="22">&nbsp;</td>
    <td width="77">&nbsp;</td>
    <td width="123">&nbsp;</td>
    <td width="48">Save and Exit</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="279">&nbsp;</td>
    <td>&nbsp;</td>
    <td>Daily Hours</td>
    <td>Total Work Units</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><form id="Daily Hours" name="Daily Hours" method="post" action="">
    </form></td>
    <td><form id="TotalWorkUnits" name="TotalWorkUnits" method="post" action="">
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Search Order Number </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Daily Percentage</td>
    <td><form id="DailyPercentage" name="DailyPercentage" method="post" action="">
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td><input type="text" name="SearchOrderNumber2" id="SearchOrderNumber2" /></td>
    <td><input type="submit" name="SearchSalesOrder" id="SearchSalesOrder" value="Search" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td colspan="8" rowspan="2" align="left"><table width="880" height="28" border="1" id="TitleProductionLog">
      <tr>
        <td width="145"><strong> Sales Order</strong></td>
        <td width="63"><strong> Date</strong></td>
        <td width="40"><strong>Setup</strong></td>
        <td width="300"><strong>Operation</strong></td>
        <td width="60"><strong>Quota</strong></td>
        <td width="60"><strong>Quantity</strong></td>
        <td width="60"><strong>Hour</strong></td>
        <td width="100"><strong>Production %</strong></td>
      </tr>
    </table>      <table width="880" border="1" id="ProductionLogTable">
        <tr>
          <td width="145"><input name="SalesOrder1" type="text" id="SalesOrder1" size="10" /></td>
          <td width="63">&nbsp;</td>
          <td width="40" align="center"><input type="checkbox" name="SetupOperation1" id="SetupOperation1" /></td>
          <td width="300"><form id="Operation1" name="Operation1" method="get" action="">
          </form></td>
          <td width="60"><form id="Quota1" name="Quota1" method="post" action="">
          </form></td>
          <td width="60"><input name="QuantityCompleted1" type="text" id="QuantityCompleted1" size="8" /></td>
          <td width="60"><input name="HoursWorkedOnOrder1" type="text" id="HoursWorkedOnOrder" size="8" /></td>
          <td width="100"><form id="ProductionPercent1" name="ProductionPercent1" method="post" action="">
          </form></td>
        </tr>
        <tr>
          <td width="145"><input name="SalesOrder2" type="text" id="SalesOrder2" size="10" /></td>
          <td>&nbsp;</td>
          <td align="center"><input type="checkbox" name="SetupOperation2" id="SetupOperation2" /></td>
          <td width="300"><form id="Operation2" name="Operation2" method="get" action="">
          </form></td>
          <td><form id="Quota2" name="Quota1" method="post" action="">
          </form></td>
          <td><input name="QuantityCompleted2" type="text" id="QuantityCompleted2" size="8" /></td>
          <td><input name="HoursWorkedOnOrder2" type="text" id="HoursWorkedOnOrder2" size="8" /></td>
          <td><form id="ProductionPercent2" name="ProductionPercent1" method="post" action="">
          </form></td>
        </tr>
        <tr>
          <td width="145"><input name="SalesOrder3" type="text" id="SalesOrder3" size="10" /></td>
          <td>&nbsp;</td>
          <td align="center"><input type="checkbox" name="SetupOperation3" id="SetupOperation3" /></td>
          <td width="300"><form id="Operation3" name="Operation3" method="get" action="">
          </form></td>
          <td><form id="Quota3" name="Quota1" method="post" action="">
          </form></td>
          <td><input name="QuantityCompleted3" type="text" id="QuantityCompleted3" size="8" /></td>
          <td><input name="HoursWorkedOnOrder3" type="text" id="HoursWorkedOnOrder3" size="8" /></td>
          <td><form id="ProductionPercent3" name="ProductionPercent1" method="post" action="">
          </form></td>
        </tr>
        <tr>
          <td width="145"><input name="SalesOrder4" type="text" id="SalesOrder4" size="10" /></td>
          <td>&nbsp;</td>
          <td align="center"><input type="checkbox" name="SetupOperation4" id="SetupOperation4" /></td>
          <td width="300"><form id="Operations4" name="Operations4" method="get" action="">
          </form></td>
          <td><form id="Quota4" name="Quota1" method="post" action="">
          </form></td>
          <td><input name="QuantityCompleted4" type="text" id="QuantityCompleted4" size="8" /></td>
          <td><input name="HoursWorkedOnOrder4" type="text" id="HoursWorkedOnOrder4" size="8" /></td>
          <td><form id="ProductionPercent4" name="ProductionPercent1" method="post" action="">
          </form></td>
        </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><input type="submit" name="AddLine" id="AddLine" value="Add Line" />
    <input type="submit" name="DeleteLine" id="DeleteLine" value="Del" /></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>Save and Exit</td>
  </tr>
</table>
</body>
</html>