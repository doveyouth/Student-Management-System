<?php

$con = mysql_connect('www.nkuliz.com','root','qwer1234QWER');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("yyhtest", $con);


$result = mysql_query("SELECT *
 from assistant");

echo "<table border='7'>
<tr>
<th>id</th>
<th>teacherid</th>
<th>name</th>
<th>majorid</th>
<th>gender</th>
<th>grade</th>
<th>assistantid</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['teacherid'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['majorid'] . "</td>";
  echo "<td>" . $row['gender'] . "</td>";
  echo "<td>" . $row['grade'] . "</td>";
  echo "<td>" . $row['assistantid'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";

  echo readfile("insertreturn.html");
mysql_close($con);
?>