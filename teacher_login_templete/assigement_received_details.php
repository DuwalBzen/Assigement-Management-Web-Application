 <?php include "include/header.php";?>

<?php include "include/leftsidenav.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
  
        <!-- /.col -->

      


 
 <section class="content">
     

 <?php 
 $assigement_id=$_GET['p_id'];

?>

 <?php 

 $query = "SELECT name,assigement_id,title,faculty,description, document_upload,assigement_start_date,assigement_end_date FROM assigement_record JOIN teacher_details ON assigement_record.assigement_given_by_teacher_id=teacher_details.id  WHERE assigement_id='$assigement_id' ORDER BY assigement_id desc";
 $result = mysqli_query($link, $query); 
 ?>



<?php
if (mysqli_num_rows($result) > 0) {
    
    $row = mysqli_fetch_assoc($result);
      
    $assigement_id=$row["assigement_id"];
     $name=$row["name"];
    $faculty=$row["faculty"];
    $title=$row["title"];
    $description=$row["description"];
    $document_upload=$row["document_upload"];
     $assigement_start_date=$row["assigement_start_date"];
    $assigement_end_date=$row["assigement_end_date"];
  
    
       
}

 ?>   
    
    <div class="row">
        <div class="col-lg-9">
          <!-- Profile Image -->
          <div class="box">
            <div class="box-body box-profile">
              
              <h3 class="profile-username text-center">Assigement id :-  <?php echo "$assigement_id"; ?></h3>

              <h3 class="profile-username text-center">Assigement Given By :-  <?php echo "$name"; ?></h3>
   
              <div class="row social-states">
           <div class="box">
            <div class="box-body box-profile">
        <div class="profile-user-info">

          <p>Teacher Faculty </p>
          <h4 class="mb-20"><?php echo "$faculty"; ?></h4>
          <p>Assigemet Title </p>
          <h4><?php echo "$title"; ?></h4>
          <p>Assigemet Description</p>
          <h4 class="mb-20"><?php echo "$description"; ?></h4> 
           <p>Document </p>
          <h4><a href='../teacher_login_templete/assigement_document/<?php echo "$document_upload"; ?>' target='-parent'><?php echo "$document_upload"; ?> </a></h4>
           <p>Assigement Given date </p>
          <h4><?php echo "$assigement_start_date"; ?></h4>
           <p>Assigement dateline </p>
          <h4><?php echo "$assigement_end_date"; ?></h4>
        
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
