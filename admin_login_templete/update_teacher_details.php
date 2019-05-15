
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
              <h4 class="box-title">Provide teacher name and faculty</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" class="form-element">
              <div class="box-body">
               
                
                 
                 <div class="form-group">
                  <label for="exampleInputName">  Name </label>
                  <input type="text" class="form-control" name="name" id="exampleInputName" >
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputName">  Faculty </label>
                  <input type="text" class="form-control" name="faculty" id="exampleInputName" >
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
         
         <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">Teacher details</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
           <th>  Id </th>
           <th> Name </th>
           <th>  Faculty </th>
           <th> Address </th>
           <th> Email </th>
           <th> Phone no </th>
          <th> Lectural class</th>
          <th> Password</th>
            </tr>
          </thead>
          <tbody>

<?php
  $query ="SELECT  * FROM teacher_details WHERE name='".mysqli_real_escape_string($link,$_POST['name'])."' and faculty='".mysqli_real_escape_string($link,$_POST['faculty'])."'";

          $result = mysqli_query($link, $query); 

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_array($result)) {

    $teacher_id=$row['id'];
    $teacher_name=$row['name'];
    $teacher_faculty=$row['faculty'];
    $teacher_email=$row['email'];
    $teacher_address=$row['address'];
    $teacher_phone_no=$row['phone_no'];
    $teacher_lecture_class=$row['lecture_class'];
    $teacher_password=$row['password'];
  
    echo "<tr>";
    echo "<td>{$teacher_id}</td>";
    echo "<td>{$teacher_name}</td>";
    echo "<td>{$teacher_faculty}</td>";
    echo "<td>{$teacher_email}</td>"; 
    echo "<td>{$teacher_address}</td>"; 
    echo "<td>{$teacher_phone_no}</td>";
    echo "<td>{$teacher_lecture_class}</td>";
     echo "<td>{$teacher_password}</td>";
       echo "<td><a href='update_teacher_info.php?teacher_id={$teacher_id}' class='btn btn-primary'role='button'> Update </a> </td>";
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
