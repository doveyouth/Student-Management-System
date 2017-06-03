<?php

$con = mysql_connect('localhost','root','qwer1234QWER');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("yyhtest", $con);


$result = mysql_query("SELECT *
 from course");

echo "<table border='5'>
<tr>
<th>coursename</th>
<th>courseid</th>
<th>teacherid</th>
<th>studentnumber</th>
<th>credit</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['coursename'] . "</td>";
  echo "<td>" . $row['courseid'] . "</td>";
  echo "<td>" . $row['teacherid'] . "</td>";
  echo "<td>" . $row['studentnumber '] . "</td>";
  echo "<td>" . $row['credit'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";

mysql_close($con);
?>