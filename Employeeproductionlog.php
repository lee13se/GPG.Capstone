<script type="text/javascript">

function disableField1(obj) {
   var textField = document.getElementById("Quantity1");
   if (obj.value == "1") {
      textField.disabled = true;
   }
   else {
      textField.disabled = false;
   }


}

function disableField2(obj) {
   var textField = document.getElementById("Quantity2");
   if (obj.value == "1") {
      textField.disabled = true;
   }
   else {
      textField.disabled = false;
   }


}


function disableField3(obj) {
   var textField = document.getElementById("Quantity3");
   if (obj.value == "1") {
      textField.disabled = true;
   }
   else {
      textField.disabled = false;
   }


}

function disableField4(obj) {
   var textField = document.getElementById("Quantity4");
   if (obj.value == "1") {
      textField.disabled = true;
   }
   else {
      textField.disabled = false;
   }


}


function disableField5(obj) {
   var textField = document.getElementById("Quantity5");
   if (obj.value == "1") {
      textField.disabled = true;
   }
   else {
      textField.disabled = false;
   }


}

function disableField6(obj) {
   var textField = document.getElementById("Quantity6");
   if (obj.value == "1") {
      textField.disabled = true;
   }
   else {
      textField.disabled = false;
   }


}






</script>
<?php
/* 
 NEW.PHP
 Allows user to create a new entry in the database
*/
 
 // creates the new record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($PartNum, $EmployeeNum, $SalesOrderNum, $error)
 {
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Production Log</title>
<?php 
$header_page_id = "production";
$header_subpage_id = "employee_logs";
include('Includes/header.php'); ?>
<?php include('Includes/LogAddRow.php');?>
<?php 
$header_page_id = "production";
$header_subpage_id = "employee_logs";
?>
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

function showResult2(str, str2)
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
  xmlhttp.open("GET","/Includes/LiveSearch/SOlivesearch.php?so="+str+"&q="+str2,true);
xmlhttp.send();
}
</script>
<!-- End Script used for live search -->
<?php
if ($error != '')
 {
 
 
 
 echo "<script>";
 echo "var error='".$error."';"; 
 echo "alert(error)";
 echo "</script>";


}
 ?> 

<?php
//get clientid from URL
$EmployeeNum = $_GET['EmployeeNum']; 
$results = "";

//if clientNum is not blank, QUERY IT!!!!
if($EmployeeNum != "")
{
	$results = mysql_query("SELECT * FROM Employee WHERE EmployeeNum=".$EmployeeNum);
	

//Extract all the tasty data from the query
while($row = mysql_fetch_array($results))
{
	extract ($row);
}
}//and display the tasty data, if ClientNum is blank, go to the bottom of this page

?>

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





<body>

    <form method="post" action="">
