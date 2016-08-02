<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Parts</title>
</head>

<?php 
$header_page_id = "advanced";
$header_subpage_id = "search_parts";
?>

<?php include('Includes/header.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Quote - Enter Part</title>

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
xmlhttp.open("GET","/Includes/LiveSearch/EditPartLS.php?q="+str+"&partNum=<?php echo $Partnum?>",true);
xmlhttp.send();
}
</script>

<body>

<br />
<br />
<br />

<?php
echo "<p></p><b>Search Parts</b> | <a href='ViewParts.php'>List Parts</a><p></p>";

$partNum = 0;
$partNum = $_GET['partNum'];
if($partNum != 0)
	echo ("<script type='text/javascript'>
			<!--
			window.location = '/PartView.php?PartNum=".$partNum."'
			//-->
			</script>
			");
   //header("/PartView.php?PartNum=".$partNum);
?>

<table width="1024" border="0" align = "left">
  
  <tr>
    <td>Search Part Number</td>
  </tr>
  <tr> 
    <td>
    <input "type="text" size="30" onkeyup="showResult(this.value)"  <?php if($oldPartNum != '') echo("value='".$oldPartNum."'"); ?> />
		<div id="livesearch"></div>
	</td> 
  </tr>
</table>
<p>&nbsp;</p>
<p><a href="AddParts.php?page=searchParts">
	<input type="submit" name="addnewpart" id"addnewpart" value="New Part" /></a></p>
<p><br />
  
</p>



</body>
<?php include('Includes/footer.php'); ?>
</html>