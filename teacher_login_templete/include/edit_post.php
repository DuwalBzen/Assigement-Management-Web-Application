
      
<?php
 
    if(isset($_GET['p_id'])){
    
    $the_assigement_id =  $_GET['p_id'];

    }

$query ="SELECT * from assigement_record WHERE assigement_id='$the_assigement_id'";
$query_for_edit=mysqli_query($link,$query);
while($row=mysqli_fetch_assoc($query_for_edit)){
  $title=$row['title'];
  $description=$row['description'];
  $document_upload=$row['document_upload'];
  $assigement_start_date=$row['assigement_start_date'];
  $assigement_end_date=$row['assigement_end_date'];
 }


?>

<section class="content">
     
      <div class="row">
        <!-- left column -->
        <div class="col-xl-6 col-lg-12">
          <!-- general form elements -->
          <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">Edit the assigement </h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data" class="form-element">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName"> Title </label>
                  <input type="text" class="form-control"  name="title" value="<?php echo "$title"; ?>" id="exampleInputName" >
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" rows="3" name="description" ><?php echo $description; ?></textarea>
                </div>
               
                
                <div class="form-group">
                   <label for="image"> Upload document:-</label>    
                   <input  class="form-control" type="file" name="file">
                </div>

                <div class="form-group">
                  <label for="post_content"> Assigement start date </label>
                  <input type="date" class="form-control" value="<?php echo "$assigement_start_date"; ?>" name="assigement_start_date">
                 </div>

               <div class="form-group">
                 <label for="post_content"> Assigement end date </label>
                 <input type="date" class="form-control" value="<?php echo "$assigement_end_date"; ?>"  name="assigement_end_date">
               </div>
     
              <div class="form-group">
               <input class="btn btn-primary" type="submit" value"submit" name="submit">
               </div>

                
                
              </div>
              

                </form>
              </div>
            </div>
          </div>
        </section>




<?php 
if(isset($_POST['submit'])){
$title=$_POST['title'];
$document=$_POST['document'];
$description=$_POST['description'];
$assigement_start_date=$_POST['assigement_start_date'];
$assigement_end_date=$_POST['assigement_end_date'];


$query_for_update="UPDATE `assigement_record` SET `title`='{$title}',`description`='{$description}',`assigement_start_date`='{$assigement_start_date}',`assigement_end_date`='{$assigement_end_date}' WHERE assigement_id={$the_assigement_id}";

if(mysqli_query($link,$query_for_update)){
?>
<script type="text/javascript">
                          swal(
                           'Good job!',
                              'Your post is UPDATED!',
                             'added'
                             );
                        window.location.href="view_assigement.php";
                      </script>
                      
<?php
}
}
?>

</form>
    
</div>
</div>





