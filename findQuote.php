<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Find an Existing Quote</title>
<?php 
$header_page_id = "quote_order";
$header_subpage_id = "find_quote";
?>

</head>



<body>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


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
  xmlhttp.open("GET","/Includes/LiveSearch/ExistingQuote.php?q="+str,true);
xmlhttp.send();
}


</script>
<!-- End Script used for live search -->





<?php include('Includes/header.php');

//get clientid from URL
$ClientNum = $_GET['clientNum']; 
$quoteNum = $_POST['quoteNum'];

if($quoteNum == "")
	$quoteNum = $_GET['quoteNum'];
	
$results = "";
//echo ("quoteNum = ".$quoteNum);
if($quoteNum != "")
{
	?>
	<p align="right">
    <?php help('newQuoteSum'); ?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </p>
    <?php
	include('Includes/ViewQuote.php');
	printQuote($quoteNum);
	
	echo '<br /><br /><a href="/NewSalesOrder.php?quoteNum='.$quoteNum.'">
			<input name="" type="button" value="Create Sales Order From Quote" /></a>';
	
}
//if clientNum is not blank, QUERY IT!!!!
else if($ClientNum != "")
{
	$results = mysql_query("SELECT * FROM Client_Info WHERE ClientNum = ".$ClientNum.";");
	

	//Extract all the tasty data from the query
	while($row = mysql_fetch_array($results))
	{
		extract ($row);
		
		//and display the tasty data, if ClientNum is blank, go to the bottom of this page
		?>
		
<body>
<table width="850" border="0">
		  <tr>
			<td>&nbsp;</td>
			<td colspan="4"><strong><u>Client Information</u></strong>-&gt;Part Information -&gt; Review/Complete Quote</td>
			<td><?php help('ClientInfo'); ?></td>
		  </tr>
		  <tr>
			<td width="81">&nbsp;</td>
			<td width="232">&nbsp;</td>
			<td width="45">&nbsp;</td>
			<td width="141">&nbsp;</td>
			<td width="206">&nbsp;</td>
			<td width="114"><input type="submit" name="button2" id="button2" value="Part Information" /></td>
		  </tr>
		  <tr>
			<td><div align="right"><strong>Name: </strong></div></td>
			<td>
				<form>
				<input name="ClientName" type="text" id="ClientName" value="<?php echo($CompanyName);?>" onkeyup="showResult(this.value)" />
				<div id="livesearch"></div>
				</form>
		    </td>
			<td>&nbsp;</td>
			<td>    <div align="right"><strong>Active Customer: </strong></div></td>
			<td><?php if($CofC == 1){ echo("Yes");} else {echo("No");}?></td>
			<td><a href="../Part/ViewPart.htm">Part Information</a></td>
		  </tr>
		  <tr>
			<td><div align="right"><strong>Client ID: </strong></div></td>
			<td>
				
				
			
			  <form>
				<input name="ClientID" type="text" id="ClientID" value="<?php echo($OldCompanyID);?>" onkeyup="showResult2(this.value, 2)" />
				<div id="livesearch2"></div>
			  </form>
			</td>
			<td>&nbsp;</td>
			<td><div align="right"><strong>CofC: </strong></div></td>
			<td><?php if($CofC == 1){ echo("Yes");} else {echo("No");}?></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td><div align="right"><strong>Address: </strong></div></td>
			<td><?php echo($StreetLine1);?></td>
			<td>&nbsp;</td>
			<td><div align="right"><strong>Country: </strong></div></td>
			<td><?php echo($Country); ?></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td><div align="right"></div></td>
			<td><?php echo($StreetLine3); ?></td>
			<td>&nbsp;</td>
			<td><div align="right"><strong>Website: </strong></div></td>
			<td><?php echo($Website); ?></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td><div align="right"></div></td>
			<td><?php echo($City); ?></td>
			<td>&nbsp;</td>
			<td><div align="right"></div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td height="24"><div align="right"></div></td>
			<td><?php echo($State); ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td height="24"><div align="right"></div></td>
			<td><?php echo($Zip); ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td height="21"><div align="right"></div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td height="24"><div align="right"><strong>Terms: </strong></div></td>
			<td><?php echo($PaymentTerms); ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td height="21"><div align="right"></div></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td height="124"><div align="right"><strong>Notes: </strong></div></td>
			<td colspan="3"><?php echo($Notes); ?></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td>
			<a href="EditClient.php" title="Create New Client">
			<input type="submit" name="CreateNewClient" id="CreateNewClient" value="New" />
			</a></td>
			
			<td>	
				<a href="EditClient.php?clientNum=<?php echo($ClientNum); ?>" title="Create New Client">
				<input type="submit" name="EditClient" id="EditClient" value="Edit" />
				</a></td>
			</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td width="1">&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td width="45">&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		  </tr>
		</table>
<!-- View Qoute page-->
		
		
<?php }
}


//if ClientNum is not defined, present this to the user.
else
{  ?>
<!--First page user sees-->
<br/> 
    <br/>

<Table width="1024" border="0">
	<tr>
    	<td width="150">&nbsp;</td>
        <td width="200">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
   </tr>
   	<tr>
    	<td align="right" valign="bottom"><strong>Quote Number:</strong></td>
        <td valign="bottom">
        	<form name="input" action="/findQuote.php" method="post"> <input name="quoteNum" type="text" size="20" maxlength="11" />

		</td>
        <td valign="bottom"><input type="submit" value="submit" /></form></td>
        <td><?php help('existingQuote'); ?></td>
   </tr>
   	<tr>
    	<td align="right"><strong>Client:</strong></td>
        <td><form name="input" actoun="/findQuote2.php" method="post">
        <input name="ClientName" type="text" id="ClientName" value="<?php echo($CompanyName);?>" onkeyup="showResult(this.value)" />
		<div id="livesearch"></div>
        </form></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
   </tr>
   <tr>
    	<td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
   </tr>
</Table>






 <?php 
}
?>
</p>
<?php include('Includes/footer.php'); ?>
</body>
</html>








