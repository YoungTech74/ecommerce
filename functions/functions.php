<?php
// session_start();
// error_reporting(0);
$db = mysqli_connect("localhost","root","","ecom_store");

/// IP address code starts /////
function getRealUserIp(){
    switch(true){
      case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
      case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
      case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
      default : return $_SERVER['REMOTE_ADDR'];
    }
 }
/// IP address code Ends /////


// items function Starts ///

function items(){

global $db;

$ip_add = getRealUserIp();

$get_items = "SELECT * FROM cart WHERE ip_add = '$ip_add' AND c_id = '$_SESSION[customer_id]'";

$run_items = mysqli_query($db, $get_items);

$count_items = mysqli_num_rows($run_items);

echo $count_items;

}


// items function Ends ///

// total_price function Starts //

function total_price(){

global $db;

$ip_add = getRealUserIp();

$total = 0;

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($db,$select_cart);

while($record=mysqli_fetch_array($run_cart)){

$pro_id = $record['p_id'];

$pro_qty = $record['qty'];


$sub_total = $record['p_price']*$pro_qty;

$total += $sub_total;






}

echo "N" . $total;



}



// total_price function Ends //

// getPro function Starts //


// getPro function Starts //

function getRecom(){

  global $db;
  

  $get_details = mysqli_query($db, "SELECT products.*, recommendation.* FROM products INNER JOIN recommendation ON products.product_id = recommendation.product_id
  WHERE recommendation.location = '$_SESSION[customer_location]' AND recommendation.age = '$_SESSION[customer_age]' AND recommendation.user_id != '$_SESSION[customer_id]' ORDER BY products.product_id Asc");
  
  while($row_products = mysqli_fetch_array($get_details)) {

    $pro_id = $row_products['product_id'];

    $pro_title = $row_products['product_title'];

    $pro_price = $row_products['product_price'];
    $age_range = $row_products['age_range'];
    $product_location = $row_products['product_location'];

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

<div class='col-md-3 col-sm-6' style='box-shadow: 2px 5px 5px grey; margin-bottom: 10px; height: 560px;'>

<div class='product' >

<a href='./details.php?product_id=$pro_id'>
<center>
<img style='height: 200px; width: 100%;' src='admin_area/product_images/$pro_img1' class='img-responsive'></br>
</center>
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
}


function getPro(){

global $db;

$get_products = "SELECT * FROM products ORDER BY product_id DESC LIMIT 0,8";

$run_products = mysqli_query($db,$get_products);

while($row_products = mysqli_fetch_array($run_products)){

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];
$age_range = $row_products['age_range'];
$product_location = $row_products['product_location'];

$pro_img1 = $row_products['product_img1'];


$manufacturer_id = $row_products['manufacturer_id'];

$get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturer_id = '$manufacturer_id'";

$run_manufacturer = mysqli_query($db, $get_manufacturer);

$row_manufacturer = mysqli_fetch_array($run_manufacturer);

$manufacturer_name = $row_manufacturer['manufacturer_title'];

$product_price = $row_products['product_price'];



echo "
<div class='col-md-3 col-sm-6' style='box-shadow: 2px 5px 5px grey; margin-bottom: 10px; height: 560px;' >

<div class='product' >

<a href='./details.php?product_id=$pro_id'>
<center>
<img style='height: 200px; width: 100%;' src='admin_area/product_images/$pro_img1' class='img-responsive' >
</center>
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

}

// getPro function Ends //



// get_hair_stylish_Pro function Starts //

function getRecommendation(){

    global $db;

    $get_details = mysqli_query($db, "SELECT products.*, recommendation.* FROM products INNER JOIN recommendation 
    WHERE products.product_id = recommendation.product_id AND recommendation.user_id = '$_SESSION[customer_id]' ORDER BY products.product_id Asc LIMIT 8");
    
    // $get_products = "SELECT * FROM recommendation WHERE service = 'Hair Stylish' ORDER BY 1 DESC LIMIT 0,8";

    // $run_products = mysqli_query($db, $get_products);

    while($row_products = mysqli_fetch_array($get_details)) {

        $pro_id = $row_products['product_id'];

        $pro_title = $row_products['product_title'];

        $pro_price = $row_products['product_price'];
        $age_range = $row_products['age_range'];
        $product_location = $row_products['product_location'];

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
  
  <div class='col-md-3 col-sm-6' style='box-shadow: 2px 5px 5px grey; margin-bottom: 10px; height: 560px;'>
  
  <div class='product' >
  
  <a href='./details.php?product_id=$pro_id'>
  <center>
  <img style='height: 200px; width: 100%;' src='admin_area/product_images/$pro_img1' class='img-responsive'></br>
  </center>
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
}





// get_hair_stylish_Pro function Starts //

function getHairStylishPro(){

  global $db;
  
  $get_products = "SELECT * FROM products WHERE service = 'Hair Stylish' ORDER BY 1 DESC LIMIT 0,8";
  
  $run_products = mysqli_query($db,$get_products);
  
  while($row_products = mysqli_fetch_array($run_products)){
  
  $pro_id = $row_products['product_id'];
  
  $pro_title = $row_products['product_title'];
  
  $pro_price = $row_products['product_price'];
  $age_range = $row_products['age_range'];
  $product_location = $row_products['product_location'];
  
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
  
  <div class='col-md-3 col-sm-6' style='box-shadow: 2px 5px 5px grey; margin-bottom: 10px; height: 560px;' >
  
  <div class='product' >
  
  <a href='./details.php?product_id=$pro_id'>
  <center>
  <img style='height: 200px; width: 100%;' src='admin_area/product_images/$pro_img1' class='img-responsive' >
  </center>
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

  
  //-----------------get customer's details for hair stylish-------------------------
  
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
  
  $hairStylish = mysqli_query($db, "SELECT * FROM customers WHERE business_type = 'Hair Stylish'");
  while($row = mysqli_fetch_assoc($hairStylish)){?> 
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

  
  }
  
  // get_hair_stylish_Pro function Ends //


  
// get_hair_stylish_Pro function ends //


//get_fashion_design_pro function starts
function getFashionDesignPro(){

  global $db;
  
  $get_products = "SELECT * FROM products WHERE service = 'Fashion Design' ORDER BY 1 DESC LIMIT 0,8";
  
  $run_products = mysqli_query($db,$get_products);
  
  while($row_products = mysqli_fetch_array($run_products)){
  
  $pro_id = $row_products['product_id'];
  
  $pro_title = $row_products['product_title'];
  
  $pro_price = $row_products['product_price'];
  $age_range = $row_products['age_range'];
  $product_location = $row_products['product_location'];
  
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
  
  <div class='col-md-3 col-sm-6' style='box-shadow: 2px 5px 5px grey; margin-bottom: 10px; height: 560px;' >
  
  <div class='product' >
  
  <a href='./details.php?product_id=$pro_id'>
  <center>
  <img style='height: 200px; width: 100%;' src='admin_area/product_images/$pro_img1' class='img-responsive' >
  </center>
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
  
  $fashionDesign = mysqli_query($db, "SELECT * FROM customers WHERE business_type = 'Fashion Design'");
  while($row = mysqli_fetch_assoc($fashionDesign)){?> 
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

  }
  
  // get_hair_stylish_Pro function Ends //


/// get_fashion_design_pro Function ends ///



// get_photographer function Starts //
function getPhotographerPro(){

    global $db;

    $get_products = "SELECT * FROM products WHERE service = 'Photographer' ORDER BY 1 DESC LIMIT 0,8";

    $run_products = mysqli_query($db, $get_products);

    while($row_products = mysqli_fetch_array($run_products)) {

        $pro_id = $row_products['product_id'];

        $pro_title = $row_products['product_title'];

        $pro_price = $row_products['product_price'];
        $age_range = $row_products['age_range'];
        $product_location = $row_products['product_location'];

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
  
  <div class='col-md-3 col-sm-6' style='box-shadow: 2px 5px 5px grey; margin-bottom: 10px; height: 560px;' >
  
  <div class='product' >
  
  <a href='./details.php?product_id=$pro_id'>
    <center>
  <img style='height: 200px; width: 100%;' src='admin_area/product_images/$pro_img1' class='img-responsive' >
  </center>
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
  
  $photographer = mysqli_query($db, "SELECT * FROM customers WHERE business_type = 'Photographer'");
  while($row = mysqli_fetch_assoc($photographer)){?> 
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
  
  }
  
  // get_photographer function Ends //




  
// get_makeup_artist function Starts //

function getMakeupArtistPro(){

  global $db;
  
  $get_products = "SELECT * FROM products WHERE service = 'Makeup Artist' ORDER BY 1 DESC LIMIT 0,8";
  
  $run_products = mysqli_query($db,$get_products);
  
  while($row_products = mysqli_fetch_array($run_products)){
  
  $pro_id = $row_products['product_id'];
  
  $pro_title = $row_products['product_title'];
  
  $pro_price = $row_products['product_price'];
  $age_range = $row_products['age_range'];
  $product_location = $row_products['product_location'];
  
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
  
  <div class='col-md-3 col-sm-6' style='box-shadow: 2px 5px 5px grey; margin-bottom: 10px; height: 560px;'>
  
  <div class='product' >
  
  <a href='./details.php?product_id=$pro_id'>
  <center>
  <img style='height: 200px; width: 100%;' src='admin_area/product_images/$pro_img1' class='img-responsive' >
  </center>
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
  
  $makupArtist = mysqli_query($db, "SELECT * FROM customers WHERE business_type = 'Makeup Artist'");
  while($row = mysqli_fetch_assoc($makupArtist)){?> 
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

  }
  
  // get_makeup_artist function Ends //



  
// get_masseus function Starts //

function getMasseusPro(){

  global $db;
  
  $get_products = "SELECT * FROM products WHERE service = 'Masseus/Masseuse' ORDER BY 1 DESC LIMIT 0,8";
  
  $run_products = mysqli_query($db,$get_products);
  
  while($row_products = mysqli_fetch_array($run_products)){
  
  $pro_id = $row_products['product_id'];
  
  $pro_title = $row_products['product_title'];
  
  $pro_price = $row_products['product_price'];
  $age_range = $row_products['age_range'];
  $product_location = $row_products['product_location'];
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
  
  <div class='col-md-3 col-sm-6' style='box-shadow: 2px 5px 5px grey; margin-bottom: 10px; height: 560px;' >
  
  <div class='product' >
  
  <a href='./details.php?product_id=$pro_id'>
  <center>
  <img src='admin_area/product_images/$pro_img1' class='img-responsive' >
  </center>
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

  }
  
  // get_masseus function Ends //


  // get_female collection  function Starts //

function getfemalePro(){

  global $db;
  
  $get_female_products = "SELECT products.product_id, products.age_range, products.product_location, products.cat_id, categories.cat_id, categories.cat_title, products.product_title, products.product_img1, products.product_img2, products.product_img3, products.product_price, products.product_desc
  FROM products INNER JOIN categories ON products.cat_id = categories.cat_id WHERE categories.cat_title = 'Female' ORDER BY 1 DESC ";
  
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
  
  <div class='col-md-3 col-sm-6' style='box-shadow: 2px 5px 5px grey; margin-bottom: 10px; height: 560px;'>
  
  <div class='product' >
  
  <a href='./details.php?product_id=$pro_id'>
  <center>
  <img style='height: 200px; width: 100%;' src='admin_area/product_images/$pro_img1' class='img-responsive' >
  </center>
  </a>
  
  <div class='text' >
  
  <center>
  
  <p class='btn btn-warning'> $pro_cat_title </p>
  
  </center>
  
  <hr>
  
  <h3><a href='./details.php?product_id=$pro_id' >$pro_title</a></h3>
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
  

  }
  
  // get_female_collections function Ends //



  
  // get_female collection  function Starts //

function getMenPro(){

  global $db;
  
  $get_female_products = "SELECT products.product_id, products.age_range, products.product_location, products.cat_id, categories.cat_id, categories.cat_title, products.product_title, products.product_img1, products.product_img2, products.product_img3, products.product_price, products.product_desc
  FROM products INNER JOIN categories ON products.cat_id = categories.cat_id WHERE categories.cat_title = 'Men' ORDER BY 1 DESC ";
  
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
  
  <div class='col-md-3 col-sm-6' style='box-shadow: 2px 5px 5px grey; margin-bottom: 10px; height: 560px;' >
  
  <div class='product' >
  
  <a href='./details.php?product_id=$pro_id'>
  
  <center>
  <img style='height: 200px; width: 100%;' src='admin_area/product_images/$pro_img1' class='img-responsive' >
  </center>
  </a>
  
  <div class='text' >
  
  <center>
  
  <p class='btn btn-warning'> $pro_cat_title </p>
  
  </center>
  
  <hr>
  
  <h3><a href='./details.php?product_id=$pro_id' >$pro_title</a></h3>

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
  

  }
  
  // get_female_collections function Ends //


  



  function getProducts(){

/// getProducts function Code Starts ///

global $db;

$aWhere = array();

/// Manufacturers Code Starts ///

if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

foreach($_REQUEST['man'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'manufacturer_id='.(int)$sVal;

}

}

}

/// Manufacturers Code Ends ///

/// Products Categories Code Starts ///

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'p_cat_id='.(int)$sVal;

}

}

}

/// Products Categories Code Ends ///

/// Categories Code Starts ///

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

foreach($_REQUEST['cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'cat_id='.(int)$sVal;

}

}

}

/// Categories Code Ends ///

$per_page=6;

if(isset($_GET['page'])){

$page = $_GET['page'];

}else {

$page=1;

}

$start_from = ($page-1) * $per_page ;

$sLimit = " order by 1 DESC LIMIT $start_from,$per_page";

$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;

$get_products = "select * from products  ".$sWhere;

$run_products = mysqli_query($db,$get_products);

while($row_products=mysqli_fetch_array($run_products)){

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

$pro_label = $row_products['product_label'];

$manufacturer_id = $row_products['manufacturer_id'];

$get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";

$run_manufacturer = mysqli_query($db,$get_manufacturer);

$row_manufacturer = mysqli_fetch_array($run_manufacturer);

$manufacturer_name = $row_manufacturer['manufacturer_title'];

$pro_psp_price = $row_products['product_psp_price'];

$pro_url = $row_products['product_url'];


if($pro_label == "Sale" or $pro_label == "Gift"){

$product_price = "<del> $$pro_price </del>";

$product_psp_price = "| $$pro_psp_price";

}
else{

$product_psp_price = "";

$product_price = "$$pro_price";

}


if($pro_label == ""){


}
else{

$product_label = "

<a class='label sale' href='#' style='color:black;'>

<div class='thelabel'>$pro_label</div>

<div class='label-background'> </div>

</a>

";

}


echo "

<div class='col-md-4 col-sm-6 center-responsive' >

<div class='product' >

<a href='$pro_url' >

<img src='admin_area/product_images/$pro_img1' class='img-responsive' >

</a>

<div class='text' >

<center>

<p class='btn btn-warning'> $manufacturer_name </p>

</center>

<hr>

<h3><a href='$pro_url' >$pro_title</a></h3>

<p class='price' > $product_price $product_psp_price </p>

<p class='buttons' >

<a href='$pro_url' class='btn btn-default' >View details</a>

<a href='$pro_url' class='btn btn-danger'>

<i class='fa fa-shopping-cart' data-price=$pro_price></i> Add To Cart

</a>


</p>

</div>

$product_label


</div>

</div>

";

}
/// getProducts function Code Ends ///



}


/// getProducts Function Ends ///


/// getPaginator Function Starts ///

function getPaginator(){

/// getPaginator Function Code Starts ///

$per_page = 6;

global $db;

$aWhere = array();

$aPath = '';

/// Manufacturers Code Starts ///

if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

foreach($_REQUEST['man'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'manufacturer_id='.(int)$sVal;

$aPath .= 'man[]='.(int)$sVal.'&';

}

}

}

/// Manufacturers Code Ends ///

/// Products Categories Code Starts ///

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'p_cat_id='.(int)$sVal;

$aPath .= 'p_cat[]='.(int)$sVal.'&';

}

}

}

/// Products Categories Code Ends ///

/// Categories Code Starts ///

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

foreach($_REQUEST['cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'cat_id='.(int)$sVal;

$aPath .= 'cat[]='.(int)$sVal.'&';

}

}

}

/// Categories Code Ends ///

$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');

$query = "select * from products ".$sWhere;

$result = mysqli_query($db,$query);

$total_records = mysqli_num_rows($result);

$total_pages = ceil($total_records / $per_page);

echo "<li><a href='shop.php?page=1";

if(!empty($aPath)){ echo "&".$aPath; }

echo "' >".'First Page'."</a></li>";

for ($i=1; $i<=$total_pages; $i++){

echo "<li><a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."' >".$i."</a></li>";

};

echo "<li><a href='shop.php?page=$total_pages";

if(!empty($aPath)){ echo "&".$aPath; }

echo "' >".'Last Page'."</a></li>";

/// getPaginator Function Code Ends ///

}

/// getPaginator Function Ends ///



?>
