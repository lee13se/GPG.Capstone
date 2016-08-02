<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php 
$header_page_id = "production";
$header_subpage_id = "production_traveler";
?>

<?php include('Includes/header.php'); ?>
</head>

<?php
$SalesOrderNum = $_GET[salesOrderNum];

if ($SalesOrderNum > 0 )
{	
	$results = mysql_query("SELECT 
					   		SalesOrderNum
					   FROM
					   		Sales_Order 
					   WHERE
					   		SalesOrderNum = '".$SalesOrderNum."';");

	while($row = mysql_fetch_array($results))
	{
		extract($row);
		echo('Sales Order Number = '.$SalesOrderNum);
	}
}
?>


<!-- Used for live search -->
<script type="text/javascript">
function showResult(str)
{
if (str.length==0)
  {
  document.getElementById("livesearch").innerHTML="";
  document.getElementById("livesearch").style.border="0px";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
xmlhttp.open("GET","/Includes/SOlivesearch.php?so="+str,true);
xmlhttp.send();
}
</script>
<!-- End Script used for live search -->

<body>
<table width="1024" border="0">
  <tr>
    <td width="100">&nbsp;</td>
    <td width="250">&nbsp;</td>
    <td width="250">&nbsp;</td>
    <td width="250">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="100">&nbsp;</td>
    <td width="250"><p>Sales Order</p></td>
    <td width="250">Client</td>
    <td width="250">Part</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="100">&nbsp;</td>
    <td width="250">
    <form>
      <input type="int" size="30" onkeyup="showResult(this.value)" />
      <div id="livesearch"></div>
    </form>
    </td>
    <td width="250"><input name="OrderNumber" type="text" id="OrderNumber" size="30" maxlength="45" /></td>
    <td width="250"><input name="PartNumber" type="text" id="PartNumber" size="30" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="100">&nbsp;</td>
    <td width="250">&nbsp;</td>
    <td width="250">&nbsp;</td>
    <td width="250">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>






</body>
<?php include('Includes/footer.php'); ?>
</html>