<table width="1000" height="" border="0" align = "left">

  <td width="50">&nbsp;</td>
  <td width="150" align="right" valign="bottom"><strong>Employee:</strong></td>

      
      <td width="200" valign="bottom">
      <input name="EmployeeName" value = "<?php echo($EmployeeFirstName."".$EmployeeLastName)?>" type="text" id="EmployeeName" size="30"onkeyup="showResult(this.value)" />
        <div id="livesearch">
        </div>
        </td>
      <td width="50">&nbsp;</td>
      <td width="150">&nbsp;</td> 
      <input type="hidden" name="PartNum" id="PartNum" value = "<?php echo $PartNum;?>" >
      <input type="hidden" name="EmployeeNum" id="EmployeeNum" value = "<?php echo $EmployeeNum;?>" >
      <td width="">&nbsp;</td>
      <td width="">&nbsp;</td>
      <td width=""><?php help('newEmpLog'); ?></td>
      
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="" align="right"><strong>Search Order: </strong></td>
        <td width="" valign="middle">
        <?php 
	  //echo ("<option value =\"".$RawMaterialID.",".$row."\" id =\"".$row['Diameter']."\"selected>".$row['Diameter']."</option>\n");
	  if(isset($EmployeeNum)){
	
	echo ('<input type="int" name = "SalesOrderNum" size="30" onkeyup="showResult2(this.value,'.$EmployeeNum.')"value = "'.$SalesOrderNum.'" >');
	  }
	 
	
	  else{
		   
		 echo ('<input type="int" name = "SalesOrderNum" size="30" disabled = "disabled"');
	 
	  
	  
	  
	  }
		   ?>
                
                <div id="livesearch2"></div>
        </td>        
        <td>&nbsp;</td>
        <td width="" align="right"><strong>Daily Hours: </strong></td>
        <?php
				
				if(isset($EmployeeNum)){
					$query = ("Select * from Production_Log_Line where EmployeeNum = $EmployeeNum and Date = Curdate()");
					
					$DailyHours = 0;
						$result = mysql_query($query) or die ('Error: '.mysql_error());
						
						while($row = mysql_fetch_array($result)){
								$Hours = $row['Hours'];
								//echo $Hours;
								$DailyHours = $DailyHours + $Hours;
								//echo $DailyHours;
						}
				}
			?> 
					
            	
				
		
        <td width=""><?php echo $DailyHours;?></td>
        <td width="" align="left">&nbsp;</td>
        <td width="">&nbsp;</td>
      
        
      </tr>
        <tr>
          <td height="">&nbsp;</td>
          <td align="right"><strong>Part Number:</strong></td>
          <td>
          
          <?php 
    
	if(isset($SalesOrderNum)){
	
	$query = ("Select * from Part_Info where PartNum = $PartNum");
	       
		   $result = mysql_query($query) or die ('Error: '.mysql_error ());
		  
		   while($row = mysql_fetch_array($result)){
           $OldPartNum = $row['OldPartNum'];
		   }
	echo ('<input name="PartNumber" type="text" id="PartNumber" size="15" readonly="readonly" value = "'.$OldPartNum.'" />');
	
	}
	
	else{
		
		echo ('<input name="PartNumber" type="text" id="PartNumber" size="15" disabled="disabled" value = "'.$OldPartNum.'" />');
		
	}
	?>
          
          </td>
            <td>&nbsp;</td>
            <td align = "right"><strong>Date</strong></td>
            <td><?php echo(date(Y)."-".date(m)."-".date(d));?></td>           
            <td>&nbsp;</td>
            <td>&nbsp;</td>

          </tr>
          <tr>
              <td height="">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              
              </tr>
              
                
                  <tr>
                    <td height="21">&nbsp;</td>
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
                      <td colspan="5" rowspan="" align="center">
                      <table height="28" border="1" id="TitleProductionLog">
                        <tr>
                          <td width="170"><strong> Operation</strong></td>
                          <td width="70"><strong> Setup</strong></td>
                          <td width="80"><strong>Quantity</strong></td>
                          <td width="60"><strong>Hours</strong></td>
                          <td width="250"><strong>Notes</strong></td>
                        </tr>
                        </table>      
                        <table border="1" id="ProductionLogTable" >
                          <tr>
                            <td width="170" align="left"><select name = "Operation[]">
                              <option value = "" selected></option>
							  <?php
	  
	  if($PartNum != ""){
	  $query = "select Operations.OperationName, Operations.OperationLineId,(select PartNum from Part_Info where PartNum = $PartNum) as PartNum from Operations where Operations.PartNum = $PartNum";
			$result = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_array($result)){
           $OperationsLineId = $row['OperationsLineId'];
		  echo ("<option value =\"".$row['OperationsLineId']."".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");
    
			
			
			
			
			}	
		
	  }
	?>
                            </select></td>
                            <td width="70"><input type="checkbox" name="Setup[]" id="Setup[]" alignn = "center" value = "1" onChange="disableField1(this)" ></td>
                            <td width="80"><input name="Quantity[]" type="text" id="Quantity1" size="8" ></td>
                            <td width="60"><input name="Hours[]" type="text" id="Hours[]" size="4" ></td>
                            <td width="250"><input name="Notes[]" type="text" id="Notes[]" size="35" /></td>
                          </tr>
                          <tr>
                            <td align="left"><select name = "Operation[]">
                              <option value = "" selected></option>
							  <?php
	  
	  if($PartNum != ""){
	  $query = "select Operations.OperationName, Operations.OperationLineId,(select PartNum from Part_Info where PartNum = $PartNum) as PartNum from Operations where Operations.PartNum = $PartNum";
			$result = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_array($result)){
           $OperationsLineId = $row['OperationsLineId'];
		  echo ("<option value =\"".$row['OperationsLineId']."".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");
    
			
			}	
		
	  }
	?>
                            </select></td>
                            <td width="20"><input type="checkbox" name="Setup[]" id="Setup[]" align = "center" value = "1" ></td>
                            <td><input name="Quantity[]" type="text" id="Quantity2" size="8"onchange= "disableField2(this)" ></td>
                            <td><input name="Hours[]" type="text" id="Hours[]" size="4" ></td>
                            <td><input name="Notes[]" type="text" id="Notes[]" size="35" /></td>
                          </tr>
                          <tr>
                            <td align="left"><select name = "Operation[]">
                              <option value = "" selected></option>
							  <?php
	  
	  if($PartNum != ""){
	  $query = "select Operations.OperationName, Operations.OperationLineId,(select PartNum from Part_Info where PartNum = $PartNum) as PartNum from Operations where Operations.PartNum = $PartNum";
			$result = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_array($result)){
           $OperationsLineId = $row['OperationsLineId'];
		  echo ("<option value =\"".$row['OperationsLineId']."".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");
    
			
			}	
		
	  }
	?>
                            </select></td>
                            <td width="20"><input type="checkbox" name="Setup[]" id="Setup[]" align = "center" value = "1"onchange="disableField3(this)" /></td>
                            <td><input name="Quantity[]" type="text" id="Quantity3" size="8" ></td>
                            <td><input name="Hours[]" type="text" id="Hours[]" size="4" ></td>
                            <td><input name="Notes[]" type="text" id="Notes[]" size="35" /></td>
                          </tr>
                          <tr>
                            <td align="left"><select name = "Operation[]">
                              <option value = "" selected></option>
							  <?php
	  
	  if($PartNum != ""){
	  $query = "select Operations.OperationName, Operations.OperationLineId,(select PartNum from Part_Info where PartNum = $PartNum) as PartNum from Operations where Operations.PartNum = $PartNum";
			$result = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_array($result)){
           $OperationsLineId = $row['OperationsLineId'];
		  echo ("<option value =\"".$row['OperationsLineId']."".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");
    
			
			}	
		
	  }
	?>
                            </select></td>
                            <td width="20"><input type="checkbox" name="Setup[]" id="Setup[]" align = "center" value = "1"onchange="disableField4(this)"/></td>
                            <td><input name="Quantity[]" type="text" id="Quantity4" size="8" ></td>
                            <td><input name="Hours[]" type="text" id="Hours[]" size="4" ></td>
                            <td><input name="Notes[]" type="text" id="Notes[]" size="35" /></td>
                          </tr>
                          <tr>
                            <td align="left"><select name = "Operation[]">
                              <option value = "" selected></option>
							  <?php
	  
	  if($PartNum != ""){
	  $query = "select Operations.OperationName, Operations.OperationLineId,(select PartNum from Part_Info where PartNum = $PartNum) as PartNum from Operations where Operations.PartNum = $PartNum";
			$result = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_array($result)){
           $OperationsLineId = $row['OperationsLineId'];
		  echo ("<option value =\"".$row['OperationsLineId']."".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");
    
			
			}	
		
	  }
	?>
                            </select></td>
                            <td width="20"><input type="checkbox" name="Setup[]" id="Setup[]" align = "center" value = "1"onchange="disableField5(this)"/></td>
                            <td><input name="Quantity[]" type="text" id="Quantity5" size="8" ></td>
                            <td><input name="Hours[]" type="text" id="Hours[]" size="4" ></td>
                            <td><input name="Notes[]" type="text" id="Notes[]" size="35" /></td>
                          </tr>
                          <tr>
                            <td align="left"><select name = "Operation[]">
                              <option value = "" selected></option>
							  <?php
	  
	  if($PartNum != ""){
	  $query = "select Operations.OperationName, Operations.OperationLineId,(select PartNum from Part_Info where PartNum = $PartNum) as PartNum from Operations where Operations.PartNum = $PartNum";
			$result = mysql_query($query) or die(mysql_error());
			while($row = mysql_fetch_array($result)){
           $OperationsLineId = $row['OperationsLineId'];
		  echo ("<option value =\"".$row['OperationsLineId']."".$row['OperationName']."\" id =\"".$row['OperationName']."\">".$row['OperationName']."</option>\n");
    
			
			}	
		
	  }
	?>
                            </select></td>
                            <td width="20"><input type="checkbox" name="Setup[]" id="Setup[]" align = "center" value = "1"onchange="disableField6(this)"/></td>
                            <td><input name="Quantity[]" type="text" id="Quantity6" size="8" ></td>
                            <td><input name="Hours[]" type="text" id="Hours[]" size="4" ></td>
                            <td><input name="Notes[]" type="text" id="Notes[]" size="35" /></td>
                          </tr>
                      
                      </table>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                          <td>&nbsp;</td>
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                          <td align="center"><input type = "submit" name = "submit" value = "Save" /></td>
                          <td align="center">&nbsp;</td>
                          <td align="center">&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
 
