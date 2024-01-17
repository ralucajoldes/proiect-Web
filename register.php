<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>furniture</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout contact_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>

     <div class="wrapper">

      <!-- end loader --> 
      <div class="sidebar">
         <!-- Sidebar  -->
        <nav id="sidebar">

            <div id="dismiss">
                <i class="fa fa-arrow-left"></i>
            </div>

            <ul class="list-unstyled components">
                
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    <a href="about.html">About</a>
                </li>
                <li>
                    <a href="product.html">Product</a>
                </li>
                <li>
                    <a href="contact.html">Contact Us</a>
                </li>
                <li> <a href="location.html">Location</a></li>
            </ul>

        </nav>
      </div>
     
     <div id="content">
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">

             <div class="container-fluid">

                 <div class="row">
                     <div class="col-lg-3 logo_section">
                         <div class="full">
                             <div class="center-desk">
                                 <div class="logo">
                                     <a href="index.html"><br> <strong class="black_bold">JORA Design</strong><br></a>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-9">
                         <div class="right_header_info">
                             <ul>
                                 <li>
                                     <button type="button" id="sidebarCollapse">
                                         <img src="images/menu_icon.png" alt="#" />
                                     </button>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <!-- end header inner -->
     </header>
     <!-- end header -->
      
<div class="contactus">
   <div class="container-fluid">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <div class="title">
                     <h2>Register</h2>
                    
                  </div>
               </div>
            </div>
          </div>
</div>

<script>
      function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
      
      function ValidateEmail(){
        var inputText = document.getElementById("email");
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(inputText.value.match(mailformat))
        {
          alert("Valid email address!");
          //document.form1.text1.focus();
          return true;
        }
        else
        {   
          alert("You have entered an invalid email address!");
          //document.form1.text1.focus();
          return false;
        }
      }

      
      function ValidatePassword(){
        var inputText = document.getElementById("password");
        var passwordRegExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        if(inputText.value.match(passwordRegExp))
        {
          alert("Valid password!");
          //document.form1.text1.focus();
          return true;
        }
        else
        {   
          alert("You have entered an invalid password!");
          //document.form1.text1.focus();
          return false;
        }
      }




</script>

<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['email'])) {
        // removes backslashes
        $firstname = stripslashes($_REQUEST['firstname']);
        //escapes special characters in a string
        $firstname = mysqli_real_escape_string($con, $firstname);
        // removes backslashes
        $lastname = stripslashes($_REQUEST['lastname']);
        //escapes special characters in a string
        $lastname = mysqli_real_escape_string($con, $lastname);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $role    = stripslashes($_REQUEST['role']);
        $role    = mysqli_real_escape_string($con, $role);
        $query    = "INSERT into `user` (firstname, lastname, email, password, role)
                     VALUES ('$firstname', '$lastname', '$email', '" . md5($password) . "', '$role')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class="send-message">
      
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact" action="register.php" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="firstname" type="text" class="form-control" id="firstname" placeholder="First Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Last Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="email" onchange="ValidateEmail()" class="form-control" id="email" placeholder="E-Mail Address" required=""  >
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <input name="password" type="password" onchange="ValidatePassword()" class="form-control" id="password" placeholder="Password" required=""> 
                      <input type="checkbox" onclick="myFunction()">Show Password
                    </fieldset>
                  </div> 
                  <br>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <label for="role">Role:</label>
	                    <div>
                        <label for="user" class="radio-inline"><input type="radio" name="role" value="u" id="user">User</label>
                        <label for="admin" class="radio-inline"><input type="radio" name="role" value="a" id="admin">Admin</label>
                      </div>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Register</button>
                    </fieldset>
                  </div>
                  <div class="container signin">
                    <p>Already have an account? <a href="login.php">Login</a>.</p>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
        <?php
    }
?>
      <!--  footer -->
      <footer>
         <div class="footer">
             <div class="container-fluid">
                 <div class="border1">
                     <div class="row">

                         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                             <ul class="lik">
                                 <li> <a href="index.html">Home</a></li>
                                 <li> <a href="about.html">About</a></li>
                                 <li> <a href="product.html">Product</a></li>
                                 <li> <a href="contact.html">Contact us</a></li>
                                 <li> <a href="location.html">Location</a></li>
                             </ul>
                         </div>

                         <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                             <ul class="sociel">
                                 <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                 <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                 <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                                 <li> <a href="#"><i class="fa fa-linkedin"></i></a></li>
                             </ul>
                         </div>
                     </div>

                 </div>
             </div>
             <div class="container">
                 <div class="row">
                     <div class="col-md-12">
                         <div class="new">
                             <h3>Newsletter</h3>
                             <form class="newtetter">
                                 <input class="tetter" placeholder="Your email" type="text" name="Your email">
                                 <button class="submit">Subscribe</button>
                             </form>
                         </div>
                     </div>
                 </div>

             </div>
             <div class="copyright">
                        <p>Copyright 2023 All Right Reserved By JORA Design</p>
             </div>
           
     
      </div>

     </footer>
     <!-- end footer -->
   </div>

</div>

   <div class="overlay"></div>

      <!-- Javascript files--> 
      <script src="js/jquery.min.js"></script> 
      <script src="js/popper.min.js"></script> 
      <script src="js/bootstrap.bundle.min.js"></script> 
      <script src="js/jquery-3.0.0.min.js"></script> 
      <script src="js/plugin.js"></script> 
      <!-- sidebar --> 
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
     <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
      </script>


      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         $(".zoom").hover(function(){
         
         $(this).addClass('transition');
         }, function(){
         
         $(this).removeClass('transition');
         });
         });
         
      </script> 


   <script>

      // This example adds a marker to indicate the position of Bondi Beach in Sydney,
      // Australia.
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,
          center: {lat: 40.645037, lng: -73.880224},
          });

        var image = 'images/maps-and-flags.png';
        var beachMarker = new google.maps.Marker({
          position: {lat: 40.645037, lng: -73.880224},
          map: map,
          icon: image
        });
      }
    </script>
   <!-- google map js -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
      <!-- end google map js -->

   </body>
</html>