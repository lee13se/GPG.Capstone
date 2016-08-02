<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cost Analysis</title>

</head>

<?php 
$header_page_id = "reports";
$header_subpage_id = "cost_analysis";

include('Includes/header.php'); ?>
<body>
<br />
<?php
$partNum = ''; 
$partNum = $_GET['partNum'];
if($partNum == '')
	$partNum = $_POST['partNum'];

if($partNum == '')
{
	?>
	<table width="1000" border="0">
      <tr>
        <th scope="col">Part Number</th>
        <th scope="col">Time Difference</th>
        <th scope="col"></th>
      </tr>
	  
	  <?php
	$query = ('
			  SELECT Sales_Order.PartNum AS "PartNum"
			  FROM Production_Log_Line
			  INNER JOIN Sales_Order
			  ON Sales_Order.SalesOrderNum=Production_Log_Line.SalesOrderNum
			  GROUP BY PartNum;
			  ;');
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		extract($row);
		//echo "partNum = ".$PartNum."<br /><br />";
		$query2 = ('
				  SELECT SUM(COALESCE(Production_Log_Line.QuantityCompleted, 0)) AS "QuantityProd", 
							SUM(COALESCE(Production_Log_Line.Hours, 0)) AS "HoursProd"
				  FROM Production_Log_Line
				  INNER JOIN Sales_Order
				  ON Sales_Order.SalesOrderNum=Production_Log_Line.SalesOrderNum
				  WHERE Production_Log_Line.Type = 0 AND Sales_Order.PartNum = '.$PartNum.'
				  ;');
		
		$result2 = mysql_query($query2) or die(mysql_error());

		while($row2 = mysql_fetch_array($result2))
		{
			extract($row2);
		}
		//echo "quantityProduced = ".$QuantityProd."  HoursProd = ".$HoursProd."<br /><br />";
		
		$query4 = ('
				  SELECT SUM(COALESCE(Production_Log_Line.Hours, 0)) AS "HoursSet"
				  FROM Production_Log_Line
				  INNER JOIN Sales_Order
				  ON Sales_Order.SalesOrderNum=Production_Log_Line.SalesOrderNum
				  WHERE Production_Log_Line.Type = 1 AND Sales_Order.PartNum = '.$PartNum.'
				  ;');
		
		$result4 = mysql_query($query4) or die(mysql_error());

		while($row4 = mysql_fetch_array($result4))
		{
			extract($row4);
		}
		//echo "HoursSet = ".$HoursSet."<br /><br />";
		
		$query3 = ('
			  SELECT SUM(COALESCE(SetupTime, 0)) AS "SetupTime", SUM(COALESCE(ProductionTime, 0)) AS "ProductionTime"
			  FROM Operations
			  WHERE PartNum = '.$PartNum.'
			  ;');
		$result3 = mysql_query($query3) or die(mysql_error());
		
		while($row3 = mysql_fetch_array($result3))
		{
			extract($row3);
		}
		//echo "SetupTime = ".$SetupTime."  ProductionTime = ".$ProductionTime."<br /><br />";
		
		$Seconds = $HoursProd/3600.0;
		//echo "Seconds = ".$Seconds."  QuantityProd = ".$QuantityProd."<br /><br />";
		
		if($QuantityProd != 0)
			$SecondsPerUnitProd = $Seconds/$QuantityProd;
		else
			$SecondsPerUnitProd = 0;
		
		$SecondsSet = $HoursSet/3600.0;
		
		//echo "SecondsPerUnitProd = ".$SecondsPerUnitProd."  SecondsSet = ".$SecondsSet."<br /><br />";
		
		$ProductionDiff = $ProductiionTime - $SecondsPerUnitProd;
		$SetupDiff = $SetupTime - $SecondsSet;
		
		$x = mysql_query("SELECT OldPartNum FROM Part_Info WHERE PartNum = ".$PartNum.";");
		while($y = mysql_fetch_array($x))
			extract($y);
		echo "<tr>";
			echo "<td><a href='/CostAnalysis.php?partNum=".$PartNum."'>".$OldPartNum."</a></td>";
			echo "<td>".number_format($SetupDiff,4)."</td>";
			echo "<td>&nbsp;</td>";
		 echo "</tr>";
	}
	?>
    </table>
    <br /><br /><br />

<?php
}

else
{
	echo "<br /><br />";
	back();
	
	$query = ('
			  SELECT OldPartNum
			  FROM Part_Info
			  WHERE PartNum = '.$partNum.'
			  ;');
	//echo $query."<br>";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result))
		extract($row);
		
		
	?>
	<br /><br />
    <strong> Details for Part Number: </strong> <? echo $OldPartNum; ?>
    <br /><br />
    <table width="1000" border="0">
      <tr>
        <th scope="col">Operation</th>
        <th scope="col">Time Difference</th>
        <th scope="col"></th>
      </tr>
	  
	  <?php
	$query = ('
			  SELECT *
			  FROM Operations
			  WHERE PartNum = '.$partNum.'
			  ;');
	//echo $query."<br>";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		extract($row);
		
		//echo "partNum = ".$partNum."<br /><br />";
		$query2 = ('
				  SELECT SUM(COALESCE(Production_Log_Line.QuantityCompleted, 0)) AS "QuantityProd", 
							SUM(COALESCE(Production_Log_Line.Hours, 0)) AS "HoursProd"
				  FROM Production_Log_Line
				  INNER JOIN Sales_Order
				  ON Sales_Order.SalesOrderNum=Production_Log_Line.SalesOrderNum
				  WHERE Production_Log_Line.Type = 0 AND Sales_Order.PartNum = '.$partNum.'
				  			AND Production_Log_Line.Operation = "'.$OperationName.'"
				  ;');
		
		$result2 = mysql_query($query2) or die(mysql_error());

		while($row2 = mysql_fetch_array($result2))
		{
			extract($row2);
		}
		//echo "quantityProduced = ".$QuantityProd."  HoursProd = ".$HoursProd."<br /><br />";
		
		$query4 = ('
				  SELECT SUM(COALESCE(Production_Log_Line.Hours, 0)) AS "HoursSet"
				  FROM Production_Log_Line
				  INNER JOIN Sales_Order
				  ON Sales_Order.SalesOrderNum=Production_Log_Line.SalesOrderNum
				  WHERE Production_Log_Line.Type = 1 AND Sales_Order.PartNum = '.$partNum.'
				  			AND Production_Log_Line.Operation = "'.$OperationName.'"
				  ;');
		
		$result4 = mysql_query($query4) or die(mysql_error());

		while($row4 = mysql_fetch_array($result4))
		{
			extract($row4);
		}
		//echo "HoursSet = ".$HoursSet."<br /><br />";
		
		$query3 = ('
			  SELECT SUM(COALESCE(SetupTime, 0)) AS "SetupTime", SUM(COALESCE(ProductionTime, 0)) AS "ProductionTime"
			  FROM Operations
			  WHERE PartNum = '.$partNum.' AND OperationName = "'.$OperationName.'"
			  ;');
		$result3 = mysql_query($query3) or die(mysql_error());
		
		while($row3 = mysql_fetch_array($result3))
		{
			extract($row3);
		}
		//echo "SetupTime = ".$SetupTime."  ProductionTime = ".$ProductionTime."<br /><br />";
		
		$Seconds = $HoursProd/3600.0;
		//echo "Seconds = ".$Seconds."  QuantityProd = ".$QuantityProd."<br /><br />";
		
		if($QuantityProd != 0)
			$SecondsPerUnitProd = $Seconds/$QuantityProd;
		else
			$SecondsPerUnitProd = 0;
		
		$SecondsSet = $HoursSet/3600.0;
		
		//echo "SecondsPerUnitProd = ".$SecondsPerUnitProd."  SecondsSet = ".$SecondsSet."<br /><br />";
		
		$ProductionDiff = $ProductiionTime - $SecondsPerUnitProd;
		$SetupDiff = $SetupTime - $SecondsSet;
		
		
		echo "<tr>";
			echo "<td>".$OperationName."</td>";
			echo "<td>".number_format($SetupDiff,4)."</td>";
			echo "<td>&nbsp;</td>";
		 echo "</tr>";
	}
	?>
    </table>
    <br /><br /><br />
<?php
}

?>

<br />
<DIV ID="testdiv1" STYLE="position:absolute;visibility:hidden;background-color:white;layer-background-color:white;"></DIV>
</body>
<?php include('Includes/footer.php'); ?>
</html>