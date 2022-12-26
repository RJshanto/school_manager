<?php 

session_start();

if(isset($_REQUEST['submit'])){

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if( $username && $password){

 $con = mysqli_connect("localhost","root","","school_data")or die("connection failed");
    $sql = "SELECT*FROM admin WHERE A_username='$username' && A_password ='$password'";
    
    $result = mysqli_query($con,$sql) or die("Query Unseccesful");
    

    if(mysqli_num_rows($result)>0){

        $row = mysqli_fetch_assoc($result);


        $_SESSION['username']=$username;
        $_SESSION['role']=$row['role'];
        header("location: http://localhost/php-nirob/mysql/school-manage.php");
    }else{
        
    header("location: http://localhost/php-nirob/mysql/login.php");
    
    }
    }else{
    
    header("location: http://localhost/php-nirob/mysql/login.php");
    
    }
}

?>