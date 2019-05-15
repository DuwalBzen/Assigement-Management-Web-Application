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
  $address=$row['address'];
  $grade=$row["grade"];
  $guardian_name=$row['guardian_name'];
  $guardian_phone_no=$row['guardian_phone_no'];
  $password=$row['password'];

}


?>

<section class="content">
     
      <div class="row">
        <!-- left column -->
        <div class="col-xl-6 col-lg-12">
          <!-- general form elements -->
          <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">Your profile</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"  method="post" class="form-element">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName"> Name </label>
                  <input type="text" class="form-control" value="<?php echo "$name"; ?>" name="name" id="exampleInputName" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                  <input type="email" class="form-control"  value="<?php echo "$email"; ?>" name="email" id="exampleInputEmail" >
                </div>
                
                <div class="form-group">
                  <label for="exampleInputAddress">Address</label>
                  <input type="text" class="form-control"   value="<?php echo "$address"; ?>" name="address" id="exampleInputAddress" >
                </div>

                <div class="form-group">
                  <label for="exampleInputGrade">Grade</label>
                  <input type="number" class="form-control" value="<?php echo "$grade"; ?>"  name="grade" id="exampleInputGrade" >
                </div>

                <div class="form-group">
                  <label for="exampleInputGuardianName">Guardian Name</label>
                  <input type="text" class="form-control" value="<?php echo "$guardian_name"; ?>" name="guardian_name" id="exampleInputGuardianName" >
                </div>

                <div class="form-group">
                  <label for="exampleInputGuardiancontactno">Guardian contact no</label>
                  <input type="number" class="form-control" value="<?php echo "$guardian_phone_no"; ?>" name="guardian_phone_no" id="exampleInputGuardiancontactno">
                </div>

                <div class="form-group">
                  <label for="exampleInputpassword">password</label>
                  <input type="text"  value="<?php echo "$password"; ?>"  class="form-control" name="password" id="exampleInputpassword" >
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

  $name=$_POST['name'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $grade=$_POST['grade'];
  $guardian_name=$_POST['guardian_name'];
  $guardian_phone_no=$_POST['guardian_phone_no'];
  $password=$_POST['password'];

$query_for_student_profile_update="UPDATE `students_details`  SET `name`='{$name}',`email`='{$email}',`address`='{$address}',`grade`='{$grade}',`guardian_name`='{$guardian_name}',`guardian_phone_no`='{$guardian_phone_no}',`password`='{$password}' WHERE email='$email'";

if(mysqli_query($link,$query_for_student_profile_update)){
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
