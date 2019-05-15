 <?php include "include/header.php";?>

<?php include "include/leftsidenav.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
  
        <!-- /.col -->

      


 
 <section class="content">
     

 <?php 
 $assigement_id=$_GET['submit_assigement_id'];

?>


 <?php 

 $query = "SELECT name,title,faculty,description,assigement_id,document_upload,submitted_document_details,assigement_given_by_teacher_id,received_time FROM assigement_record JOIN assigement_received_details ON assigement_record.assigement_id=assigement_received_details.assigement_record_id JOIN teacher_details ON teacher_details.id=assigement_record.assigement_given_by_teacher_id WHERE  assigement_id='$assigement_id' ORDER BY received_time desc";
 $result = mysqli_query($link, $query); 
 ?>




<?php
if (mysqli_num_rows($result) > 0) {
    
    $row = mysqli_fetch_assoc($result);
      
      $assigement_given_by_teacher_name=$row["name"];
     $assigement_id=$row["assigement_id"];
      $faculty=$row["faculty"];
    $title=$row["title"];
    $description=$row["description"];
    $document_upload=$row["document_upload"];
    $received_time=$row["received_time"];
    $submitted_document_details=$row["submitted_document_details"];
    
       
}

 ?>   
    
    <div class="row">
        <div class="col-lg-9">
          <!-- Profile Image -->
          <div class="box">
            <div class="box-body box-profile">
              

              <h3 class="profile-username text-center">Assigement Given By :-  <?php echo "$assigement_given_by_teacher_name"; ?></h3>

               <h3 class="profile-username text-center">Title :-  <?php echo "$title"; ?></h3>
   
              <div class="row social-states">
           <div class="box">
            <div class="box-body box-profile">
        <div class="profile-user-info">

          <p>Teacher Faculty </p>
          <h4 class="mb-20"><?php echo "$faculty"; ?></h4>
          <p>Assigemet Description</p>
          <h4 class="mb-20"><?php echo "$description"; ?></h4> 
           <p>Document Recevied</p>
          <h4><a href='../teacher_login_templete/assigement_document/<?php echo "$document_upload"; ?>' target='-parent'><?php echo "$document_upload"; ?> </a></h4>
           <p>Assigement Submitted time</p>
          <h4><?php echo "$received_time"; ?></h4>
           <p>Document Send </p>
          <h4><a href='../teacher_login_templete/submitted_assigement_document/<?php echo "$submitted_document_details"; ?>' target='-parent'><?php echo "$submitted_document_details"; ?> </a></h4>
        
        </div>
            </div>
          
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
