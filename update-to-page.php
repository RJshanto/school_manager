<?php

if(isset($_REQUEST['submit'])){
 
 $sid =$_REQUEST['sid'];
 $fname =$_REQUEST['fname'];
 $lname =$_REQUEST['lname'];
 $group =$_REQUEST['dpt'];
 $roll =$_REQUEST['roll'];

if( $fname && $lname && $group && $roll){




$con = mysqli_connect("localhost","root","","school_data")or die("connection failed");
$sql = " UPDATE class_8 SET f_name='{$fname}',l_name='{$lname}',sdpt='{$group}',roll='{$roll}' WHERE sid={$sid} ";

$result = mysqli_query($con,$sql) or die("Query Unseccesful");

header("location: http://localhost/php-nirob/mysql/school-manage.php");

}else{

header("location: http://localhost/php-nirob/mysql/add.php");

}
}
?>