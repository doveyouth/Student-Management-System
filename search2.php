<?php

$con = mysql_connect('localhost','root','qwer1234QWER');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("yyhtest", $con);


$result = mysql_query("SELECT unpass.name,unpass.courseid,unpass.coursegrade
 from unpass,student where student.id='$_POST[id]' and student.name=unpass.name");

echo "<table border='3'>
<tr>
<th>name</th>
<th>courseid</th>
<th>coursegrade</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['courseid'] . "</td>";
  echo "<td>" . $row['coursegrade'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";


mysql_close($con);
?>