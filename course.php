<?php

$con = mysql_connect('localhost','root','');
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
<th>keshi</th>
<th>credit</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['coursename'] . "</td>";
  echo "<td>" . $row['courseid'] . "</td>";
  echo "<td>" . $row['teacherid'] . "</td>";
  echo "<td>" . $row['keshi '] . "</td>";
  echo "<td>" . $row['credit'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";

  echo readfile("insertreturn.html");
mysql_close($con);
?>