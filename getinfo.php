<?php
$q=$_GET["q"];

//Connect to the Database
include('Dbconnect.php');

$sql="SELECT * FROM Client_Info WHERE CompanytName = '".$q."'";

$result = mysql_query($sql);

echo "poop";

echo "<table border='1'>
<tr>
<th>Company Name</th>
<th>Active Customer</th>
<th>Street</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['CompanyName'] . "</td>";
  echo "<td>" . $row['ActiveCustomer'] . "</td>";
  echo "<td>" . $row['StreetLine1'] . "</td>";
  //echo "<td>" . $row['Hometown'] . "</td>";
  //echo "<td>" . $row['Job'] . "</td>";
  //echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?> 