
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
                           Update students details
                            
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
              <h4 class="box-title">Select name and grade of student for view</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" class="form-element">
              <div class="box-body">
               
                
              <div class="form-group">

                   <div class="form-group">
                  <label for="exampleInputEmail">Name</label>
                  <input type="text" class="form-control" name="name" id="exampleInputEmail" >
                </div>
                 
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
    <div class="row">
      <div class="col-12">
      

        
          <div class="col-12">
          <div class="box box-solid bg-primary">
          <div class="box-header with-border">
          <h4 class="box-title">Student details :-</h4>
        </div>
            <div class="box-body">
              <div class="table-responsive">
        <table id="employeelist" class="table table-hover no-wrap" data-page-size="10">
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
  $query = "SELECT  * FROM students_details WHERE grade='".mysqli_real_escape_string($link,$_POST['grade'])."'  AND name='".mysqli_real_escape_string($link,$_POST['name'])."' ";

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


<?php



$query ="SELECT * from students_details WHERE grade='".mysqli_real_escape_string($link,$_POST['grade'])."'  AND name='".mysqli_real_escape_string($link,$_POST['name'])."' ";
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
              <h4 class="box-title">Edit Student </h4>
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
                <button type="submit" name="submit_update" class="btn btn-danger">Submit</button>
              </div>
            </form>
          </div>
                
        
            </div>
          </div>
        </section>
      </section>
    </div>



<?php 
if(isset($_POST['submit_update'])){

  $name=$_POST['name'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $grade=$_POST['grade'];
  $guardian_name=$_POST['guardian_name'];
  $guardian_phone_no=$_POST['guardian_phone_no'];
  $password=$_POST['password'];

$query_for_student_profile_update="UPDATE `students_details`  SET `name`='{$name}',`email`='{$email}',`address`='{$address}',`grade`='{$grade}',`guardian_name`='{$guardian_name}',`guardian_phone_no`='{$guardian_phone_no}',`password`='{$password}' WHERE email='$email'";

mysqli_query($link,$query_for_student_profile_update);


}
?>


<?php } ?>



          <!-- /.row -->
        </div>   

</section>




  </div>
  <!-- /.content-wrapper -->
  
    
   
    
<?php include "include/footer.php"; ?>
