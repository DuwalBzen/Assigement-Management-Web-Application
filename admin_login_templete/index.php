
<?php include "include/header.php"?>
<?php include "include/leftsidenav.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
  
        <!-- /.col -->
    
         <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">
                            Welcome  
                            <small>

                                <?php

                               $email= $_SESSION['email'];
                               $query="SELECT name from admin_details WHERE email='$email'";
                               
                             if($result=mysqli_query($link,$query)){
                              $row=mysqli_fetch_assoc($result);
                              $admin_name=$row['name'];
                             }

                               ?>
                            <?php echo $admin_name ?>

                          </small>
                        </h2>
                       
                    </div>
                </div>          


     


   <section class="content">
    <div class="row">

      <div class="col-12 col-xl-3">
       <div class="box text-center">
        <div class="box-body bg-danger">            
          <h3 class="price">
      

          <?php
          $query = "SELECT  * FROM admin_details";

          $result = mysqli_query($link, $query); 
          $post_count=mysqli_num_rows($result);

          echo  $post_count;          

          ?>


          </h3>

          <p class="btn btn-flat btn-round btn-danger">Total Admin</p>
        </div>
      </div>
      <!-- /.col -->
      </div>  



    <div class="col-12 col-xl-3">
       <div class="box text-center">
        <div class="box-body bg-success">            
          <h3 class="price">
      

          <?php
          $query = "SELECT  * FROM teacher_details";

          $result = mysqli_query($link, $query); 
          $post_count=mysqli_num_rows($result);

          echo  $post_count;          

          ?>


          </h3>

          <p class="btn btn-flat btn-round btn-danger">Total Teacher</p>
        </div>
      </div>
      <!-- /.col -->
      </div>  


 
    <div class="col-12 col-xl-3">
       <div class="box text-center">
        <div class="box-body bg-info">            
          <h3 class="price">
      

          <?php
          $query = "SELECT  * FROM students_details";

          $result = mysqli_query($link, $query); 
          $post_count=mysqli_num_rows($result);

          echo  $post_count;          

          ?>


          </h3>

          <p class="btn btn-flat btn-round btn-danger">Total Students</p>
        </div>
      </div>
      <!-- /.col -->
      </div>  
      <!-- /.col -->
      </div> 

    </section>
 


</div>
</section>




  </div>
  <!-- /.content-wrapper -->
  
  	
	 
	  
<?php include "include/footer.php"; ?>
