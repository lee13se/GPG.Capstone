<?php
/* 
 NEW.PHP
 Allows user to create a new entry in the database
*/
 
 // creates the new record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($EmployeeFirstName, $EmployeeLastName, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>New Record</title>
 
<script type="text/javascript" src="Includes/jquery/jquery.js"></script> 
 
<script type="text/javascript" src="Includes/jquery/jquery.alphanumeric.pack.js"></script>  
 
 
 </head>
 
 


 
 
 <?php
$link = 1;
$header_page_id = "";
include('Includes/header.php');
?>
 
<?php 
$header_page_id = "advanced";
$header_subpage_id = "edit_employees";
?>

 <body>
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 

 
 <table width="1024" align = "left">
  <tr>
    <td width="143">New Employee</td>
    <td width="74">&nbsp;</td>
    <td width="495">&nbsp;</td>
    <td width="140">&nbsp;</td>
    <td width="78">&nbsp;</td>
    <td width="66">&nbsp;</td>
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
    <td>Name</td>
    <td>
    <form action="" method="post">
   
    <input name="EmployeeFirstName" type="name" class="char tb" id="EmployeeFirstName" value="<?php echo $EmployeeFirstName; ?>" maxlength="45" tabindex="1">
      <input name="EmployeeMiddleName" type="text" class="char tb" id="EmployeeMiddleName" value="<?php echo $EmployeeMiddleName; ?>" size="1" tabindex="1">
    <input name="EmployeeLastName" type="text" class="char tb" id="EmployeeLastName" value="<?php echo $EmployeeLastName; ?>" maxlength="45" tabindex="1"></td>
    <td>Active?</td>
    <td><input type="checkbox" name="ActiveEmployee" id="ActiveEmployee" Value = "1" tabindex="-1"></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Prefix</td>
    <td><select name="EmployeeNamePrefix" id="EmployeeNamePrefix" tabindex="-1">
      <option></option>
      <option>Ms</option>
      <option>Miss</option>
      <option>Mrs</option>
      <option>Mr</option>
      <option>Dr</option>
    </select>
      Phone Number
     
        <input type="text" name="PhoneNumber" id="PhoneNumber" value = "<?php $PhoneNumber?>">
      </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Suffix</td>
    <td><select name="EmployeeNameSuffix" id="EmployeeNameSuffix" tabindex="-1">
      <option></option>
      <option>Jr</option>
      <option>Sr</option>
      <option>I</option>
      <option>II</option>
      <option>III</option>
      <option>IV</option>
    </select></td>
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
    </form>

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
 
 </body>
 <br /> <br /> <br /> <br /> <br /> <br />
 <?php include('Includes/footer.php'); ?>
 </html>
 <?php 
 }
 
 
 

 // connect to the database
 include('Includes/Dbconnect.php');
 include('Includes/functions.php');
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
 $EmployeeFirstName = $_POST['EmployeeFirstName'];
 $EmployeeLastName = $_POST['EmployeeLastName'];
 
 // check to make sure both fields are entered
 if ($EmployeeFirstName == '' || $EmployeeLastName == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 // if either field is blank, display the form again
 renderForm($EmployeeFirstName, $EmployeeLastName, $error);
 }
 else
 {
 
$EmployeeSuffix = $_POST["EmployeeNameSuffix"];
$EmployeePrefix	= $_POST["EmployeeNamePrefix"];	
$EmployeeFirstName = $_POST["EmployeeFirstName"];
$EmployeeMiddleInt = $_POST["EmployeeMiddleName"];
$EmployeeLast = $_POST["EmployeeLastName"];
$EmployeeActive = $_POST["ActiveEmployee"];
$PhoneNumber = $_POST["PhoneNumber"];

$query= ("INSERT INTO Employee (EmployeeFirstName, EmployeeLastName, EmployeeMiddleName, ActiveEmployee, EmployeeNamePrefix, EmployeeNameSuffix, PhoneNumber) VALUES ('".$EmployeeFirstName."', '".$EmployeeLast."','".$EmployeeMiddleInt."','".$EmployeeActive."','".$EmployeePrefix."','".$EmployeeSuffix."','".$PhoneNumber."')");


mysql_query($query);

mysql_close();

header('Location: http://gpg.webritetech.com/ViewActiveEmployees.php');

 
 }
 }
 else
 // if the form hasn't been submitted, display the form
 {
 renderForm('','','');
 }
?> 