<?php

$con = mysql_connect('localhost','root','');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("yyhtest", $con);


$result = mysql_query("SELECT *
 from major");

echo "<table border='2'>
<tr>
<th>majorname</th>
<th>majorid</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['majorname'] . "</td>";
  echo "<td>" . $row['majorid'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";

  echo readfile("insertreturn.html");
mysql_close($con);
?>