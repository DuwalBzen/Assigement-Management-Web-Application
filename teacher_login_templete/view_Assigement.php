



<?php include "../db_connection/database_connection.php" ?>
 <?php include "include/header.php"?>
  <?php include "include/leftsidenav.php"?>



     <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        
        
        <!-- /.col -->
        <div class="col-12">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    
                                    
                    </div>

                </div>
             

            </div>
        
            

<?php

if(isset($_GET['source'])){

$source = $_GET['source'];

} else {

$source = '';

}

switch($source) {
    
        
   case 'edit_post';
    
    include "include/edit_post.php";
    break;
    
    case '200';
    echo "NICE 200";
    break;
    
    default:
    
    include "include/view_all_post.php";
    
    break;
    
    
    
    
}

?>
          
                 
        </div>



<?php include "include/footer.php"?>
