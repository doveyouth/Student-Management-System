<?php

$con = mysql_connect('localhost','root','');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("学生管理系统", $con);


$sql="UPDATE 课程
	SET 课程名='$_POST[课程名]',教师编号='$_POST[教师编号]',
	课时='$_POST[课时]',学分='$_POST[学分]'                                                       
	WHERE 课程代码='$_POST[课程代码]';
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

echo readfile("insertreturn.html");
mysql_close($con);
?>