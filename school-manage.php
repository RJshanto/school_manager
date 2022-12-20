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

<?php 
 session_start();
 if($_SESSION['username']==true){

?>
  <div class="container">
    <div class="section1">
      <div class="header">
        <h1>School Manage Admin Panal</h1>
      </div>

      <div class="manubar">
        <ul>
          <li><a href="#">HOME </a></li>
          <li><a href="add.php">ADD</a></li>
          <li><a href="update-page.php">UPDATE</a></li>
          <li><a href="delete-page.php">DELETE</a></li>
          <li>
            <form action="search-list-data.php" method="post">
              <input type="text" name="search_name" id="search_filed" placeholder="Enter Fast name">
              <input type="submit" name="search" id="search_btn" value="search">
            </form>
          </li>
          <div class="logout"><li><button class="log_btn"><a style="font-size:19px; margin-left:10px;" href="logout.php">LogOut</a></button></li></div>
        </ul>
      </div>
      <div class="des">
        <h3>Data :</h3>
      </div>

      <?php

     
    

      $con = mysqli_connect("localhost", "root", "", "school_data") or die("connection failed");

      $sql = "SELECT * FROM class_8 JOIN dpt WHERE class_8.sdpt = dpt.id";
      $result = mysqli_query($con, $sql) or die("Query unsuccessful");

      if (mysqli_num_rows($result) > 0) {



        if(isset($_REQUEST['delete_m_data'])){
          $check_data= $_REQUEST['check_data'];
          $all_marked = implode(",",$check_data);
          
$sql2 = "DELETE FROM `class_8` WHERE sid in ($all_marked)";

$result2 = mysqli_query($con, $sql2) or die(" Query Unsuccesful");
unlink("uploaded/$profile_file");
header("location: http://localhost/php-nirob/mysql/school-manage.php");
  
        }
      
     
      ?>
        <form action="" method="post">

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
                <th></th>
                <th></th>
                <th><input type="submit" name="delete_m_data" class="btn btn-success" value="Delete All"></th>

              </tr>
              <?php
              $serial_num = 0;

              while ($row = mysqli_fetch_assoc($result)) {
                $serial_num++;
              ?>
                <tr>
                  <td><?php echo $serial_num; ?></td>
                  <td><?php echo $row['sid'] ?></td>
                  <td><img width="40px" src="uploaded/<?php echo $row['profile_pic'] ?>" alt="loading"></td>
                  <td><?php echo $row['f_name'] ?></td>
                  <td><?php echo $row['l_name'] ?></td>
                  <td><?php echo $row['dpt_name'] ?></td>
                  <td><?php echo $row['roll'] ?></td>
                  <td><a href="edit.php?sid=<?php echo $row['sid']; ?>">Edit</a></td>
                  <td><a href="delete.php?id=<?php echo $row['sid']; ?>&profile_pic=<?php echo $row['profile_pic']; ?>">Delete</a></td>
                  <td><input type="checkbox" name="check_data[]" value="<?php echo $row['sid'] ?>"></td>
                </tr>
              <?php } ?>
            </table>
        </form>

      <?php } ?>



    </div>
  </div>

  </div>

  <?php
  
              }else{
                header("location: http://localhost/php-nirob/mysql/login.php");
    
              }
  ?>
</body>

</html>