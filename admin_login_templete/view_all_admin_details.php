 <?php include "include/header.php";?>

<?php include "include/leftsidenav.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
  
        <!-- /.col -->


<section class="content">
      <div class="row">
        <div class="col-12">
         
         <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">View all admin details</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Phone no</th>
              <th>Address</th>
              <th>email</th>
             
            </tr>
          </thead>
          <tbody>

            <?php

            $query ="SELECT * from admin_details";
            $query_for_profile=mysqli_query($link,$query);
            while($row=mysqli_fetch_assoc($query_for_profile)){
            $name=$row['name'];
            $phone_no=$row['phone_no'];
            $address=$row['address'];
           // $password=$row["password"];
            $email=$row['email'];



            echo "<tr>";
            echo "<td>{$name}</td>";
            echo "<td>{$phone_no}</td>";
            echo "<td>{$address}</td>"; 
            //echo "<td>{$password}</td>"; 
            echo "<td>{$email}</td>";
            echo "</tr>";
           }
           ?>
            
          </tbody>
          <tfoot>
          
          </table>
        </div>
            </div>
            <!-- /.box-body -->
          </div>




</div>
</div>
</section>

      </section>
    </div>
  
        
   <?php include"include/footer.php"?>
