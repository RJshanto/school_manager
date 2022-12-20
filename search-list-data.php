<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>schoole management system</title>
    <link rel="stylesheet" href="school-man.css">
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
             <li>
               <form action="" method="post">
                <input type="text" name="search_name" id="search_filed" placeholder="Enter Fast name">
                <input type="submit" name="search" id="search_btn" value="search">
                </form>
              </li>
         </ul>
         </div>
         <div class="des"><h3>Data :</h3></div>

        <?php 

      if(isset($_REQUEST['search'])){

        $search_name = $_REQUEST['search_name'];
      
         
         $con = mysqli_connect("localhost","root","","school_data") or die("connection failed");
         $sql = "SELECT * FROM class_8 WHERE f_name LIKE '%$search_name%'";
         $result = mysqli_query($con,$sql) or die("Query unsuccessful");
         
         if(mysqli_num_rows($result)>0){

            
         ?>

         <div class="table-section">
          <table class="table table-bordered">
            <tr>
              <th>Serial No</th>
              <th>Id</th>
              <th>profile Pic</th>
              <th>Fast Name</th>
              <th>Last Name</th>
              <th>Group</th>
              <th>Roll</th>
            
            </tr>
          <?php 
          $serial_num = 0;

            while($row = mysqli_fetch_assoc($result)){
              $serial_num++;
          ?>
            <tr>
              <td><?php echo $serial_num ;?></td>
              <td><?php echo $row['sid'] ?></td>
              <td><img width="40px" src="uploaded/<?php echo $row['profile_pic'] ?>" alt="loading"></td>
              <td><?php echo $row['f_name'] ?></td>
              <td><?php echo $row['l_name'] ?></td>


              <td>
              <?php 
               $con = mysqli_connect("localhost","root","","school_data") or die("connection failed");
               $sql1 = "SELECT * FROM dpt";
               $result1 = mysqli_query( $con,$sql1) or die("Query failed");

               if(mysqli_num_rows($result1)>0){
        
                while($row1=mysqli_fetch_assoc($result1)){
                    if($row['sdpt']==$row1['id']){
                       
                    
              ?>
                <?php echo $row1['dpt_name']?>
                </td>
                <?php } } } ?>
                
              <td><?php echo $row['roll'] ?></td>
              <td><a href="edit.php?sid=<?php echo $row['sid']; ?>">Edit</a></td>
              <td><a href="delete.php?id=<?php echo $row['sid']; ?>&profile_pic=<?php echo $row['profile_pic'];?>">Delete</a></td>
            </tr>
            <?php } ?>
          </table>

          <?php } }?>

        

         </div>
      </div>

    </div>

</body>
</html>


            
               