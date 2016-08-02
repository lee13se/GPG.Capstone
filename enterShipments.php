<?php
/* 
 NEW.PHP
 Allows user to create a new entry in the database
*/
 
 // creates the new record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($SalesOrderNum, $DateRequested, $error)
 {
 ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enter Shipments</title>
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
  xmlhttp.open("GET","/Includes/LiveSearch/Namelivesearch.php?q="+str,true);
xmlhttp.send();
}

function showResult2(str)
{
if (str.length==0)
  {
  document.getElementById("livesearch2").innerHTML="";
  document.getElementById("livesearch2").style.border="0px";
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
    document.getElementById("livesearch2").innerHTML=xmlhttp.responseText;
    document.getElementById("livesearch2").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","/Includes/LiveSearch/SOlivesearchshipping.php?so="+str,true);
xmlhttp.send();
}
</script>
<!-- End Script used for live search -->

<script type="text/javascript" src="Includes/jquery/jquery.js"></script> 
 
	<script type="text/javascript" src="Includes/jquery/jquery.alphanumeric.pack.js"></script>  
<!-- End Script used for Input Masks -->

<?php
$SalesOrderNum = $_GET[salesOrderNum];

if ($SalesOrderNum > 0 )
{	
	$results = mysql_query("SELECT 
					   		SalesOrderNum, PartNum
					   
					   FROM
					   		Sales_Order 
					   WHERE
					   		SalesOrderNum = '".$SalesOrderNum."';");

	while($row = mysql_fetch_array($results))
	{
		extract($row);
}
}
?>


<?php
//$ShippingAddressID = $_GET[ShippingAddressID];


	$results = mysql_query("SELECT 
					   		ShippingAddressID, ShippingLogID
					   
					   FROM
					   		Shipping_Log 
					   WHERE
					   		SalesOrderNum = '".$SalesOrderNum."';");

	while($row = mysql_fetch_array($results))
	{
		extract($row);
	}

?>

</head>

<?php $header_page_id = "shipping";
	$header_subpage_id = "enter_shipments";?>

<?php include('Includes/header.php');?>
<br />
<br />
<br />
<body>

<form method = "post" action = ""> 
    <?php 
 $QuantityRequested = $_POST['QuantityRequested']; 
 $Query = "Select QuantityRequested from Shipping_Log Where DateRequested = $DateRequested";
 mysql_query($Query); 
?>

    
    <?php 
	
	if(isset($SalesOrderNum)){
	
	$query = ("Select * from Shipping_Address where ShippingAddressID = '".$ShippingAddressID."'");

		   $result = mysql_query($query) or die ('Error: '.mysql_error ());
		  
		   while($row = mysql_fetch_array($result)){
           		$AddressLine1 = $row['AddressLine1'];
		  		 $AddressLine2 = $row['AddressLine2'];
		  		 $AddressLine3 = $row['AddressLine3'];
				 $City = $row['City'];
				 $State = $row['State'];
				 $Zip = $row['Zip'];
				 $Country = $row['Country'];
				}
				
	
	}
	?>




<table width="1024" border="0">
  <tr>
    <td colspan="2" width="300" align="right"><strong>Order Number:</strong></td>
    <td><input name="SalesOrderNum" type="text" class="ordernumber tb" id="SalesOrderNum" maxlength="11" tabindex="1" value="<?php echo $SalesOrderNum;?>" onkeyup="showResult2(this.value)"/>
    <div id="livesearch2">
        </div></td>
    <td align="right" width="250"><strong>Shipping Address:</strong></td>
    <td><?php echo $AddressLine1;?></td>
  
    <td><?php help('Shipment'); ?></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><strong>Date Requested:</strong></td>
    <td width="79"> <select name = "DateRequested" onChange = "this.form.submit()"/>
      <option selected=""></option>
	  <?php  
	  		$SalesOrderNum = $_GET['salesOrderNum'];
			$DateRequested = $_POST['DateRequested'];
			
			if (isset($DateRequested)){
			
			echo ("<option value =\"".$DateRequested."\" id =\"".$DateRequested."\"selected>".$DateRequested."</option>\n");	
		
		
		}
			
			
		else{
			$query = "Select distinct DateRequested from Shipping_Log where SalesOrderNum = '$SalesOrderNum' order by DateRequested";
			$result = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_array($result)){
            $QuantityRequested = $row['QuantityRequested'];
		echo ("<option value =\"".$row['DateRequested']."\" id =\"".$row['DateRequested']."\">".$row['DateRequested']."</option>\n");
		  
		}
			}
		
		
	?>
  </select></td>
    <td width="209">&nbsp;</td>
    <td width="179"><?php echo $AddressLine2;?></td>
    <td width="373">&nbsp;</td>
    <td width="55">&nbsp;</td>
  </tr>
  <?php 
    
	if(isset($DateRequested)){
	
	$query = ("Select * from Shipping_Log where SalesOrderNum = '$SalesOrderNum' and DateRequested = '$DateRequested'");
	       
		   $result = mysql_query($query) or die ('Error: '.mysql_error ());
		  
		   while($row = mysql_fetch_array($result)){
			$QuantityRequested = $row['QuantityRequested'];
			$ShippingMethod = $row['ShippingMethod'];
			$Notes = $row['Notes'];
		    $ShippingLogID = $row['ShippingLogID'];
		   }

	}
	?> 
  <input type="hidden" value="<?php echo $ShippingLogID;?>" name="ShippingLogID" />
  <tr>
    <td colspan="2" align="right"><strong>Quantity Requested</strong></td>      
    <td><?php echo $QuantityRequested;?></td>
    <td>&nbsp;</td>
    <td><?php echo $AddressLine3;?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="right"><strong>Quantity Shipped</strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>    
    <td><?php echo $City.", ".$State?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="right"><strong>Shipping Method</strong></td>
    <td><?php echo $ShippingMethod?></td>
    <td>&nbsp;</td>
    <td><?php echo $Zip;?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="103" colspan="2" align="right"><strong>Notes:</strong></td>
    <td width="209" colspan="3"><?php echo $Notes?></td>
    <td width="55">&nbsp;</td>
  </tr>
  <tr>
    <td width="103">&nbsp;</td>
    <td width="79">&nbsp;</td>
    <td width="209">&nbsp;</td>
    <td width="179">&nbsp;</td>
    <td width="373">&nbsp;</td>
    <td width="55">&nbsp;</td>
   <tr>
    <td width="103">&nbsp;</td>
    <td colspan="4" align="center"><table border="1">
      <tr>
        <td width="150">Quantity Shipped</td>
        <td width="150">Weight Lbs.</td>
        <td width="300">Tracking Number</td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
<?php
	if($DateRequested == Null)
	{
    	$disabled = "disabled";
	}
       else
	   {
       	$disabled = "null";
        }	
  ?>
<!-- Test to see if Order Number and Date Requested are input, fields will be disabled until user inputs needed information-->
  
  
  
    <td width="103">&nbsp;</td>
    <td colspan="4" align="center"><table border="1">
      <tr>
        <td width="150"><input <?php echo $disabled?> name="Quantity[]" class="quantity tb" type="text" maxlength="11" size="15" /></td>
        <td width="150"><input <?php echo $disabled?> name="Weight[]" class="weight tb" type="text" size="20" maxlength="45"/></td>
        <td width="300"><input <?php echo $disabled?> name="Tracking[]" class="tracking tb" type="text" maxlength="45"/></td>
      </tr>
      <tr>
        <td width="150"><input <?php echo $disabled?> name="Quantity[]" class="quantity tb" type="text" maxlength="11" size="15" /></td>
        <td width="150"><input <?php echo $disabled?> name="Weight[]" class="weight tb" type="text" size="20" maxlength="45"/></td>
        <td width="300"><input <?php echo $disabled?> name="Tracking[]" class="tracking tb" type="text" maxlength="45"/></td>
      </tr>
      <tr>
        <td width="150"><input <?php echo $disabled?> name="Quantity[]" class="quantity tb" type="text" maxlength="11" size="15" /></td>
        <td width="150"><input <?php echo $disabled?> name="Weight[]" class="weight tb" type="text" size="20" maxlength="45"/></td>
        <td width="300"><input <?php echo $disabled?> name="Tracking[]" class="tracking tb" type="text" maxlength="45"/></td>
      </tr>
      <tr>
        <td width="150"><input <?php echo $disabled?> name="Quantity[]" class="quantity tb" type="text" maxlength="11" size="15" /></td>
        <td width="150"><input <?php echo $disabled?> name="Weight[]" class="weight tb" type="text" size="20" maxlength="45"/></td>
        <td width="300"><input <?php echo $disabled?> name="Tracking[]" class="tracking tb" type="text" maxlength="45"/></td>
      </tr>
      <tr>
        <td width="150"><input <?php echo $disabled?> name="Quantity[]" class="quantity tb" type="text" maxlength="11" size="15" /></td>
        <td width="150"><input <?php echo $disabled?> name="Weight[]" class="weight tb" type="text" size="20" maxlength="45"/></td>
        <td width="300"><input <?php echo $disabled?> name="Tracking[]" class="tracking tb" type="text" maxlength="45"/></td>
      </tr>
      <tr>
        <td width="150"><input <?php echo $disabled?> name="Quantity[]" class="quantity tb" type="text" maxlength="11" size="15" /></td>
        <td width="150"><input <?php echo $disabled?> name="Weight[]" class="weight tb" type="text" size="20" maxlength="45"/></td>
        <td width="300"><input <?php echo $disabled?> name="Tracking[]" class="tracking tb" type="text" maxlength="45"/></td>
      </tr>
    </table>
    <p>&nbsp;</p></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td width="103">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="submit_form" id="Save" value="submit" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="103">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="reset" name="clear" id="clear" value="clear" /></td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>

<script type="text/javascript">  
 
$('.vcode').click(function(){$(this).next().toggle('slow'); return false;}); 
 
$('.sample1').alphanumeric();
 
$('.sample2').alphanumeric({allow:"., "});
 
$('.characteronly').alpha();

$('.char').alpha({allow:"., -_"});
 
$('.sample4').numeric();
 
$('.ordernumber').numeric({allow:"- ."});
 
$('.sample6').alphanumeric({ichars:'.1a'}); 

$('.trackingnumber').alphanumeric();

$('.quantity').numeric();
 
$('.weight').numeric({allow:"."});
</script> 
<!--End Script for types of Input masks-->

</body>
<?php include('Includes/footer.php'); ?>
</html>
<!-- Posts quantity, tracking number and weight to data base-->
<?php 
 }

include('Includes/functions.php');
	include('Includes/Dbconnect.php');


	 // check if the form has been submitted. If it has, start to process the form and save it to the database
	if (isset($_POST['submit_form']))
 	{ 
 		// get form data, making sure it is valid
 
		$TrackingNumber = $_POST['Tracking'];
		$Weight = $_POST['Weight'];
		$Quantity = $_POST['Quantity'];
		$ShippingLogID = $_POST['ShippingLogID'];
		
		$limit = count($Quantity);
		
		for( $i = 0; $i < $limit; $i++){
			
$TrackingNumber[$i] = mysql_real_escape_string($TrackingNumber[$i]);
$Weight[$i] = mysql_real_escape_string($Weight[$i]);
$Quantity[$i] = mysql_real_escape_string($Quantity[$i]);
	if($Quantity[$i] != ""){
		
		$query= ("INSERT INTO Boxes_Shipped (TrackingNumber, Weight, Quantity, ShippingLogID) VALUES ('".$TrackingNumber[$i]."', '".$Weight[$i]."','".$Quantity[$i]."','".$ShippingLogID."')");
		
		echo($query);
		mysql_query($query) or die(mysql_error());
		mysql_close;
		}
		}
$originatingpage = "http://gpg.webritetech.com/enterShipments.php";



echo '<script type="text/javascript">
//alert(\'Production Record Saved!\');
window.location = "'.$originatingpage.'";
</script>';
exit; 
		

	}

	
	else 
 	// if the form hasn't been submitted, display the form
 	{
 
 		renderForm('', '', '');
 	}
?> 