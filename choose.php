<?php

$con = mysql_connect('www.nkuliz.com','root','qwer1234QWER');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("yyhtest", $con);


$sql=" select student.id,kaishe.courseid into t from student,kaishe where student.majorid=kaishe.majorid and student.id=studentid group by id,courseid;
    if newcourseid = t.courseid then
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