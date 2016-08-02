<?php
/* 
 Edit.PHP
 Allows user to edit an entry in the database
*/
 
 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($EmployeeNum, $EmployeeFirstName, $EmployeeLastName, $EmployeeMiddleName, $ActiveEmployee, $EmployeeNamePrefix, $EmployeeNameSuffix, $PhoneNumber, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Edit Employee</title>
 
 	<script type="text/javascript" src="Includes/jquery/jquery.js"></script> 
 
	<script type="text/javascript" src="Includes/jquery/jquery.alphanumeric.pack.js"></script>  
 
 
 
 </head>
	<?php 
		$header_page_id = "advanced";
		$header_subpage_id = "edit_employees";
	?>
 
 	<?php include('Includes/header.php');?>

 <body>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 
 
 
 echo "<script>";
 echo "var error='".$error."';"; 
 echo "alert(error)";
 echo "</script>";


}
 ?> 
 
 

<form action="" method="post">
   
 <table width="1024" align = "left"  border="0">
  <tr>
  	<td width="150">&nbsp;</td>
    <td width="50">&nbsp;</td>
    <td width="120">&nbsp;</td>
    <td width="120">&nbsp;</td>
    <td width="120">&nbsp;</td>
    <td width="50">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Prefix</td>
    <td>First Name</td>
    <td>Middle Name</td>
    <td>Last Name</td>
    <td>Suffix</td>
  </tr>

  <tr>
    <td align="right"><strong>New Employee</strong></td>
    <td><input name="EmployeeNamePrefix" id="EmployeeNamePrefix" maxvalue="<?php echo $EmployeeNamePrefix;?>" size="5" maxlength="45"></td>
    <td><input name="EmployeeFirstName" type="name" class="char tb" id="EmployeeFirstName" value="<?php echo $EmployeeFirstName; ?>" maxlength="45" tabindex="1"></td>
    <td><input name="EmployeeMiddleName" type="text" class="char tb" id="EmployeeMiddleName" value="<?php echo $EmployeeMiddleName; ?>" tabindex="1"></td>
    <td><input name="EmployeeLastName" type="text" class="char tb" id="EmployeeLastName" value="<?php echo $EmployeeLastName; ?>" maxlength="45" tabindex="1"></td></td>
    <td><input name="EmployeeNameSuffix" id="EmployeeNameSuffix" value="<?php echo $EmployeeNameSuffix;?>" size="5" maxlength="45"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>    
    <td>&nbsp;</td>
    <td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Phone Number:</strong>&nbsp;</td>
    <td>
     	<input type="text" name="PhoneNumber" id="PhoneNumber" value = "<?php echo $PhoneNumber; ?>">
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Active</strong></td>
    <td><input type="checkbox" name="ActiveEmployee" id="ActiveEmployee" Value = "1" <?php if($ActiveEmployee != 0)																					echo "checked";?>
	tabindex="-1"/></td>
    <td>&nbsp;</td>
    <td></td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name = "submit" value = "Save" tabindex="-1"/>
       <input type="button" value="Cancel" onClick="history.go(-1);return true;" tabindex="-1"/>
	</td>
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
</table>
</form>


<script type="text/javascript"> 
 
 
 
$('.vcode').click(function(){$(this).next().toggle('slow'); return false;});
 
 
 
$('.sample1').alphanumeric();
 
$('.sample2').alphanumeric({allow:"., "});
 
$('.characteronly').alpha();

$('.char').alpha({allow:"., -_"});
 
$('.sample4').numeric();
 
$('.sample5').numeric({allow:"."});
 
$('.sample6').alphanumeric({ichars:'.1a'});
 
 
 
 
 
</script> 
 
 
 <?php include('Includes/footer.php'); ?>
 
 </body>
 </html>
 
 
<?php
 

 }

 // connect to the database
