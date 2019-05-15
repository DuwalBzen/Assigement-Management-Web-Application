
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
                            Welcome sir 
                            <small>

                                <?php
                               echo $_SESSION['email'];
                            ?>
                            
                          </small>
                        </h2>
                       
                    </div>
                </div>          

 <section class="content">
    <div class="row no-gutters">

      <div class="col-lg-3" style="margin-right: 10px;">
      <div class="box text-center">
        <div class="box-body bg-danger">            
          <h3 class="price">
          
          <?php 
          $email=$_SESSION['email'];
          $query_for_teacher_id="SELECT id FROM teacher_details WHERE email='{$email}'";
          if($result=mysqli_query($link,$query_for_teacher_id)){
          $row=mysqli_fetch_assoc($result);
          $teacher_id=$row['id'];
          }
          ?>

          <?php
          $query = "SELECT  `assigement_given_by_teacher_id`, `id` FROM  `assigement_record` JOIN teacher_details  ON assigement_record.assigement_given_by_teacher_id=teacher_details.id WHERE assigement_given_by_teacher_id='$teacher_id'";

          $result = mysqli_query($link, $query); 
          $post_count=mysqli_num_rows($result);

          echo  $post_count;          

          ?>

          <span>  Assigement Given</span>
          </h3>

          <br>
          <a class="btn btn-flat btn-round btn-danger" href="view_Assigement.php">View Details</a>
        </div>
      </div>
      </div>


      <div class="col-lg-3">
      <div class="box text-center">
        <div class="box-body bg-warning">            
          <h3 class="price">
          
              <?php 
                $email=$_SESSION['email'];
                $query_for_teacher_id="SELECT id FROM teacher_details WHERE email='{$email}'";
                if($result=mysqli_query($link,$query_for_teacher_id)){
                $row=mysqli_fetch_assoc($result);
              $teacher_id=$row['id'];
              }
              ?>

              <?php
              $query = "SELECT assigement_id,title,description,document_upload,assigement_start_date,assigement_end_date,name,grade,received_time,submitted_document_details  FROM assigement_record JOIN assigement_received_details ON assigement_record.assigement_id=assigement_received_details.assigement_record_id JOIN students_details ON students_details.student_id=assigement_received_details.assigement_submited_student_id WHERE assigement_given_by_teacher_id='$teacher_id'";
              $result = mysqli_query($link, $query);

              $post_count=mysqli_num_rows($result);
               echo  $post_count;    
                 ?>

          <span> No of Assigement Received </span>
          </h3>

          <br>
          <a class="btn btn-flat btn-round btn-danger" href="assigement_received.php">View Details</a>
        </div>
      </div>
      </div>

    </div></section>




     
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  	
	 
	  
<?php include "include/footer.php"; ?>
