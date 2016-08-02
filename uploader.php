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


$uploadFolder = "uploads";

$partNum= $_GET['partNum'];
$maxFileSize = $_POST['MAX_FILE_SIZE'];

if(basename( $_FILES['uploadedfile']['name']) != '')
{
	//insert folder name and get FileID
	$query = ("INSERT INTO Attached_Files (Directory, PartNum)
				VALUES ('".$uploadFolder."', '".$partNum."')");
	
	//echo "query 1 = ".$query."<br />";
	
	mysql_query($query) or die (mysql_error());
	$FileID = mysql_insert_id();
	//echo "FileID = ".$FileID."<br />";
	
	
		$target_path = $uploadFolder."/" . $FileID."." .basename( $_FILES['uploadedfile']['name']); 

		
		
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
		{
			
			
			
			echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
			" has been uploaded<br />";
		
			$query = ("UPDATE Attached_Files
					SET
						FileName = '".$FileID."." .basename( $_FILES['uploadedfile']['name'])."',
						DateAdded = Current_Timestamp
					WHERE  FileID = '".$FileID."';");
		
			echo "<br /> query = ".$query."<br />";
			
			mysql_query($query) or die (mysql_error());
			
			header("Location: PartView.php?PartNum=".$partNum);
			
		}
		else
		{
			
			echo "There was an error uploading the file, please try again!<br />";
			echo "The file size can not exceed ".number_format($maxFileSize)." bytes. <br />";

			
			echo $_FILES["file"]["error"]."<br />";
					
			$query = ("DELETE FROM Attached_Files
					WHERE  FileID = '".$FileID."'");
		
			//echo "<br /> query = ".$query."<br />";
			
			mysql_query($query) or die (mysql_error());
			
            echo "<br />
            <a href='PartView.php?PartNum=".$partNum."'> Click Here to Go Back</a>";
		}
	
}
else
	header("Location: PartView.php?PartNum=".$partNum); 

?>

<a href="/PartView.php?PartNum=<?php echo $partNum; ?>">Return to Part View</a>

<?php
include('Includes/footer.php');
?>



</body>
</html>