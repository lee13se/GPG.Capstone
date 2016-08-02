<?php

//Create a connect to the database
include('Dbconnect.php');

//get the q parameter from URL
$q=$_GET["q"];

//if q>0 then someone has typed something!
if (strlen($q)>0)
{
	$hint="";

	//query the database for the letters that have been typed so far.
	$results = mysql_query("SELECT 
					   		CompanyName, ClientNum 
					   FROM
					   		Client_Info 
					   WHERE
					   		CompanyName LIKE '".$q."%'
						ORDER BY
							CompanyName ASC
						;"  );
	
	
	
	//This while statement magically loops and addes earch result to $hint
	while($row = mysql_fetch_array($results))
	{
		extract($row);
		
		//$hint is blank, set $hint to the first result
		if ($hint=="")
        {
			$hint = '<a href="/inventory.php?clientNum='.$ClientNum.'">'.$CompanyName.'</a>';
		}
	
		//$hint is not blank, so append the next result
		else
        {
			$hint=$hint .'<br/>'. '<a href="/inventory.php?clientNum='.$ClientNum.'">'.$CompanyName.'</a>';
		}
		//$row = mysql_fetch_assoc($results);
		//echo('row = '.$row);
	
	}
}

// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint=="")
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  }

//output the response
echo $response;

?>