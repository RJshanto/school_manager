<?php

if(isset($_REQUEST['submit'])){

 $fname =$_REQUEST['fname'];
 $lname =$_REQUEST['lname'];
 $group =$_REQUEST['dpt'];
 $roll =$_REQUEST['roll'];

 $profile = $_FILES['profile'];
 $tmp_name = $profile['tmp_name'];
 $name = $profile['name'];




if( $fname && $lname && $group && $roll && $profile){

if(!empty($profile)){
    $location = "uploaded/";
    if(move_uploaded_file($tmp_name,$location.$name)){
        echo "file uploaded";
    }else{
        echo "file not uploaded";
    }
}else{
echo "file not found ";
};


$con = mysqli_connect("localhost","root","","school_data")or die("connection failed");
$sql = " INSERT INTO class_8(profile_pic,f_name, l_name, roll, sdpt) VALUES ('{$name}','{$fname}','{$lname}','{$roll}','{$group}')";

$result = mysqli_query($con,$sql) or die("Query Unseccesful");

header("location: http://localhost/php-nirob/mysql/school-manage.php");

}else{

header("location: http://localhost/php-nirob/mysql/add.php");

}
}
?>