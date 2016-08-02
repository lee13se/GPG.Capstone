<?php

//Create a connect to the database
include('Dbconnect.php');

//get the q parameter from URL
$q=$_GET["q"];
$SalesOrderNum=$_GET["so"];
//if q>0 then someone has typed something!
if (strlen($q)>0)
{
	$hint="";

	//query the database for the letters that have been typed so far.
	$results = mysql_query("SELECT 
					   		EmployeeFirstName, EmployeeNum, EmployeeLastName 
					   FROM
					   		Employee 
					   WHERE
					   		EmployeeFirstName LIKE '".$q."%'
						ORDER BY
							EmployeeFirstName ASC
						;"  );
	
	
	
	//This while statement magically loops and addes earch result to $hint
	while($row = mysql_fetch_array($results))
	{
		extract($row);
		
		//$hint is blank, set $hint to the first result
		if ($hint=="")
        {
			$hint = '<a href="/Employeeproductionlog.php?EmployeeNum='.$EmployeeNum.'&SalesOrderNum=' .$SalesOrderNum.'">'.$EmployeeFirstName.' '. $EmployeeLastName.'</a>';
		}
	
		//$hint is not blank, so append the next result
		else
        {
			$hint=$hint .'<br/>'. '<a href="/Employeeproductionlog.php?EmployeeNum='.$EmployeeNum.'&SalesOrderNum=' .$SalesOrderNum.'">'.$EmployeeFirstName.' '. $EmployeeLastName.'</a>';
		}
		//$row = mysql_fetch_assoc($results);
		//echo('row = '.$row);
	//$hint = '<a href="/Employeeproductionlog.php?salesOrderNum='.$SalesOrderNum.'&EmployeeNum='.$EmployeeNum.'">'.$SalesOrderNum.'</a>';
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