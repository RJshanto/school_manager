<?php 

$stu_id = $_REQUEST['id'];
$profile_file = $_REQUEST['profile_pic'];


$con = mysqli_connect("localhost","root","","school_data") or die("connection failed");

$sql = "DELETE FROM `class_8` WHERE sid={$stu_id}";

$result = mysqli_query($con, $sql) or die(" Query Unsuccesful");
unlink("uploaded/$profile_file");
header("location: http://localhost/php-nirob/mysql/school-manage.php");

mysqli_close($con);


?>