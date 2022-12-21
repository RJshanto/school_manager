<?php 

session_start();

if(isset($_REQUEST['submit'])){

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if( $username && $password){

 $con = mysqli_connect("localhost","root","","school_data")or die("connection failed");
    $sql = "SELECT*FROM admin WHERE A_username='$username' && A_password ='$password'";
    
    $result = mysqli_query($con,$sql) or die("Query Unseccesful");
    
    $row_count = mysqli_num_rows($result);
    if($row_count){
        $_SESSION['username']=$username;
       echo header("location: http://localhost/php-nirob/mysql/school-manage.php");
    }else{
        
    header("location: http://localhost/php-nirob/mysql/login.php");
    
    }
    }else{
    
    header("location: http://localhost/php-nirob/mysql/login.php");
    
    }
}

?>