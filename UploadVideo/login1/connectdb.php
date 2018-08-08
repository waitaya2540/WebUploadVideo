<?php
 $dbcon = mysqli_connect('localhost','root','','videoUpload');

 if (mysqli_connect_errno()) {
   echo "ไม่สามารถติดต่อฐานข้อมูล Mysql ได้". mysqli_connect_error();
 }
 mysqli_set_charset($dbcon,'utf8');

 ?>
