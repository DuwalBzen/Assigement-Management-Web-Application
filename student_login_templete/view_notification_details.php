 <?php include "include/header.php";?>

<?php include "include/leftsidenav.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        


 <?php 
$email=$_SESSION['email'];
$query_for_teacher_id="SELECT grade FROM students_details WHERE email='{$email}'";
if($result=mysqli_query($link,$query_for_teacher_id)){
   $row=mysqli_fetch_assoc($result);
        $student_grade=$row['grade'];
}
?>

 <?php 

 $query = "SELECT name,assigement_id,title,description, document_upload,assigement_start_date,assigement_end_date FROM assigement_record JOIN teacher_details ON assigement_record.assigement_given_by_teacher_id=teacher_details.id  WHERE assigement_given_student_grade_id='$student_grade' ORDER BY assigement_id desc";
 $result = mysqli_query($link, $query); 
 ?>



  <section class="content">
    <div class="row">
      <div class="col-12">
      

        
          <div class="col-12">
          <div class="box box-solid bg-primary">
          <div class="box-header with-border">
          <h4 class="box-title"> View Notification :-</h4>
        </div>
            <div class="box-body">
              <div class="table-responsive">
        <table id="employeelist" class="table table-hover no-wrap" data-page-size="10">
          <thead>
            <tr>
             <th>  Id </th>
             <th>  Assigement Given By </th>
             <th> Title </th>
             <th>  Description </th>
            <th> View Document </th>
            <th> Assigement start date </th>
            <th> Assigement end date </th>
            <th> Days remaining </th>
            </tr>
          </thead>
          <tbody>

<?php
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_array($result)) {
      
    $assigement_id=$row["assigement_id"];
     $name=$row["name"];
    $title=$row["title"];
    $description=$row["description"];
    $document_upload=$row["document_upload"];
     $assigement_start_date=$row["assigement_start_date"];
    $assigement_end_date=$row["assigement_end_date"];


   $datetime1 = strtotime($assigement_start_date);
      $datetime2 = strtotime($assigement_end_date);
          $secs = $datetime2 - $datetime1;// == <seconds between the two times>
          $days = $secs / 86400;
          if($days==6){

    echo "<tr>";
    echo "<tr>";
    echo "<td>{$assigement_id}</td>";
    echo "<td>{$name}</td>";
    echo "<td>{$title}</td>";
    echo "<td>{$description}</td>"; 
    echo "<td><a href='../teacher_login_templete/assigement_document/{$document_upload}''target='-parent'> {$document_upload} </a></td>"; 
    echo "<td>{$assigement_start_date}</td>";
    echo "<td>{$assigement_end_date}</td>";
    
          $datetime1 = strtotime($assigement_start_date);
          $datetime2 = strtotime($assigement_end_date);
          $secs = $datetime2 - $datetime1;// == <seconds between the two times>
          $days = $secs / 86400;
          if($days>0){
          echo "<td> $days</td>"; 
          }else{
          echo "<td> Expired </td>";
          }



   echo "<td><a href='view_Assigement_details.php?source=edit_post&p_id={$assigement_id}' class='btn btn-primary'role='button'> View </a> </td>";
   echo "<td><a href='submit_assigement.php?submit_assigement_id={$assigement_id}' class='btn btn-primary'role='button'> Submit </a> </td>";

    echo "</tr>";
           
      }
  
    
 }       
}

 ?>   
          </tfoot>
        </table>

      <!-- /.row -->

        <!-- /.box-body -->

        </div>
        <!-- /.box -->
      </div>
 


      </section>
    </div>




<?php include"include/footer.php"?>