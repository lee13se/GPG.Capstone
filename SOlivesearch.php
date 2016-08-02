<?php

//Create a connect to the database
include('Dbconnect.php');

//get the q parameter from URL
$so=$_GET[so];

//if q>0 then someone has typed something!
if (strlen($so)>0)
{
	$hint="";

	//query the database for the letters that have been typed so far.
	$results = mysql_query("SELECT 
					   		SalesOrderNum 
					   FROM
					   		Sales_Order 
					   WHERE
					   		SalesOrderNum LIKE '".$so."%'
						ORDER BY
							SalesOrderNum ASC
						;"  );
	
	
	
	//This while statement magically loops and addes earch result to $hint
	while($row = mysql_fetch_array($results))
	{
		extract($row);
		
		//$hint is blank, set $hint to the first result
		if ($hint=="")
        {
			$hint = '<a href="/findOrder.php?salesOrderNum='.$SalesOrderNum.'">'.$SalesOrderNum.'</a>';
		}
	
		//$hint is not blank, so append the next result
		else
        {
			$hint=$hint .'<br/>'. '<a href="/findOrder.php?salesOrderNum='.$SalesOrderNum.'">'.SalesOrderNum.'</a>';
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