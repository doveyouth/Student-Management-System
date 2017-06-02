<?php

$con = mysql_connect('www.nkuliz.com','root','qwer1234QWER');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("yyhtest", $con);


$sql="UPDATE course
	SET coursename='$_POST[coursename]',teacherid='$_POST[teacherid]',
	keshi='$_POST[keshi]',credit='$_POST[credit]'                                                       
	WHERE courseid='$_POST[courseid]';
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

echo readfile("insertreturn.html");
mysql_close($con);
?>