include('Includes/Dbconnect.php');
include('Includes/functions.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 	
	 // confirm that the 'id' value is a valid integer before getting the form data
	 if (is_numeric($_GET['EmployeeNum']))
	 {
		 //echo "EmployeeNum = ".$_POST['EmployeeNum']."<br />";
		 // get form data, making sure it is valid
		 $EmployeeNum = $_GET['EmployeeNum'];
		 $EmployeeFirstName = mysql_real_escape_string(htmlspecialchars($_POST['EmployeeFirstName']));
		 $EmployeeLastName = mysql_real_escape_string(htmlspecialchars($_POST['EmployeeLastName']));
		 
	 
		 // check that firstname/lastname fields are both filled in
		 if ($EmployeeFirstName == '' || $EmployeeLastName == '')
		 {
			 // generate error message
			 $error = 'ERROR: Please fill in all required fields!';
			 
			 //error, display form
			 renderForm($EmployeeNum, $EmployeeFirstName, $EmployeeLastName, $EmployeeMiddleName,
						$ActiveEmployee, $EmployeeNamePrefix, $EmployeeNameSuffix, $error);
		 }
		 else
		 {
			 
			  
			  
			  
			  
			  
			  $EmployeeMiddleName = mysql_real_escape_string(htmlspecialchars($_POST['EmployeeMiddleName']));
			  $EmployeeNamePrefix = mysql_real_escape_string(htmlspecialchars($_POST['EmployeeNamePrefix']));
			  $EmployeeNameSuffix = mysql_real_escape_string(htmlspecialchars($_POST['EmployeeNameSuffix']));
			  $ActiveEmployee = mysql_real_escape_string(htmlspecialchars($_POST['ActiveEmployee']));
			  $PhoneNumber = mysql_real_escape_string(htmlspecialchars($_POST['PhoneNumber']));

			 
			 // save the data to the database
			 mysql_query("UPDATE Employee
						 SET EmployeeFirstname='$EmployeeFirstName', EmployeeLastName='$EmployeeLastName',
							EmployeeMiddleName = '$EmployeeMiddleName', EmployeeNamePrefix = '$EmployeeNamePrefix',
							EmployeeNameSuffix = '$EmployeeNameSuffix', ActiveEmployee = '$ActiveEmployee', PhoneNumber = 					'$PhoneNumber'
						WHERE EmployeeNum='$EmployeeNum'")
			 or die(mysql_error()); 
			 
			
			 
			 
			 // once saved, redirect back to the view page
				header("Location: ViewActiveEmployees.php"); 
			 }
	 }
 else
 {
	 // if the 'id' isn't valid, display an error
	 echo 'Error!';
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
	 
	 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
	 if (isset($_GET['EmployeeNum']) && is_numeric($_GET['EmployeeNum']) && $_GET['EmployeeNum'] > 0)
	 {
		 // query db
		 $EmployeeNum = $_GET['EmployeeNum'];
		 $result = mysql_query("SELECT * FROM Employee WHERE EmployeeNum='$EmployeeNum'")
		 or die(mysql_error()); 
		 $row = mysql_fetch_array($result);
		 
		 // check that the 'id' matches up with a row in the databse
		 if($row)
		 {
		 
			 // get data from db
			 $EmployeeFirstName = $row['EmployeeFirstName'];
			 $EmployeeLastName = $row['EmployeeLastName'];
			 $EmployeeMiddleName = $row["EmployeeMiddleName"];
			 $ActiveEmployee = $row['ActiveEmployee'];
			 $EmployeeNamePrefix	= $row["EmployeeNamePrefix"];	
			 $EmployeeNameSuffix = $row["EmployeeNameSuffix"];
			 $PhoneNumber = $row["PhoneNumber"];
			
			 
			 // show form
			 renderForm($EmployeeNum, $EmployeeFirstName, $EmployeeLastName, $EmployeeMiddleName,
						$ActiveEmployee, $EmployeeNamePrefix, $EmployeeNameSuffix, $PhoneNumber, '');
		 }
		 else
		 // if no match, display result
		 {
			echo "No results!";
		 }
	 }
	 else
	 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
	 {
		echo 'Error!';
	 }
 }
?>