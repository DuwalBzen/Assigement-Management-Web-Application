 <?php include "include/header.php";?>

<?php include "include/leftsidenav.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
  
        <!-- /.col -->

      
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
        <div class="col-lg-4">
          <!-- Profile Image -->
          <div class="box">
            <div class="box-body box-profile">
              <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="../images/5.png" alt="User profile picture">
              <h3 class="profile-username text-center"><?php echo "$name"; ?></h3>
              <h3> <p class="text-center"> Grade <?php echo "$grade"; ?></p> </h3>     
              <div class="row social-states">
          
          
        </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-lg-4">
          <!-- Profile Image -->
          <div class="box">
            <div class="box-body box-profile">
        <div class="profile-user-info">
          <p>Email address </p>
          <h4 class="mb-20"><?php echo "$email"; ?></h4>
          <p>Guardian name</p>
          <h4><?php echo "$guardian_name"; ?></h4>
          <p>Parent Phone</p>
          <h4 class="mb-20"><?php echo "$guardian_name"; ?></h4> 
           <p>Password</p>
          <h4><?php echo "$password"; ?></h4>
        
        </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      
        <div class="col-lg-4">
          <!-- Profile Image -->
          <div class="box">
            <div class="box-body box-profile">
                <div class="map-box mb-20">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2805244.1745767146!2d-86.32675167439648!3d29.383165774894163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c1766591562abf%3A0xf72e13d35bc74ed0!2sFlorida%2C+USA!5e0!3m2!1sen!2sin!4v1501665415329" height="150" class="no-border w-p100" allowfullscreen></iframe>
        </div>
        <div class="user-social-acount">
          <button class="btn btn-circle btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></button>
          <button class="btn btn-circle btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></button>
          <button class="btn btn-circle btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></button>
        </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

</div>
</section>
      </section>
    </div>
  
        
   <?php include"include/footer.php"?>
