<?php

$con = mysql_connect('localhost','root','');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("学生管理系统", $con);


$sql="UPDATE 选课
	SET 课程成绩='$_POST[课程成绩]'                                               
	WHERE 学号='$_POST[学号]'and 课程代码=='$_POST[课程代码]';
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

echo readfile("insertreturn.html");
mysql_close($con);
?>