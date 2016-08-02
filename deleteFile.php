<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
include('Includes/header.php');
echo "<br /><br />";


$FileID = $_GET['fileID'];

//get folder and file name
$query = ("SELECT *
		  FROM Attached_Files
		  WHERE FileID = '".$FileID."'");

$result = mysql_query($query) or die (mysql_error());

while($row = mysql_fetch_array( $result ))
{
	$FileID = $row['FileID'];
	$FileName = $row['FileName'];
	$Directory = $row['Directory'];
	$partNum = $row['PartNum'];
 	
	
	unlink($Directory."/".$FileName);
		
	$query = ("DELETE FROM Attached_Files
		  WHERE FileID = '".$FileID."'");

	mysql_query($query) or die (mysql_error());
}




header("Location: PartView.php?PartNum=".$partNum); 

include('Includes/footer.php');
?>



</body>
</html>