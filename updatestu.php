<?php

$con = mysql_connect('localhost','root','qwer1234QWER');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("yyhtest", $con);

$sql="update unpass 
	set name=studentname
	where unpss.name=(select name from student where id='$_POST[id]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";
$sql="call updatestudent('$_POST[name]','$_POST[id]','$_POST[majorid]','$_POST[gender]','$_POST[grade]'";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

echo readfile("insertreturn.html");
mysql_close($con);
?>