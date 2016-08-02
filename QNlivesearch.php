<?php

//Create a connect to the database
include('Dbconnect.php');

//get the q parameter from URL


//if q>0 then someone has typed something!
if ($qn > "0")
{
	$hint;
    $qn = (int)$qn;
	//query the database for the letters that have been typed so far.
	$results = mysql_query("SELECT 
					   		QuoteNum 
					   FROM
					   		Quote 
					   WHERE
					   		QuoteNum LIKE '".$qn."%'
						ORDER BY
							QuoteNum ASC
						;"  );
	
	
	
	//This while statement magically loops and addes earch result to $hint
	while($row = mysql_fetch_array($results))
	{
		extract($row);
		
		//$hint is blank, set $hint to the first result
		if ($hint== "")
        {
			$hint = '<a href="/findQuote.php?quoteNum='.$QuoteNum.'">'.$QuoteNum.'</a>';
		}
	
		//$hint is not blank, so append the next result
		else
        {
			$hint=$hint .'<br/>'. '<a href="/findQuote.php?quoteNum='.$QuoteNum.'">'.QuoteNum.'</a>';
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