
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
                               echo $_SESSION['email'];
                            ?>
                            
                          </small>
                        </h2>
                       
                    </div>
                </div>          

<section class="content">
    <div class="row no-gutters">

      <div class="col-lg-3">
      <div class="box text-center">
        <div class="box-body bg-danger">            
          <h3 class="price">
          
          <?php 
$email=$_SESSION['email'];
$query_for_student_grade="SELECT grade FROM students_details WHERE email='{$email}'";
if($result=mysqli_query($link,$query_for_student_grade)){
   $row=mysqli_fetch_assoc($result);
        $student_grade=$row['grade'];
}
?>

 <?php 

 $query = "SELECT assigement_id,title,description, document_upload,assigement_start_date,assigement_end_date FROM assigement_record  WHERE assigement_given_student_grade_id='$student_grade'";
 $result = mysqli_query($link, $query); 
 //$count_assigment_received=mysqli_num_rows($result);
   $post_count=mysqli_num_rows($result);


                     echo  $post_count;   

 //echo '$count_assigment_received';

 ?>


          <span>  No of Assigement Received</span>
          </h3>

          <br>
          <a class="btn btn-flat btn-round btn-danger" href="view_Assigement.php">View Details</a>
        </div>
      </div>
      </div>


       <div class="col-lg-3" style="margin-left:20px;">
      <div class="box text-center">
        <div class="box-body bg-primary pt-30">            
          <h3 class="price">
          
           <?php 
                $email=$_SESSION['email'];
                $query_for_student_id="SELECT student_id FROM students_details WHERE email='{$email}'";
                if($result=mysqli_query($link,$query_for_student_id)){
                $row=mysqli_fetch_assoc($result);
                $student_id=$row['student_id'];
             }
            ?>

                     <?php 

            $query = "SELECT name,title,description, document_upload,submitted_document_details,assigement_given_by_teacher_id FROM assigement_record JOIN assigement_received_details ON assigement_record.assigement_id=assigement_received_details.assigement_record_id JOIN teacher_details ON teacher_details.id=assigement_record.assigement_given_by_teacher_id WHERE assigement_submited_student_id='$student_id'";
            $result = mysqli_query($link, $query); 
            $row=mysqli_num_rows($result);

            echo $row;

            ?>

          <span>  No of Assigement Submitted</span>
          </h3>

          <br>
          <a class="btn btn-flat btn-round btn-danger" href="view_submitted_assigement.php">View Details</a>
        </div>
      </div>
      </div>


      <div class="col-lg-3" style="margin-left:20px;">
      <div class="box text-center">
        <div class="box-body bg-success">            
          <h3 class="price">
    

              <?php
              $query = "SELECT notification  FROM assigement_record WHERE notification='only five days remaining for assigement Submission'";
              $result = mysqli_query($link, $query);

              $post_count=mysqli_num_rows($result);
               echo  $post_count;    
                 ?>

          <span>Notification</span>
          </h3>

          <br>
          <a class="btn btn-flat btn-round btn-danger" href="view_notification_details.php">View Details</a>
        </div>
      </div>
      </div>

    </div></section>


     
	</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  	
	 
	  
<?php include "include/footer.php"; ?>