</table>
</form>
</body>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<?php include('Includes/footer.php'); ?>

</html>
<?php 
 }
 
 
 

 // connect to the database
 
 include('Includes/functions.php');
 include('Includes/Dbconnect.php');
 
 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
 
 $selected = explode(',',$_POST['Operation']);
$OperationLineId = $selected[0];
$OperationName = $selected[1];
$SalesOrderNum = $_POST['SalesOrderNum'];
$EmployeeNum = $_POST['EmployeeNum'];
$PartNum = $_POST['PartNum'];
 // check to make sure both fields are entered
 if ($EmployeeNum == '')
 {
 $error = 'ERROR: Please fill in all required fields!';
 renderForm($PartNum, $EmployeeNum, $SalesOrderNum, $error);
 }elseif($SalesOrderNum == ''){
 $error = 'ERROR: Please fill in all required fields!';
 renderForm($PartNum, $EmployeeNum, $SalesOrderNum, $error);
 }elseif($PartNum == '') {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 // if either field is blank, display the form again
 renderForm($PartNum, $EmployeeNum, $SalesOrderNum, $error);
 }
 else
 {
$Quantity = $_POST['Quantity'];
$Operation = $_POST['Operation'];
$Hours = $_POST['Hours'];
$Date = date(Y)."-".date(m)."-".date(d);
$Notes = $_POST['Notes'];
$Setup = $_POST['Setup'];
$limit = count($Operation);


for( $i = 0; $i < $limit; $i++){

$Quantity[$i] = mysql_real_escape_string($Quantity[$i]);
$Hours[$i] = mysql_real_escape_string($Hours[$i]);
$Operation[$i] = mysql_real_escape_string($Operation[$i]);
$Notes[$i] = mysql_real_escape_string($Notes[$i]);
$Setup[$i] = mysql_real_escape_string($Setup[$i]);

if($Operation[$i] != ""){

	if($Setup[$i])
		$Setup[$i]=0;
	else
		$Setup[$i]=1;

$query= ("INSERT INTO Production_Log_Line (EmployeeNum, Operation, QuantityCompleted, SalesOrderNum, Date, Hours, Type, Notes) VALUES ('".$EmployeeNum."', '".$Operation[$i]."','".$Quantity[$i]."','".$SalesOrderNum."','".$Date."','".$Hours[$i]."','".$Setup[$i]."','".$Notes[$i]."')");

echo $query;
mysql_query($query) or die (mysql_error());


//if(mysql_query($query))
       //echo "Operation ".$i." successfully inserted.<br/>";
// else
     // echo "Operation ".$i." encountered an error.<br/>";

}
}

$originatingpage = "http://gpg.webritetech.com/Employeeproductionlog.php?EmployeeNum=" . $EmployeeNum . "";



echo '<script type="text/javascript">
//alert(\'Production Record Saved!\');
window.location = "'.$originatingpage.'";
</script>';
exit; 









//$error = 'Production Entry Saved!';



//mysql_close();


 
//header("Location: http://gpg.webritetech.com/Employeeproductionlog.php?EmployeeNum=" . $EmployeeNum . "");
 
 
 }
 }
 else
 // if the form hasn't been submitted, display the form
 {
 
 renderForm('','','','');
 }
?> 