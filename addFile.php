<?php
$partNum= $_GET['PartNum'];

include ("Includes/Dbconnect.php");

$max_upload = (int)(ini_get('upload_max_filesize'));
$max_post = (int)(ini_get('post_max_size'));
$memory_limit = (int)(ini_get('memory_limit'));
$upload_mb = min($max_upload, $max_post, $memory_limit);
$upload = $upload_mb*1000000;

?>

<br /><br />
<form enctype="multipart/form-data" action="uploader.php?partNum=<?php echo $partNum; ?>" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="<? echo $upload; ?>" />
Choose a file to attach (limited to <? echo $upload_mb; ?> MB): <br /><input name="uploadedfile" type="file"  size="40" />	
<input type="submit" value="Attach File" />
</form>

<?php

$query = ("SELECT *
		  FROM Attached_Files
		  WHERE PartNum = '".$partNum."'		  
		  ");

$result = mysql_query($query) or die (mysql_error());


echo "<table border='0' cellpadding='10'>
	<tr>
		<td><strong>File Name</strong></td>
		<td><strong>Date Added</strong></td>
		<td></td>
	</tr>";
//print out files
while($row = mysql_fetch_array( $result ))
{
	$FileID = $row['FileID'];
	$FileName = $row['FileName'];
	$DateAdded = $row['DateAdded'];
	$Directory = $row['Directory'];
	
	//parse  file names to remove fileID form filename
	$NewFileName = explode(".", $FileName);
	
	echo "
	<tr>
		<td><a href='".$Directory."/".$FileName."'>".$NewFileName[1].".".$NewFileName[2]."</a></td>
		<td>".$DateAdded."</td>	
		<td><a href='/deleteFile.php?fileID=".$FileID."'><strong>Delete File</strong></a></td>	
	</tr>
	";
}


echo "</table>";
