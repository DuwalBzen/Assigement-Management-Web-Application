 <?php include "include/header.php";?>

<?php include "include/leftsidenav.php"?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      




 <?php 
$email=$_SESSION['email'];
$query_for_student_id="SELECT student_id FROM students_details WHERE email='{$email}'";
if($result=mysqli_query($link,$query_for_student_id)){
   $row=mysqli_fetch_assoc($result);
        $student_id=$row['student_id'];
}
?>

 <?php 

 $query = "SELECT name,title,description,assigement_id,document_upload,submitted_document_details,assigement_given_by_teacher_id,received_time FROM assigement_record JOIN assigement_received_details ON assigement_record.assigement_id=assigement_received_details.assigement_record_id JOIN teacher_details ON teacher_details.id=assigement_record.assigement_given_by_teacher_id WHERE assigement_submited_student_id='$student_id' ORDER BY received_time desc";
 $result = mysqli_query($link, $query); 
 ?>

   <section class="content">
    <div class="row">
      <div class="col-12">
      

        
          <div class="col-12">
          <div class="box box-solid bg-primary">
          <div class="box-header with-border">
          <h4 class="box-title">Your Submitted Assigement history :-</h4>
        </div>
            <div class="box-body">
              <div class="table-responsive">
        <table id="employeelist" class="table table-hover no-wrap" data-page-size="10">
          <thead>
            <tr>
              <th>  Assigement Given By </th>
              <th> Title </th>
              <th>  Description </th>
              <th> View Recived assigment Document </th>
              <th> View Submited date </th>
              <th> View Submitted assigment Document </th>
            </tr>
          </thead>
          <tbody>

<?php
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_array($result)) {
      
     $assigement_given_by_teacher_name=$row["name"];
     $assigement_id=$row["assigement_id"];
    $title=$row["title"];
    $description=$row["description"];
    $document_upload=$row["document_upload"];
    $received_time=$row["received_time"];
    $submitted_document_details=$row["submitted_document_details"];

  
    echo "<tr>";
    echo "<td>{$assigement_given_by_teacher_name}</td>";
    echo "<td>{$title}</td>";
    echo "<td>{$description}</td>"; 
    echo "<td>{$document_upload}</td>"; 
    echo "<td>{$received_time}</td>"; 
    echo "<td><a href='../teacher_login_templete/submitted_assigement_document/{$submitted_document_details}' 'target='-parent'> {$submitted_document_details} </a></td>"; 
    echo "<td><a href='submit_assigement_details.php?submit_assigement_id={$assigement_id}' class='btn btn-primary'role='button'> View details </a> </td>";

    //echo "<td><a href='view_Assigement.php?delete={$assigement_id}' class='btn btn-danger'role='button'> Delete </a> </td>";
    echo "</tr>";
 }       
}

 ?>   


</tbody>
</table>
                 

                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        
   <?php include"include/footer.php"?>
