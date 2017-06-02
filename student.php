<?php

$con = mysql_connect('localhost','root','qwer1234QWER');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("yyhtest", $con);
$result = mysql_query("SELECT *
 from student");
echo "<table border='5'>
<tr>
<th>name</th>
<th>id</th>
<th>majorid</th>
<th>gender</th>
<th>grade</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['majorid'] . "</td>";
  echo "<td>" . $row['gender'] . "</td>";
  echo "<td>" . $row['grade'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";

mysql_close($con);
?>