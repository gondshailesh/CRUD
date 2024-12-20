<?php
  // session_start();
  require 'header.php';
  //   if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  //     // Redirect to login page if not logged in
  //     header("Location: login.php");
  //     exit;
  //   }
  // echo "Welcome, " . $_SESSION['username'] . "! This is your dashboard.";




?>
    
    
    <div class="row">
                <div class="col-8 text-center h2"> All Students </div>
                <div class="col-4 text-center h2"> <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Student </button></div>
            </div>
            <?php
                       if(isset($_GET['successful'])){
              echo "<h2 style='text-align:center; color:green;' >" . $_GET['successful'] . "</h2>";
                       }
                       ?>  


                      <?php
                       if(isset($_GET['message'])){
                        echo "<h2 style='text-align:center;color:red;'>" . $_GET['message'] . "</h2>";
                       }
                       ?> 
                       <?php
                       if(isset($_GET['update'])){
                          echo "<h2 style='text-align:center; color:green;'>" . $_GET['update'] . "</h2>";
                       }
                       ?> 
                        <?php
                       if(isset($_GET['msg'])){
                          echo "<h2 style='text-align:center;color:red;'>" . $_GET['msg'] . "</h2>";
                       }
                       ?>   
            <table class="table table-bordered table-hover table-striped text-center  shadow " >
            <tr class="t-row " >  
            <th class="thead">ID</th>  
              <th class="thead">Name</th>  
              <th class="thead">Last Name</th>  
              <th class="thead">Age</th>  
              <th class="thead">Action</th>  
            </tr>



            <?php
            
            $sql= "SELECT * FROM `student`";

            $result= mysqli_query($conn,$sql);

            if(!$result){

              die("Query Failed".mysqli_error());

            }else{

              while ($row=mysqli_fetch_assoc($result)) {
                
                ?>


                      
           
            <tr class="t-row " >  
              
            <td class="td"><?php echo$row['id']; ?> </td>
              <td class="td"><?php echo$row['name']; ?> </td>  
              <td class="td"><?php echo$row['last_name']; ?> </td>  
              <td class="td"><?php echo$row['age']; ?> </td>  
              <td class="td">
              <a href="update.php?id= <?php echo$row['id']; ?>"><button class="btn btn-warning me-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit&nbsp;<i class="fas fa-edit"></i></button></a>  
              <a href="delete.php?id= <?php echo$row['id']; ?>"><button class="btn btn-danger" onclick="delete();">  <i class="fas fa-trash"></i></button></a></td>  
          
            <?php 
                   
                 }
               }
            ?>
  </tr>
  </table>
          
        
        
                         <!-- Modal Add Student -->
                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       </div>
                       <div class="modal-body">
                        <form action="add.php" method="POST">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" >
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name:</label>
                                <input type="text" class="form-control" id="lastname" placeholder="Enter your last name" name="last_name" >
                            </div>
                            <div class="form-group mb-3">
                                <label for="age">Age:</label>
                                <input type="number" class="form-control" id="age" placeholder="Enter your age" name="age" >
                            </div>
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" name="add_students" value="Add Student">Add Student </button>
                        </form>
                    </div>
                       </div>
                       </div>
                      </div>
                       




                   
                                
                            
  <?php

    require'footer.php';
  
  ?>