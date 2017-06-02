<?php

$con = mysql_connect('localhost','root','qwer1234QWER');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("yyhtest", $con);


$sql="DELETE FROM kaishe
WHERE courseid='$_POST[courseid]'
DELETE FROM course
WHERE courseid='$_POST[courseid]' ";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
echo readfile("insertreturn.html");
mysql_close($con);
?>