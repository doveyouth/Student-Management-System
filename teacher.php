<?php

$con = mysql_connect('www.nkuliz.com','root','qwer1234QWER');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("yyhtest", $con);


$result = mysql_query("SELECT *
 from teacher");

echo "<table border='4'>
<tr>
<th>name</th>
<th>gender</th>
<th>post</th>
<th>teacherid</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['gender'] . "</td>";
  echo "<td>" . $row['post'] . "</td>";
  echo "<td>" . $row['teacherid'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";

  echo readfile("insertreturn.html");
mysql_close($con);
?>