<?php

$con = mysql_connect('localhost','root','qwer1234QWER');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("yyhtest", $con);


$result = mysql_query("SELECT *
 from unpass where id='$_POST[id]'");

echo "<table border='3'>
<tr>
<th>id</th>
<th>courseid</th>
<th>coursegrade</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['courseid'] . "</td>";
  echo "<td>" . $row['coursegrade'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";


mysql_close($con);
?>