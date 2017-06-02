<?php

$con = mysql_connect('localhost','root','qwer1234QWER');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("yyhtest", $con);
mysql_query('START TRANSACTION');
$isBad = 0;
$sql="DELETE FROM kaishe
WHERE courseid='$_POST[courseid]'";
if (!mysql_query($sql,$con))
  {
  $isBad =1;
  }
echo "1 record added";
$sql="DELETE FROM choose
WHERE courseid='$_POST[courseid]'";
if (!mysql_query($sql,$con))
  {
  $isBad =1;
  }
echo "1 record added";
$sql="DELETE FROM course
WHERE courseid='$_POST[courseid]'";
if (!mysql_query($sql,$con))
  {
  $isBad =1;
  }
echo "1 record added";
if($isBad == 1){
    echo $isBad;
    mysql_query('ROLLBACK');
}
mysql_query('COMMIT');
echo readfile("insertreturn.html");
mysql_close($con);
?>