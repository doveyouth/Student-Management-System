<?php
$con = mysql_connect('localhost','root','qwer1234QWER');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("yyhtest", $con);


$sql="INSERT INTO course(coursename，courseid，teacherid，keshi，credit)
VALUES
('$_POST[coursename]','$_POST[courseid]','$_POST[teacherid]','$_POST[keshi]','$_POST[credit]')";
if (!mysql_query($sql,$con))
  {
  die('Error1: ' . mysql_error());
  }
echo "1 record added";

$sql="INSERT INTO kaishe(majorid，courseid)
VALUES
('$_POST[majorid]','$_POST[courseid]')";
if (!mysql_query($sql,$con))
  {
  die('Error2: ' . mysql_error());
  }
echo "1 record added";
echo readfile("insertreturn.html");
mysql_close($con);
?>
