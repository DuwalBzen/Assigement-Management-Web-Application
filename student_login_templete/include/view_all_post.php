
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
          <h4 class="box-title">Your Assigement history :-</h4>
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


    //echo "<td><a href='view_Assigement.php?delete={$assigement_id}' class='btn btn-danger'role='button'> Delete </a> </td>";
    echo "</tr>";
 }       
}

 ?>   
          </tfoot>
        </table>

<div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Add New Contact</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="modal-body">
                <from class="form-horizontal form-element">                       
                  <div class="col-md-12 mb-20">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Type name"> </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Email"> </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Phone"> </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Designation"> </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Age"> </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Date of joining"> </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Salary"> </div>
                    <div class="form-group">
                      <div class="fileupload btn btn-danger">
                        <div class="file-group">
                          <span><i class="fa fa-camera file-browser mr-10"></i>Upload Contact Image</span>
                          <input type="file">
                        </div>
                      </div>
                    </div>
                  </div>
                </from>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-default float-right" data-dismiss="modal">Cancel</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
    
      <!-- /.row -->

        <!-- /.box-body -->

        </div>
        <!-- /.box -->
      </div>
 