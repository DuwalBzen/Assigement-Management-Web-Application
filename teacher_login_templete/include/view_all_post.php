


 <?php 
$email=$_SESSION['email'];
$query_for_teacher_id="SELECT id FROM teacher_details WHERE email='{$email}'";
if($result=mysqli_query($link,$query_for_teacher_id)){
   $row=mysqli_fetch_assoc($result);
        $teacher_id=$row['id'];
}
?>

<?php
 $query = "SELECT * FROM  `assigement_record` WHERE assigement_given_by_teacher_id='$teacher_id' ORDER BY assigement_id desc";
 $result = mysqli_query($link, $query); 
 ?>


  <section class="content">
    <div class="row">
      <div class="col-12">
      

        
          <div class="col-12">
          <div class="box box-solid bg-primary">
          <div class="box-header with-border">
          <h4 class="box-title">Your Assigement history :-</h4>
        </div>
            <div class="box-body">
              <div class="table-responsive">
        <table id="employeelist" class="table table-hover no-wrap" data-page-size="10">
          <thead>
            <tr>
           <th>  Id </th>
           <th> Title </th>
           <th>  Description </th>
           <th> Document Upload </th>
           <th> Assigement start date </th>
           <th> Assigement end date </th>
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
    $assigement_given_student_grade_id=$row['assigement_given_student_grade_id'];
  
    echo "<tr>";
    echo "<td>{$assigement_id}</td>";
    echo "<td>{$title}</td>";
    echo "<td>{$description}</td>"; 
     echo "<td><a href='../teacher_login_templete/assigement_document/{$document_upload}''target='-parent'> {$document_upload} </a></td>";
    echo "<td>{$assigement_start_date}</td>";
    echo "<td>{$assigement_end_date}</td>";
     echo "<td>{$assigement_given_student_grade_id}</td>";
  
   echo "<td><a href='view_Assigement.php?source=edit_post&p_id={$assigement_id}' class='btn btn-primary'role='button'> Edit </a> </td>";
    echo "<td><a href='view_Assigement.php?delete={$assigement_id}' class='btn btn-primary'role='button'> Delete </a> </td>";
    echo "</tr>";
 }       
}

 ?>  
          </tfoot>
        </table>
<?php
        if(isset($_GET['delete'])){
          $idd=$_GET['delete'];

$query_for="DELETE FROM assigement_record,assigement_received_details WHERE assigement_id={$idd}";
mysqli_query($link,$query_for);

     $query_for_assigement_record ="Delete FROM assigement_record WHERE assigement_id={$idd}";
     mysqli_query($link,$query_for_assigement_record);

    $query_for_assigement_received_details ="Delete FROM assigement_received_details WHERE assigement_record_id={$idd}";
    mysqli_query($link,$query_for_assigement_received_details);
      

   
?>
<script type="text/javascript">
                          swal(
                           'Good job!',
                              'Delete Is Successful!',
                             'added'
                             );
                        window.location.href="view_assigement.php";
                      </script>
  <?php

   
    }
?>      