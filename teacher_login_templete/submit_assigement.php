 <?php include "include/header.php";?>

<?php include "include/leftsidenav.php"?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      
<?php
 
$email=$_SESSION['email'];

$query ="SELECT * from students_details WHERE email='$email'";
$query_for_profile=mysqli_query($link,$query);
while($row=mysqli_fetch_assoc($query_for_profile)){
$name=$row['name'];
  $email=$row['email'];
  $grade=$row["grade"];


}


?>


         


         <section class="content">
     
      <div class="row">
        <!-- left column -->
        <div class="col-xl-6 col-lg-12">
          <!-- general form elements -->
          <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">Submit Assigement</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" class="form-element">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName"> Name </label>
                  <input type="text" class="form-control" value="<?php echo "$name"; ?>" name="name" id="exampleInputName" readonly/>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                  <input type="email" class="form-control"  value="<?php echo "$email"; ?>" name="email" id="exampleInputEmail" readonly/>
                </div>
                
            

                <div class="form-group">
                  <label for="exampleInputGrade">Grade</label>
                  <input type="number" class="form-control" value="<?php echo "$grade"; ?>"  name="grade" id="exampleInputGrade" readonly/>
                </div>

                 <div class="form-group">
                  <label for="exampleInputFile">Upload document:-</label>
                  <input type="file" name="file" id="exampleInputFile">
                </div>


             <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-danger">Submit</button>
              </div>
            </form>
          </div>
                
        
            </div>
          </div>
        </section>
      </section>
    </div>



<?php 
if(isset($_POST['submit'])){


    $assigement_document_upload=$_FILES['file']['name'];
    $pic_upload_temp=$_FILES['file']['tmp_name'];
    move_uploaded_file($pic_upload_temp,"../teacher_login_templete/submitted_assigement_document/$assigement_document_upload");


                

    $email=$_SESSION['email'];
$query_for_student_id="SELECT * FROM `students_details` WHERE email='{$email}'";
if($result=mysqli_query($link,$query_for_student_id)){
   $row=mysqli_fetch_assoc($result);
        $student_id=$row['student_id'];
}



$assigement_id=$_GET['submit_assigement_id'];

$query_for_join="SELECT assigement_id FROM assigement_record WHERE assigement_id='{$assigement_id}' ";
$result=mysqli_query($link,$query_for_join);
   $row=mysqli_fetch_assoc($result);
        $assigement_id=$row['assigement_id'];



$query="INSERT INTO `assigement_received_details`(`assigement_submited_student_id`,`assigement_record_id`, `submitted_document_details`) VALUES('$student_id','$assigement_id','$assigement_document_upload')";

       if(mysqli_query($link, $query)){

                       

?>


<script type="text/javascript">
                          swal(
                           'Good job!',
                              'Your post is UPDATED!',
                             'added'
                             );
                        window.location.href="view_profile.php";
                      </script>
                      
<?php
}
}
?>






                       
   
        
   <?php include"include/footer.php"?>
