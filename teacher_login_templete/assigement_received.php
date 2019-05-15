 <?php include "include/header.php";?>

<?php include "include/leftsidenav.php"?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      



 <?php 
$email=$_SESSION['email'];
$query_for_teacher_id="SELECT id FROM teacher_details WHERE email='{$email}'";
if($result=mysqli_query($link,$query_for_teacher_id)){
   $row=mysqli_fetch_assoc($result);
        $teacher_id=$row['id'];
}
?>

<?php
 $query = "SELECT assigement_id,title,description,document_upload,assigement_start_date,assigement_end_date,name,grade,received_time,submitted_document_details  FROM assigement_record JOIN assigement_received_details ON assigement_record.assigement_id=assigement_received_details.assigement_record_id JOIN students_details ON students_details.student_id=assigement_received_details.assigement_submited_student_id WHERE assigement_given_by_teacher_id='$teacher_id' ORDER BY received_time desc";
 $result = mysqli_query($link, $query); 
 ?>


 <section class="content">
    <div class="row">
      <div class="col-12">
      

        
          <div class="col-12">
          <div class="box box-solid bg-primary">
          <div class="box-header with-border">
          <h4 class="box-title">Assigement Received history :-</h4>
        </div>
            <div class="box-body">
              <div class="table-responsive">
        <table id="employeelist" class="table table-hover no-wrap" data-page-size="10">
          <thead>
            <tr>
            <th>  Id </th>
                <th> Title </th>
                <th>  Description </th>
                <th> Document Given </th,>
                <th> Assigement start date </th>
                <th> Assigement end date </th>
                <th> Assigement submitted by </th>
                <th> Document received </th>
                <th> Assigement submitted date </th>
                <th> Assigement given to Grade</th>
            </tr>
          </thead>
          <tbody>

<?php

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_array($result)) {
      
    $assigement_id=$row['assigement_id'];
    $title=$row['title'];
    $description=$row['description'];
    $document_upload=$row['document_upload'];
    $assigement_start_date=$row['assigement_start_date'];
    $assigement_end_date=$row['assigement_end_date'];
    $name=$row['name'];
    $submitted_document_details=$row['submitted_document_details'];
    $received_time=$row['received_time'];
    $grade=$row['grade'];

  
    echo "<tr>";
    echo "<td>{$assigement_id}</td>";
    echo "<td>{$title}</td>";
    echo "<td>{$description}</td>"; 
    echo "<td>{$document_upload}<a href='assigement_document/{$document_upload}'  target='-parent' type='application/pdf'>link</a></td>"; 
    echo "<td>{$assigement_start_date}</td>";
    echo "<td>{$assigement_end_date}</td>";
    echo "<td>{$name}</td>";
    echo "<td><a href='submitted_assigement_document/{$submitted_document_details}' target='-parent'> {$submitted_document_details} </a></td>";
    echo "<td>{$received_time}</td>";
    echo "<td>{$grade}</td>";
  
   echo "<td><a href='assigement_received_details.php?p_id={$assigement_id}' class='btn btn-primary'role='button'> View </a> </td>";
    echo "<td><a href='view_Assigement.php?delete={$assigement_id}' class='btn btn-danger'role='button'> Delete </a> </td>";
    echo "</tr>";
 }       
}

 ?>   


</tbody>
</table>
                 
<?php
        if(isset($_GET['delete'])){
          $idd=$_GET['delete'];
            
    $query_for_delete = "Delete FROM assigement_record WHERE assigement_id=assigement_id LIMIT 1";
      if(mysqli_query($link, $query_for_delete)){
?>
<script type="text/javascript">
                          swal(
                           'Good job!',
                              'Bid Is Successful!',
                             'added'
                             );
                        window.location.href="view_assigement.php";
                      </script>
  <?php
}
   
    }
?>         




<?php include "include/footer.php"?>
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        
   <?php include"include/footer.php"?>
