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

    <!-- Main -->
    <div class="wrapper">
            <h1>Men Collections<h1>
            
      </div>



    <div id="content" class="container"><!-- container Starts -->

    <div class="row"><!-- row Starts -->

    <?php
    if(isset($_POST['search_btn'])){
      $search_name = $_POST['search'];

      $get_female_products = "SELECT products.product_id, products.age_range, products.product_location, products.cat_id, categories.cat_id, categories.cat_title, products.product_title, products.product_img1, products.product_img2, products.product_img3, products.product_price, products.product_desc
      FROM products INNER JOIN categories ON products.cat_id = categories.cat_id WHERE categories.cat_title = 'Men' && products.product_title LIKE '%$search_name%' ORDER BY 1 DESC ";
      
      $run_female_products = mysqli_query($db, $get_female_products);
      
      while($row_products = mysqli_fetch_array($run_female_products)){
      
      $pro_cat_title = $row_products['cat_title'];
    
      $pro_id = $row_products['product_id'];
      
      $pro_title = $row_products['product_title'];
      
      $pro_price = $row_products['product_price'];
      $age_range = $row_products['age_range'];
      $product_location = $row_products['product_location'];
      
      $pro_img1 = $row_products['product_img1'];
      
      // $pro_url = $row_products['product_url'];
      
      
      echo "
      
      <div class='class='col-md-3 col-sm-6' style='box-shadow: 2px 5px 5px grey; margin-bottom: 10px; height: 560px;'>
      
      <div class='product' >
      
      <a href='./details.php?product_id=$pro_id'>
      
      <img src='admin_area/product_images/$pro_img1' class='img-responsive' >
      
      </a>
      
      <div class='text' >
      
      <center>
      
      <p class='btn btn-warning'> $pro_cat_title </p>

      </center>
      
      <hr>
      
      <h3><a href='./details.php?product_id=$pro_id' >$pro_title</a></h3>
      <p class='text-center' style='font-size: 20px'>$age_range</p>
      <p class='text-center' style='font-size: 20px'>$product_location</p>
      <p class='price' > <span style='text-decoration-line: line-through; 
      text-decoration-style: double;'>N</span>&nbsp;  $pro_price  </p>
      
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
    getMenPro();
}
    ?>

    </div><!-- row Ends -->

    </div><!-- container Ends -->
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
