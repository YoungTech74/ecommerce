<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>


  <!-- Cover -->
  <main>
    <!-- <div class="hero">
      <a href="shop.php" class="btn1">View all product
</a> -->
    </div>
    <!-- Main -->
   
    <style>
  .input-style-1, .input-style-2 {
   
    display:inline-block;
    width:48%;
    vertical-align: top;
  }
  .search {
    float: right;
    width: 80%;
  }
  .search_btn {
    width: 20%;
    height: 35px; 
    background: blue;
    color: white;
  }

</style>
<br>
<div class="row container mt-3">
  
<?php 

    if(isset($_SESSION['customer_id']) ) {
      $guess =  mysqli_query($db, "SELECT * FROM customers WHERE business_type = 'Guest' AND customer_id = '$_SESSION[customer_id]'");
      if(mysqli_num_rows($guess) > 0){
        ?>
        <h2 class='text-center'>Recommended Products Based on Your location and Age</h2>
         
        <?php
         getRecom();
      }
      
    }



      ?>
    </div><br><br>
    <div class="search">
      <form action="" method="POST">

        <div class="input-style-1">
          <input type="text" class="form-control input-style" name="search" placeholder="Search by Product Title...">
        </div>

        <div class="input-style-2">
        <input type="submit" class="form-control search_btn" name="search_btn" value="Search" > 
        </div>
      </form>
    </div><br>

    <div class="wrapper">
            <h1>Latest Collection<h1>
            
      </div>



    <div id="content" class="container"><!-- container Starts -->

 
    <div class="row"><!-- row Starts -->


    <?php
      if(isset($_POST['search_btn'])){

        $search_name = $_POST['search'];
        
  $get_products = "SELECT * FROM products WHERE product_title LIKE '%$search_name%'";
  
  $run_products = mysqli_query($db,$get_products);
  
  while($row_products = mysqli_fetch_array($run_products)){
  
  $pro_id = $row_products['product_id'];
  
  $pro_title = $row_products['product_title'];
  
  $pro_price = $row_products['product_price'];
  
  $pro_img1 = $row_products['product_img1'];
  
  
  $manufacturer_id = $row_products['manufacturer_id'];
  
  $get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturer_id = '$manufacturer_id'";
  
  $run_manufacturer = mysqli_query($db, $get_manufacturer);
  
  $row_manufacturer = mysqli_fetch_array($run_manufacturer);
  
  $manufacturer_name = $row_manufacturer['manufacturer_title'];
  
  $product_price = $row_products['product_price'];
  
  
  
  echo "
  <div class='col-md-4 col-sm-6 single' >
  
  <div class='product' >
  
  <a href='./details.php?product_id=$pro_id'>
  
  <img src='admin_area/product_images/$pro_img1' class='img-responsive' >
  
  </a>
  
  <div class='text' >
  
  <center>
  
  <p class='btn btn-warning'> $manufacturer_name </p>
  
  </center>
  
  <hr>
  
  <h3><a href='./details.php?product_id=$pro_id' >$pro_title</a></h3>
  
  <p class='price' > <span style='text-decoration-line: line-through; 
  text-decoration-style: double;'>N</span>&nbsp;  $product_price  </p>
  
  <p class='buttons' >
  
  <a href='./details.php?product_id=$pro_id' class='btn btn-default' >View Details</a>
  
  <a href='./details.php?product_id=$pro_id' class='btn btn-danger'>
  
  <i class='fa fa-shopping-cart'></i> Add To Cart
  
  </a>
  
  
  </p>
  
  </div>
  
  
  
  </div>
  
  </div>
  
  ";
  
  }
      }else {
        getPro();
      }
    ?>

    </div><!-- row Ends -->

    </div><!-- container Ends -->

    <!-- FOOTER -->
    <!-- <footer class="page-footer">

      <div class="footer-nav">
        <div class="container clearfix">

          <div class="footer-nav__col footer-nav__col--info">
            <div class="footer-nav__heading">Information</div>
            <ul class="footer-nav__list">
              <li class="footer-nav__item">
                <a href="#" class="footer-nav__link">The brand</a>
              </li>
              <li class="footer-nav__item">
                <a href="#" class="footer-nav__link">Local stores</a>
              </li>
              <li class="footer-nav__item">
                <a href="#" class="footer-nav__link">Customer service</a>
              </li>
              <li class="footer-nav__item">
                <a href="#" class="footer-nav__link">Privacy &amp; cookies</a>
              </li>
              <li class="footer-nav__item">
                <a href="#" class="footer-nav__link">Site map</a>
              </li>
            </ul>
          </div> -->

          <!-- <div class="footer-nav__col footer-nav__col--whybuy">
            <div class="footer-nav__heading">Why buy from us</div>
            <ul class="footer-nav__list">
              <li class="footer-nav__item">
                <a href="#" class="footer-nav__link">Shipping &amp; returns</a>
              </li>
              <li class="footer-nav__item">
                <a href="#" class="footer-nav__link">Secure shipping</a>
              </li>
              <li class="footer-nav__item">
                <a href="#" class="footer-nav__link">Testimonials</a>
              </li>
              <li class="footer-nav__item">
                <a href="#" class="footer-nav__link">Award winning</a>
              </li>
              <li class="footer-nav__item">
                <a href="#" class="footer-nav__link">Ethical trading</a>
              </li>
            </ul>
          </div> -->

          <!-- <div class="footer-nav__col footer-nav__col--account">
            <div class="footer-nav__heading">Your account</div>
            <ul class="footer-nav__list">
              <li class="footer-nav__item">
                <a href="#" class="footer-nav__link">Sign in</a>
              </li>
              <li class="footer-nav__item">
                <a href="#" class="footer-nav__link">Register</a>
              </li>
              <li class="footer-nav__item">
                <a href="#" class="footer-nav__link">View cart</a>
              </li>
              <li class="footer-nav__item">
                <a href="#" class="footer-nav__link">View your lookbook</a>
              </li>
              <li class="footer-nav__item">
                <a href="#" class="footer-nav__link">Track an order</a>
              </li>
              <li class="footer-nav__item">
                <a href="#" class="footer-nav__link">Update information</a>
              </li>
            </ul>
          </div> -->


          <!-- <div class="footer-nav__col footer-nav__col--contacts">
            <div class="footer-nav__heading">Contact details</div>
            <address class="address">
            Head Office: Avenue Fashion.<br>
            180-182 Regent Street, London.
          </address>
            <div class="phone">
              Telephone:
              <a class="phone__number" href="tel:0123456789">0123-456-789</a>
            </div>
            <div class="email">
              Email:
              <a href="mailto:support@yourwebsite.com" class="email__addr">support@yourwebsite.com</a>
            </div>
          </div>

        </div>
      </div> -->

      <!-- <div class="banners">
        <div class="container clearfix">

          <div class="banner-award">
            <span>Award winner</span><br> Fashion awards 2016
          </div>

          <div class="banner-social">
            <a href="#" class="banner-social__link">
            <i class="icon-facebook"></i>
          </a>
            <a href="#" class="banner-social__link">
            <i class="icon-twitter"></i>
          </a>
            <a href="#" class="banner-social__link">
            <i class="icon-instagram"></i>
          </a>
            <a href="#" class="banner-social__link">
            <i class="icon-pinterest-circled"></i>
          </a>
          </div>

        </div>
      </div> -->

      <div class="page-footer__subline">
        <div class="container clearfix">

          <div class="copyright" style="color: white;">
            &copy; <?php echo date("Y");?> Latest Fashion Unicef&trade;
          </div>

          <!-- <div class="developer">
            Developed by Yasser Dalouzi
          </div> -->

          <div class="designby" style="color: white;">
            Powered by Lady Keziah
          </div>

        </div>
      </div>
    </footer>
</body>

</html>
