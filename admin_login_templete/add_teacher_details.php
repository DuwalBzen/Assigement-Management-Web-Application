 <?php include "include/header.php";?>

<?php include "include/leftsidenav.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        




<section class="content">
     
      <div class="row">
        <!-- left column -->
        <div class="col-xl-6 col-lg-12">
          <!-- general form elements -->
          <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">Add New Teacher</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" class="form-element">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName"> Teacher Name </label>
                  <input type="text" class="form-control" name="name" id="exampleInputName" >
                </div>

                 
                <div class="form-group">
                  <label for="exampleInputName">  faculty </label>
                  <input type="text" class="form-control" name="faculty" id="exampleInputName" >
                </div>
              
              <div class="form-group">
                  <label for="exampleInputName">  Email </label>
                  <input type="text" class="form-control" name="email" id="exampleInputName" >
                </div>

              <div class="form-group">
                  <label for="exampleInputName">  Address </label>
                  <input type="text" class="form-control" name="address" id="exampleInputName" >
                </div>
          
            


            <div class="form-group">
                  <label for="exampleInputName">  Contact no </label>
                  <input type="text" class="form-control" name="contact_no" id="exampleInputName" >
                </div>


            <div class="form-group">
                  <label for="exampleInputName">  Lectural Class </label>
                  <input type="number" class="form-control" name="lecture_class" id="exampleInputName" >
                </div>
              
              <div class="form-group">
                  <label for="exampleInputName">  Password </label>
                  <input type="password" class="form-control" name="password" id="exampleInputName" >
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
if (isset($_POST['submit'])) {

$query="INSERT INTO `teacher_details`(`name`, `faculty`, `email`, `address`, `phone_no`, `lecture_class`, `password`) VALUES ('".mysqli_real_escape_string($link,$_POST['name'])."','".mysqli_real_escape_string($link,$_POST['faculty'])."','".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['address'])."','".mysqli_real_escape_string($link,$_POST['contact_no'])."','".mysqli_real_escape_string($link,$_POST['lecture_class'])."','".mysqli_real_escape_string($link,$_POST['password'])."')";


       if(mysqli_query($link, $query)){
 
                       
?>

<script type="text/javascript">
                          swal(
                           'Good job!',
                              'Your post is ADDED!',
                             'added'
                             );
                        window.location.href="view_profile.php";
                      </script>

<?php

}
                    }

                
                
           
                        
                    

?>



<?php include"include/footer.php"?>