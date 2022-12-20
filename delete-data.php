<?php 

$stu_id = $_REQUEST['sid'];


$con = mysqli_connect("localhost","root","","school_data") or die("connection failed");

$sql = "DELETE FROM `class_8` WHERE sid={$stu_id}";

$result = mysqli_query($con, $sql) or die(" Query Unsuccesful");

header("location: http://localhost/php-nirob/mysql/school-manage.php");

mysqli_close($con);


?>