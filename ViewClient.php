<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Client Information</title>

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
  xmlhttp.open("GET","/Includes/LiveSearch/LSViewClient.php?q="+str,true);
xmlhttp.send();
}

function showResult2(str)
{
if (str.length==0)
  {
  document.getElementById("livesearch3").innerHTML="";
  document.getElementById("livesearch3").style.border="0px";
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
    document.getElementById("livesearch3").innerHTML=xmlhttp.responseText;
    document.getElementById("livesearch3").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","/Includes/LiveSearch/LSViewClient2.php?q="+str,true);
xmlhttp.send();
}


</script>
<!-- End Script used for live search -->


</head>
<?php 
$header_page_id = "advanced";
$header_subpage_id = "search_customers";
?>


<?php include('Includes/header.php');


//get clientid from URL
$ClientNum = $_GET['clientNum']; 
$results = "";

//if clientNum is not blank, QUERY IT!!!!
if($ClientNum != "")
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
    <td colspan="4">&nbsp;</td>
    <td> 
    </td>
  </tr>
  <tr>
    <td width="81">&nbsp;</td>
    <td width="232">&nbsp;</td>
    <td width="45">&nbsp;</td>
    <td width="141">&nbsp;</td>
    <td width="206">&nbsp;</td>
    <td width="114">&nbsp;</td>
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
    <td><?php if($ActiveCustomer == 1){ echo("Yes");} else {echo("No");}?></td>
    <td>&nbsp;</td>
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
    <td><?php echo($StreetLine2); ?></td>
    <td>&nbsp;</td>
    <td><div align="right"><strong>Website: </strong></div></td>
    <td><?php echo($Website); ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><?php echo($StreetLine3); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="right"><strong>City:</strong></div></td>
    <td><?php echo($City); ?></td>
    <td>&nbsp;</td>
    <td><div align="right"></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24"><div align="right"><strong>State:</strong></div></td>
    <td><?php echo($State); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="24"><div align="right"><strong>Zip:</strong></div></td>
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
    	<a href="EditClient.php?clientNum=<?php echo($ClientNum); ?>&page=ViewClient" title="Create New Client">
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


<br />
<?php viewClientContacts($ClientNum); ?>
<br /><br />
<strong>Shipping Address:</strong>
<br />

<?php
 $result = mysql_query("SELECT * FROM Shipping_Address WHERE ClientNum = ".$ClientNum."") 
                or die(mysql_error());  
      
	  echo "<table border='1' cellpadding='0'>";
	   while($row = mysql_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                $shippingAddressID = $row['ShippingAddressID'];
				echo '<tr>';
				echo '<td>';
					echo "<input name='shippingAddress' value=".$shippingAddressID." type='radio' />";
				echo '</td>';
				echo '<td>';
					shippingAddress($shippingAddressID);
				echo '</td>';
                echo '</tr>'; 
        } 

        // close table>
        echo "</table> <br />";
		echo '<a href="editShippingAdd.php?&clientNum='.$ClientNum.'" ><input type="submit" value="New Shipping Address"/></a>';
	  ?>



<?php }
}

//if ClientNum is not defined, present this to the user.
else
{  ?>
<br/>
<br/>	
<br/>
	<table width="400" border="0">
  <tr>
  	<td><div align="right"><strong>Name: </strong></div></td
    ><td>
		<form>
        <input name="ClientName" type="text" id="ClientName" value="<?php echo($CompanyName);?>" onkeyup="showResult(this.value)" />
		<div id="livesearch"></div>
        </form>
	</td>
  </tr>
  <tr>
    <td><div align="right"><strong>Client ID: </strong></div></td>
    <td><form>
      <input name="ClientID2" type="text" id="ClientID2" value="<?php echo($OldCompanyID);?>" onkeyup="showResult2(this.value)" />
      <div id="livesearch3"></div>
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    	<a href="EditClient.php" title="Create New Client">
   		<input type="submit" name="CreateNewClient" id="CreateNewClient" value="New Client" />	</a>
    </td>
    <td>&nbsp;</td>
  </tr>
</table>

<?php 
}
?>


<?php include('Includes/footer.php'); ?>

</body>
</html>