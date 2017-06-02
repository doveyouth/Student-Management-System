<?php

$con = mysql_connect('localhost','root','qwer1234QWER');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("yyhtest", $con);


$sql=" if '$_POST[courseid]' is in (select student.id,kaishe.courseid from student,kaishe where student.majorid=kaishe.majorid and student.id='$_POST[id]' group by id,courseid;) then
INSERT INTO choose(id，courseid)
VALUES
('$_POST[id]','$_POST[courseid]')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

echo readfile("insertreturn.html");
mysql_close($con);
?>