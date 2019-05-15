 <?php include "include/header.php";?>

<?php include "include/leftsidenav.php"?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
                      
<?php

 
$email=$_SESSION['email'];

$query ="SELECT * from teacher_details WHERE email='$email'";
$query_for_profile=mysqli_query($link,$query);
while($row=mysqli_fetch_assoc($query_for_profile)){
$name=$row['name'];
  $faculty=$row['faculty'];
  $email=$row['email'];
  $address=$row["address"];
  $phone_no=$row['phone_no'];
  $lecture_class=$row['lecture_class'];
  $password=$row['password'];

}


?>

<section class="content">
     
      <div class="row">
        <!-- left column -->
        <div class="col-xl-7 col-lg-12">
          <!-- general form elements -->
          <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">Update Your profile</h4>
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
                  <label for="exampleInputEmail">Faculty</label>
                  <input type="text" class="form-control"  value="<?php echo "$faculty"; ?>" name="faculty" id="exampleInputEmail" >
                </div>
                
                <div class="form-group">
                  <label for="exampleInputAddress">Email</label>
                  <input type="email" class="form-control"   value="<?php echo "$email"; ?>" name="email" id="exampleInputAddress" >
                </div>

                <div class="form-group">
                  <label for="exampleInputGrade">Address</label>
                  <input type="text" class="form-control" value="<?php echo "$address"; ?>"  name="address" id="exampleInputGrade" >
                </div>

                <div class="form-group">
                  <label for="exampleInputGuardianName">Contact no</label>
                  <input type="number" class="form-control" value="<?php echo "$phone_no"; ?>" name="phone_no" id="exampleInputGuardianName" >
                </div>

                <div class="form-group">
                  <label for="exampleInputGuardiancontactno">Lecture class</label>
                  <input type="text" class="form-control" value="<?php echo "$lecture_class"; ?>" name="lecture_class" id="exampleInputGuardiancontactno">
                </div>

                <div class="form-group">
                  <label for="exampleInputpassword">Password</label>
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
  $faculty=$_POST['faculty'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $phone_no=$_POST['phone_no'];
  $lecture_class=$_POST['lecture_class'];
  $password=$_POST['password'];

$query_for_student_profile_update="UPDATE `teacher_details`  SET `name`='{$name}',`faculty`='{$faculty}',`email`='{$email}',`address`='{$address}',`phone_no`='{$phone_no}',`lecture_class`='{$lecture_class}',`password`='{$password}' WHERE email='$email'";

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
