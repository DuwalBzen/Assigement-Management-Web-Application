 <?php include "include/header.php";?>

<?php include "include/leftsidenav.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        




<section class="content">
     
      <div class="row">
        <!-- left column -->
        <div class="col-xl-8 col-lg-12">
          <!-- general form elements -->
          <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">Add New Assigement</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" class="form-element">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName"> Title </label>
                  <input type="text" class="form-control" name="title" id="exampleInputName" >
                </div>

                 <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="3" name="description" placeholder="Enter ..."></textarea>
                </div>

                
                 <div class="form-group">
                  <label for="exampleInputFile">Upload document:-</label>
                  <input type="file" name="file" id="exampleInputFile">
                </div>
                
              <div class="form-group">
                  <label>Assigement given to</label>
                  <select  name="grade" class="form-control">
                    <option value="">Select grade</option>
                    <option value="8">Grade 8</option>
                    <option value="9">Grade 9</option>
                    <option value="10">Grade 10</option>
                  </select>
                </div>

              <div class="form-group">
                  <label for="exampleInputName"> Assigement start date </label>
                  <input type="date" class="form-control" name="assigement_start_date" id="exampleInputName" >
                </div>

                <div class="form-group">
                  <label for="exampleInputName"> Assigement end date  </label>
                  <input type="date" class="form-control" name="assigement_end_date" id="exampleInputName" >
                </div>
             
       <div class="form-group">
          <input class="btn btn-primary" type="submit" value"submit" name="submit">
      </div>
                
              
              


                </form>
              </div>
            </div>
          </div>
        </section>
      </section>
    </div>

<?php

$email=$_SESSION['email'];

$query_for_teacher_id="SELECT id FROM teacher_details WHERE email='{$email}'";
if($result=mysqli_query($link,$query_for_teacher_id)){
   $row=mysqli_fetch_assoc($result);
        $teacher_id=$row['id'];
}
?>

<?php 
if (array_key_exists("submit", $_POST)) {



   $assigement_document_upload=$_FILES['file']['name'];
    $pic_upload_temp=$_FILES['file']['tmp_name'];
    move_uploaded_file($pic_upload_temp,"assigement_document/$assigement_document_upload");



       
$query="INSERT INTO `assigement_record`(`title`,`description`, `document_upload`, `assigement_start_date`,`assigement_end_date`, `assigement_given_by_teacher_id`, `assigement_given_student_grade_id`) VALUES('".mysqli_real_escape_string($link,$_POST['title'])."','".mysqli_real_escape_string($link,$_POST['description'])."','$assigement_document_upload','".mysqli_real_escape_string($link,$_POST['assigement_start_date'])."','".mysqli_real_escape_string($link,$_POST['assigement_end_date'])."','$teacher_id','".mysqli_real_escape_string($link,$_POST['grade'])."')";

       if(mysqli_query($link, $query)){

                       
?>

<script type="text/javascript">
                          swal(
                           'Good job!',
                              'Your post is ADDED!',
                             'added'
                             );
                        window.location.href="view_Assigement.php";
                      </script>

<?php

}
                    }

                
                
           
                        
                    

?>



<?php include"include/footer.php"?>