
<?php include "include/header.php"?>
<?php include "include/leftsidenav.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
  
        <!-- /.col -->
    
         <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            View students details
                            
                        </h1>
                       
                    </div>
                </div>     


          <section class="content">
     
      <div class="row">
        <!-- left column -->
        <div class="col-xl-6 col-lg-12">
          <!-- general form elements -->
          <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">Select grade of student for view</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" class="form-element">
              <div class="box-body">
               
                
              <div class="form-group">
                 
                  <select  name="grade" class="form-control">
                    <option value="">Select grade</option>
                    <option value="8">Grade 8</option>
                    <option value="9">Grade 9</option>
                    <option value="10">Grade 10</option>
                  </select>
                </div>

             
             
       <div class="form-group">
          <input class="btn btn-primary" type="submit"  name="submit">
      </div>
                
              
              


        </div>
      </form>
    </div>
  </div>
</div>
</section>
    

<?php 
if(isset($_POST['submit'])){

?>

    <section class="content">
    <div class="row" >
    <div class="col-12 col-xl-3"  >
       <div class="box text-center" >
        <div class="box-body bg-danger" >            
          <h3 class="price">
      

          <?php
          $query = "SELECT  * FROM students_details WHERE grade='".mysqli_real_escape_string($link,$_POST['grade'])."'";

          $result = mysqli_query($link, $query); 
          $post_count=mysqli_num_rows($result);

          echo  $post_count;          

          ?>


          </h3>

          <p class="btn btn-flat btn-round btn-danger">Total Student</p>
        </div>
      </div>
  
      </div>  
</div>
</section>



<section class="content">
      <div class="row">
        <div class="col-12">
         
         <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">Student details</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
           <th>  Id </th>
           <th> Name </th>
           <th>  Email </th>
           <th> Address </th>
           <th> Grade </th>
           <th> Guardian Name </th>
          <th> Guardian contact no</th>
          <th> Password</th>
            </tr>
          </thead>
          <tbody>

<?php
  $query = "SELECT  * FROM students_details WHERE grade='".mysqli_real_escape_string($link,$_POST['grade'])."'";

          $result = mysqli_query($link, $query); 

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_array($result)) {

      $student_id=$row['student_id'];
    $name=$row['name'];
    $email=$row['email'];
    $address=$row['address'];
    $grade=$row['grade'];
    $guardian_name=$row['guardian_name'];
    $guardian_phone_no=$row['guardian_phone_no'];
    $password=$row['password'];
  
    echo "<tr>";
    echo "<td>{$student_id}</td>";
    echo "<td>{$name}</td>";
    echo "<td>{$email}</td>";
    echo "<td>{$address}</td>"; 
    echo "<td>{$grade}</td>"; 
    echo "<td>{$guardian_name}</td>";
    echo "<td>{$guardian_phone_no}</td>";
     echo "<td>{$password}</td>";
    echo "</tr>";
 }       
}

 ?>  

 </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<?php } ?>

          <!-- /.row -->
        </div>   

</section>




  </div>
  <!-- /.content-wrapper -->
  
  	
	 
	  
<?php include "include/footer.php"; ?>
