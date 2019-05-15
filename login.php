<?php
session_start();
?>



<?php include "db_connection/database_connection.php" ?>

<?php

    if (array_key_exists("submit", $_POST)) {
        
    
        
    if($_POST['email']==""){
        echo " (*.*) Please fill email field  (*.*) <br> ";
    }
    if($_POST['password']==""){
        echo "(*.*) Please fill password field (*.*) <br> ";
    }
       if($_POST['email']!="" && $_POST['password']!=""){
            
            
                $query = "SELECT admin_id FROM `admin_details` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' AND password='".mysqli_real_escape_string($link, $_POST['password'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['email'] = $_POST['email'];
				sleep(2);
                header("Location:admin_login_templete/index.php");
        }
       
    }

    if($_POST['email']!="" && $_POST['password']!=""){
            
            
                $query = "SELECT id FROM `teacher_details` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' AND password='".mysqli_real_escape_string($link, $_POST['password'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['email'] = $_POST['email'];
				sleep(2);
                header("Location: teacher_login_templete/index.php");
        }
       
    }



      if($_POST['email']!="" && $_POST['password']!=""){
        $query_student = "SELECT student_id FROM `students_details` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' AND password='".mysqli_real_escape_string($link, $_POST['password'])."' LIMIT 1";

                $result_for_student = mysqli_query($link, $query_student);

                if (mysqli_num_rows($result_for_student) > 0) {
                $_SESSION['email'] = $_POST['email'];
				sleep(2);
                header("Location:student_login_templete/index.php");
        
      }

             } 

            


       }
                        
                   

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../images/favicon.ico">

    <title>NeoX Admin - Log in </title>
  
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	
	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="css/bootstrap-extend.css">
	
	<!-- Theme style -->
	<link rel="stylesheet" href="css/master_style.css">

	<!-- NeoX Admin skins -->
	<link rel="stylesheet" href="css/skins/_all-skins.css">	

   
    <!-- toast CSS -->
    <link href="assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css" rel="stylesheet">

	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body class="hold-transition bg-img" style="background-image:url(images/bg-2.jpg)" data-overlay=5>
	
	<div class="container pt-3 h-p100">
	  <div class="row h-p100 justify-content-sm-center align-items-center">
		<div class="col-sm-6 col-md-4">

		  <div class="card border-info text-center">
			<div class="card-header">
			  Sign in to continue
			</div>
			<div class="card-body">
			  <img src="images/logo.png" class="img-fluid rounded-circle w-150 mb-10">
			  <h4 class="text-center mb-20"> Online school system </h4>
			  <form  method="post" class="form-signin">
				<input type="email" class="form-control mb-2" name ="email" placeholder="Email" required autofocus>
				<input type="password" class="form-control mb-2" name ="password" placeholder="Password" required>

<!-- 				<button class="btn btn-lg btn-primary btn-block mb-20" name="submit" type="submit">Sign in</button> -->

				 <div class="box-body pad res-tb-block">
              <div class="button-box">
					<button class="tst1 btn btn-info"  name="submit" type="submit">Sign in</button>
					</div>
				</div> 

				  <div class="checkbox float-left">
					<input type="checkbox" id="basic_checkbox_1" >
					<label for="basic_checkbox_1">Remember me</label>
				  </div>
				<a href="#" class="float-right">Need help?</a>
			  </form>
			</div>
		  </div>
		  <a href="register.html" class="float-right text-white">Create an account </a>
		</div>
	  </div>
	</div>

	<script src="assets/vendor_components/jquery/dist/jquery.min.js"></script>
	
	<!-- popper -->
	<script src=".assets/vendor_components/popper/dist/popper.min.js"></script>

	<!-- Bootstrap 4.0-->
	<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- SlimScroll -->
	<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

	<!-- FastClick -->
	<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>

	<!-- NeoX Admin App -->
	<script src="js/template.js"></script>

	<!-- NeoX Admin for demo purposes -->
	<script src="js/demo.js"></script>
	
	<!-- toast -->
	<script src="assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script>
    <script src="js/pages/toastr.js"></script>
    <script src="js/pages/notification.js"></script>
	


</body>
</html>
