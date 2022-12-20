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

         <?php
         $sid=$_REQUEST['sid'];

         $con = mysqli_connect("localhost","root","","school_data") or die("connection failed");
         $sql = "SELECT * FROM class_8 where sid={$sid}";
         $result = mysqli_query( $con,$sql) or die("Query failed");

         if(mysqli_num_rows($result)>0){

            while($row = mysqli_fetch_assoc($result)){

            
 
         ?>



         <div class="formsection">
            <form action="updata-data.php" method="post">
                <div class="form-name">
                 <label for="fname">First Name</label>
                 <input type="hidden" name="sid" value="<?php echo $row['sid'] ?>">
                 <input type="text" name="fname" value="<?php echo $row['f_name'] ?>">
             </div>
                <div class="form-name">
                 <label for="lname">Last Name</label>
                 <input type="text" name="lname" value="<?php echo $row['l_name'] ?>">
             </div>
                <div class="form-name">
                 <label for="dpt">Group</label>
               
                
               <?php 
               $con = mysqli_connect("localhost","root","","school_data") or die("connection failed");
               $sql1 = "SELECT * FROM dpt";
               $result1 = mysqli_query( $con,$sql1) or die("Query failed");

               if(mysqli_num_rows($result1)>0){
                echo "<select name='dpt'class='group'>";
                while($row1=mysqli_fetch_assoc($result1)){
                    if($row['sdpt']==$row1['id']){
                        $select = "selected";
                    }else{
                        $select = "";
                    }
                   

              ?>
             
             <option <?php echo $select ?> value="<?php echo $row1['id']?>"><?php echo $row1['dpt_name']?></option>
             <?php } } ?>
               </select>
               
             </div>
             
                <div class="form-roll">
                 <label for="roll">Class Roll</label>
                 <input type="number" name="roll" value="<?php echo $row['roll'] ?>">
             </div>
             <input class="submit-btn" type="submit" name="submit" value="Submit">
               
            </form>
           
<?php }} ?>
         </div>
       
         </div>
        
      </div>


</body>
</html>