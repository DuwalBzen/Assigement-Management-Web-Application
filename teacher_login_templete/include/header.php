<?php
 session_start();
 if(!isset($_SESSION['email'])){
  header("location:../login.php");
}
 ?>
 
<?php include "../db_connection/database_connection.php"; ?>
<?php include "send_notification.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Admin - Dashboard</title>
    
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.css">
	
   <script src="../sweetalert2/dist/sweetalert2.min.js"></script> 
     <link rel="stylesheet" href="../sweetalert2/dist/sweetalert2.min.css">
	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="../css/bootstrap-extend.css">
	
	<!-- theme style -->
	<link rel="stylesheet" href="../css/master_style.css">
	
	<!-- NeoX Admin skins -->
	<link rel="stylesheet" href="../css/skins/_all-skins.css">

   
    <!-- toast CSS -->
    <link href="../assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css" rel="stylesheet">

	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

     
  </head>

<body class="hold-transition skin-purple-light sidebar-mini">

<div class="wrapper">

  <header class="main-header">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
	
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		  
		 
         
		  <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="iconsmind-User"></i>
            </a>
            <ul class="dropdown-menu scale-up">
              <!-- User image -->
              <li class="user-header">
                <img src="../images/5.png" class="float-left rounded-circle" alt="User Image">

                <p>

                  <?php
                  $email=$_SESSION['email'];
                  $query ="SELECT * from teacher_details WHERE email='$email'";
                  $query_for_profile=mysqli_query($link,$query);
                  while($row=mysqli_fetch_assoc($query_for_profile)){
                  $name=$row['name'];
                  
                  }
                  ?>
                  <?php echo "$name"; ?>

                  <small class="mb-5">  

                            <?php
                               echo $_SESSION['email'];
                            ?>
                              
                            </small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row no-gutters">
                  <div class="col-12 text-left">
                    <a href="view_profile.php"><i class="ion ion-person"></i> My Profile</a>
                  </div> 
				<div role="separator" class="divider col-12"></div>
				  <div class="col-12 text-left">
                    <a href="update_profile.php"><i class="ti-settings"></i> Account Setting</a>
                  </div>
				<div role="separator" class="divider col-12"></div>
				  <div class="col-12 text-left">
                    <a href="../logout.php"><i class="fa fa-power-off"></i> Logout</a>
                  </div>				
                </div>
                <!-- /.row -->
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
 