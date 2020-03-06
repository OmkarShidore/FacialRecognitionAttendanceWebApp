<?php
include "config.php";

if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from admin_details where AdminEmailIds='".$uname."' and AdminPasswords='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: admin_page.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Upasthti- An Attendance Solution using AI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,700,800" rel="stylesheet">
      <!-- 
	//////////////////////////////////////////////////////
	 
	DESIGNED & DEVELOPED by Klik Organization
		
	Website: 		https://www.klik.org.in/
    Developer:      Omkar Shidore
	Email: 			omkarshidore@gmail.com
	Instagram: 		https://www.instagram.com/brogrammer.ai
	Facebook: 		https://www.facebook.com/fh5co
    Github:         https://www.github.com/OmkarShidore

	//////////////////////////////////////////////////////
	 -->
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Upasthiti</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="synopsis.html" class="nav-link">Synopsis</a></li>
            
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="admin.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign In</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="admin.php">Admin Panel</a>
                <a class="dropdown-item" href="employee.php">Employee Panel</a>
              </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
    
      
    <div class="hero-wrap js-fullheight">
      <div class="overlay"></div>
        <div id="particles-js"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                    <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                
                        
        <form method="post" action="">
            <div class="box">
                <div class="form-content">
                    <h3 class="form-title">Admin Login</h3>

                        <input type="text" id="txt_uname" name="txt_uname" placeholder="Email Id" onfocus="this.value=''" onblur="field_blur(this, '');" class="email" />
  
                        <input type="password" id="txt_uname" name="txt_pwd" placeholder="Password" onfocus="this.value=''" onblur="field_blur(this, '');" class="email" />
  
                    <a href="#"><input class="btn" type = "submit" value = " Log In " name="but_submit" id="but_submit"/><br /></a> <!-- End Btn -->
                    
                </div>
                
            </div> <!-- End Box -->
                <a class="forgot-text">Forgot details?</a>
                <a class="forgot-text">please contact Manager to reset Log In details.</a>
        </form>
            
                        
          </div>
        </div>
      </div>
        
        
    </div>
      
      
      
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Upasthiti</h2>
              <p>we revolutionized authentication technology by introducing Face Recognition which provides great and effortless user experience.</p>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Quick Links</h2>
              <ul class="list-unstyled">
                <li><a href="index.html" class="py-2 d-block">Home</a></li>
                <li><a href="synopsis.html" class="py-2 d-block">Synopsis</a></li>
                <li><a href="admin.php" class="py-2 d-block">Admin Panel</a></li>
                <li><a href="employee.php" class="py-2 d-block">Employee Panel</a></li>
                
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Contact Information</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">PCCCS, Block D-III, Plot No. 3, Behind Mehta Hospital, Off Mumbai Pune Road, Chinchwad, Pune, Maharashtra 411019</a></li>
                <li><a href="#" class="py-2 d-block">+91 8605128349</a></li>
                <li><a href="#" class="py-2 d-block">info@attendance.xyz</a></li>
                <li><a href="#" class="py-2 d-block">omkarshidore@gmail.com</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                <li class="ftco-animate"><a href="https://twitter.com/Omkar44246070"><span class="icon-twitter"></span></a></li>   
                <li class="ftco-animate"><a href="https://www.facebook.com/profile.php?id=100004477928266"><span class="icon-facebook"></span></a></li></ul>
                <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                <li class="ftco-animate"><a href="https://www.facebook.com/profile.php?id=100004477928266"><span class="icon-instagram"></span></a></li>
                  <li class="ftco-animate"><a href="https://www.github.com/OmkarShidore"><span class="icon-github"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
  No Copyrights &copy; | filled with bugs | completely open-source | can use, modify, sell</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/particles.min.js"></script>
  <script src="js/particle.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>