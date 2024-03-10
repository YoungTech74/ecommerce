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
            <h1>Masseus / Masseuse Collections<h1>
            
      </div>



    <div id="content" class="container"><!-- container Starts -->

    <div class="row"><!-- row Starts -->

    <?php
  if(isset($_POST['search_btn'])){
    $search_name = $_POST['search'];
    $get_products = "SELECT * FROM products WHERE service = 'Masseus/Masseuse' && product_title LIKE '%$search_name%' ORDER BY 1 DESC LIMIT 0,8";
  
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products = mysqli_fetch_array($run_products)){
    
    $pro_id = $row_products['product_id'];
    
    $pro_title = $row_products['product_title'];
    
    $pro_price = $row_products['product_price'];
    
    $pro_img1 = $row_products['product_img1'];
    
    // $pro_label = $row_products['product_label'];
    
    $manufacturer_id = $row_products['manufacturer_id'];
    
    $get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturer_id = '$manufacturer_id'";
    
    $run_manufacturer = mysqli_query($db, $get_manufacturer);
    
    $row_manufacturer = mysqli_fetch_array($run_manufacturer);
    
    $manufacturer_name = $row_manufacturer['manufacturer_title'];
    
    $product_price = $row_products['product_price'];
    
    // $pro_url = $row_products['product_url'];
    
    
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
    
  
    
    //-----------------get customer's details -------------------------
    
    ?>
    <table class="table table-striped">
      
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Contact No</th>
        <th scope="col">Address</th>
        <th scope="col">Image</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
    <?php
    
    $customerDetails = mysqli_query($db, "SELECT * FROM customers WHERE business_type = 'Masseus/Massuse'");
    while($row = mysqli_fetch_assoc($customerDetails)){?> 
          <tr>
            <td><?php echo $row['customer_name'] ?></td>
            <td><?php echo $row['customer_email'] ?></td>
            <td><?php echo $row['customer_contact'] ?></td>
            <td><?php echo $row['customer_address'] ?></td>
            <td> <img style='width: 100px; height: 100px;' src="./customer/customer_images/<?php echo $row['customer_image'] ?>" alt="Image"></td>
            <td><?php echo $row['status'] ?></td>
          </tr>
      <?php
    }
    ?>
    </tbody>
  </table>
   
  <?php
  

  }else {
    getMasseusPro();
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
