
<?php
session_start();
if(isset($_SESSION['role']) && $_SESSION['role']!=1){
header('location: http://localhost/php-nirob/mysql/school-manage.php');
die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>schoole management system</title>
    <link rel="stylesheet" href="school-man.css">
    <link rel="stylesheet" href="addstyle.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="container">
      <div class="section1">
         <div class="header">
            <h1>School Manage Admin Panal</h1>
         </div>

         <div class="manubar">
         <ul>
             <li><a href="school-manage.php">HOME </a></li>
             <li><a href="add.php">ADD</a></li>
             <li><a href="update-page.php">UPDATE</a></li>
             <li><a href="delete-page.php">DELETE</a></li>
         </ul>
         </div>
         <div class="formsection">
            <form action="add-data.php" method="post" enctype="multipart/form-data">
                <div class="form-name">
                 <label for="fname">First Name</label>
                 <input type="text" name="fname">
             </div>
                <div class="form-name">
                 <label for="lname">Last Name</label>
                 <input type="text" name="lname">
             </div>
                <div class="form-name">
                 <label for="dpt">Group</label>
               <select name="dpt"class="group">
                
               <option value="" selected disabled>Select Group</option>

               <?php 
               
            
               $con = mysqli_connect("localhost","root","","school_data") or die("connection failed");
               $sql = "SELECT * FROM dpt";
               $result = mysqli_query( $con,$sql) or die("Query failed");

               if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){

              ?>
             
             <option value="<?php echo $row['id']?>"><?php echo $row['dpt_name']?></option>
             <?php } } ?>
               </select>
               
             </div>
                <div class="form-roll">
                 <label for="roll">Class Roll</label>
                 <input type="number" name="roll">
             </div>
             <div class="file-upload">
              <label for="image">Uploade Image</label>
              <input type="file" name="profile">
             </div>
             <input class="submit-btn" type="submit" name="submit" value="Submit">
               
            </form>
           

         </div>
       
         </div>
        
      </div>


</body>
</html>