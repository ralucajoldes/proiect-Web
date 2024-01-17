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
                     <h2>Admin page</h2>
                    
                  </div>
               </div>
            </div>
          </div>
</div>

<?php
  // get all products 
  require('db.php');
  // Fetch all products from the database
  $query = "SELECT * FROM products";
  $result = mysqli_query($con, $query);

  $sql = "SELECT id, product_name FROM products";
  $result2 = mysqli_query($con, $sql );
  $options = array();

  while ($row = $result2->fetch_assoc()) {
    $options[] = $row;
}   
?>

<?php
// check if the delete button has been clicked
require('db.php');
if (isset($_POST['delete'])) {
  // get the ID of the product to be deleted
  $id = $_POST['id'];


  // construct the SQL query to delete the product with the given ID
  $sql = "DELETE FROM products WHERE id = $id";

  // execute the query and check if it was successful
  if (mysqli_query($con, $sql)) {
    echo "Product deleted successfully";
  } else {
    echo "Error deleting product: " . mysqli_error($con);
  }



}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	
</head>

<script>
  function deleteRow(rowId) {
    // Remove the row from the table
    document.getElementById(rowId).remove();
  }
</script>


<body>
	<h1>Available products</h1> <br>
	<table>
		<thead>
			<tr>
				<th>Prodact name</th>
				<th>Price</th>
                <th>Available pieces</th>
                <th colspan="2">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row = $result->fetch_assoc()): ?>
				<tr>
					<td><?php echo $row['product_name']; ?></td>
					<td><?php echo $row['pret']; ?></td>
					<td><?php echo $row['bucati']; ?></td>
                <?php echo "<td>
              <form method='post' onsubmit='return confirm(\"Are you sure you want to delete this product?\");'>
                <input type='hidden' name='id' value='{$row['id']}'>
                <input type='submit' name='delete' value='Delete' onclick=deleteRow('{$row['id']}')>
              </form>
            </td>";
            ?>
            <?php echo "<td>
              <form method='post' onsubmit='return confirm(\"Are you sure you want to update this product?\");'>
                <input type='hidden' name='id' value='{$row['id']}'>
                <input type='submit' name='update' value='Update'>
              </form>
            </td>";
            ?>
				</tr>
			<?php endwhile; ?>
		</tbody>
	</table>
</body>
</html>

<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_POST['product_name'])) {
        $product_name = stripslashes($_REQUEST['product_name']);
        $product_name = mysqli_real_escape_string($con, $product_name);
        $pret    = stripslashes($_REQUEST['pret']);
        $pret    = mysqli_real_escape_string($con, $pret);
        $bucati    = stripslashes($_REQUEST['bucati']);
        $bucati    = mysqli_real_escape_string($con, $bucati);
        
        $query  = "INSERT into `products` (product_name, pret, bucati)
                    VALUES ('$product_name', '$pret', '$bucati')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>The product has been successfully added.</h3><br/>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  </div>";
        }
    } else {
?>
    <div class="send-message">
      
          <div class="col-md-8">
            <div class="contact-form">
              <form id="contact" action="" method="post">
                <div class="row">
                    <h1> Add a product </h1>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="product_name" type="text" class="form-control" id="product_name" placeholder="Product name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="pret" type="text" class="form-control" id="pret" placeholder="Price($)" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="bucati" type="text" class="form-control" id="bucati" placeholder="Number of pieces" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" name="submit" id="form-submit" class="filled-button">Add</button>
                    </fieldset>
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