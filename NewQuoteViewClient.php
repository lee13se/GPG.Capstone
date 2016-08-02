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
  xmlhttp.open("GET","/Includes/LiveSearch/LSViewClient2.php?q="+str,true);
xmlhttp.send();
}
</script>
<!-- End Script used for live search -->


</head>
<?php 
$header_page_id = "quote_order";
$header_subpage_id = "new_quote";
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
</body>
</html>