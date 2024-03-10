<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");

?>

<?php


$product_id = $_GET['product_id'];

$get_product = "SELECT * FROM products WHERE product_id = '$product_id'";

$run_product = mysqli_query($con, $get_product);

$check_product = mysqli_num_rows($run_product);

if($check_product == 0){

echo "<script> window.open('index.php','_self') </script>";

}else{
$row_product = mysqli_fetch_array($run_product);

$p_cat_id = $row_product['p_cat_id'];

$pro_id = $row_product['product_id'];

$pro_title = $row_product['product_title'];

$pro_price = $row_product['product_price'];

$pro_desc = $row_product['product_desc'];

$pro_img1 = $row_product['product_img1'];

$pro_img2 = $row_product['product_img2'];

$pro_img3 = $row_product['product_img3'];

// $pro_label = $row_product['product_label'];

// $pro_psp_price = $row_product['product_psp_price'];

// $pro_features = $row_product['product_features'];

// $pro_video = $row_product['product_video'];

// $status = $row_product['status'];

// $pro_url = $row_product['product_url'];


//---------------------select product categories---------------------------

$get_p_cat = "SELECT * FROM product_categories WHERE p_cat_id = '$p_cat_id'";

$run_p_cat = mysqli_query($con, $get_p_cat);

$row_p_cat = mysqli_fetch_array($run_p_cat);

$p_cat_title = $row_p_cat['p_cat_title'];

?>

  <!-- <main> -->
    <!-- HERO -->
    <!-- <div class="nero">
      <div class="nero__heading">
        <span class="nero__bold">Product </span>View
      </div>
      <p class="nero__text">
      </p>
    </div>
  </main> -->

<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->


<div class="col-md-12"><!-- col-md-12 Starts -->

<div class="row" id="productMain"><!-- row Starts -->

<div class="col-sm-6"><!-- col-sm-6 Starts -->

<div id="mainImage"><!-- mainImage Starts -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">

<ol class="carousel-indicators"><!-- carousel-indicators Starts -->

<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<li data-target="#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>

</ol><!-- carousel-indicators Ends -->

<div class="carousel-inner"><!-- carousel-inner Starts -->

<div class="item active">
<center>
<img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
</center>
</div>

<div class="item">
<center>
<img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
</center>
</div>

<div class="item">
<center>
<img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
</center>
</div>

</div><!-- carousel-inner Ends -->


<a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Starts -->

<span class="glyphicon glyphicon-chevron-left"> </span>

<span class="sr-only"> Previous </span>

</a><!-- left carousel-control Ends -->

<a class="right carousel-control" href="#myCarousel" data-slide="next"><!-- right carousel-control Starts -->

<span class="glyphicon glyphicon-chevron-right"> </span>

<span class="sr-only"> Next </span>

</a><!-- right carousel-control Ends -->

</div>

</div><!-- mainImage Ends -->


</div><!-- col-sm-6 Ends -->


<div class="col-sm-6" ><!-- col-sm-6 Starts -->

<div class="box" ><!-- box Starts -->

<h1 class="text-center" > <?php echo $pro_title; ?> </h1>

<?php


if(isset($_POST['add_cart'])){
 if(!isset($_SESSION['customer_email'])){?>
    <script>
      window.location = './checkout.php';
    </script>
 <?php
 }else {
$ip_add = getRealUserIp();

$p_id = $pro_id;

$product_qty = $_POST['product_qty'];

$product_size = $_POST['product_size'];


$check_product = "SELECT * FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND c_id = '$_SESSION[customer_id]'";

$run_check = mysqli_query($con, $check_product);

if(mysqli_num_rows($run_check) > 0){

echo "<script>alert('This Product is already added in cart')</script>";

//echo "<script>window.open('$pro_url','_self')</script>";

}
else {

$get_price = "SELECT * FROM products WHERE product_id = '$p_id'";

$run_price = mysqli_query($con, $get_price);

$row_price = mysqli_fetch_array($run_price);

$product_price = $row_price['product_price'];
$age_range = $row_price['age_range'];
$product_location = $row_price['product_location'];


$query = "INSERT INTO cart (p_id, c_id, ip_add, qty, p_price, size) VALUES ('$p_id', '$_SESSION[customer_id]', '$ip_add', '$product_qty', '$product_price', '$product_size')";

$run_query = mysqli_query($db, $query);

if($run_query){
    mysqli_query($db, "INSERT INTO recommendation (user_id, product_id, location, age) VALUES ('$_SESSION[customer_id]', '$p_id', '$_SESSION[customer_location]', '$_SESSION[customer_age]')");
  ?>
  <script>
    alert('Product Added successfully!');
    window.location = './cart.php';
  </script>
<?php
}

}

}
}


?>

<form action="" method="POST" class="form-horizontal" ><!-- form-horizontal Starts -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-5 control-label" >Quantity </label>

<div class="col-md-7"><!-- col-md-7 Starts -->

<select name="product_qty" class="form-control" required>
    <option>Select quantity</option>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>

</select>

</div><!-- col-md-7 Ends -->

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-5 control-label" >Size</label>

<div class="col-md-7" ><!-- col-md-7 Starts -->

<select name="product_size" class="form-control" required >

<option>Select a Size</option>
<option>Small</option>
<option>Medium</option>
<option>Large</option>


</select>

</div><!-- col-md-7 Ends -->


</div><!-- form-group Ends -->


<?php

echo "

<p class='price'>

Price : <span style='text-decoration-line: line-through; text-decoration-style: double;'>N</span> $pro_price

</p>

";
echo '</br>';
?>

<p class="text-center buttons" ><!-- text-center buttons Starts -->

<button class="btn btn-danger" type="submit" name="add_cart">

<i class="fa fa-shopping-cart" ></i> Add to Cart</button>


</p><!-- text-center buttons Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- box Ends -->


<div class="row" id="thumbs" ><!-- row Starts -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

<a href="#" class="thumb" >

<img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive" >

</a>

</div><!-- col-xs-4 Ends -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

<a href="#" class="thumb" >

<img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive" >

</a>

</div><!-- col-xs-4 Ends -->

<div class="col-xs-4" ><!-- col-xs-4 Starts -->

<a href="#" class="thumb" >

<img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive" >

</a>

</div><!-- col-xs-4 Ends -->


</div><!-- row Ends -->


</div><!-- col-sm-6 Ends -->


</div><!-- row Ends -->

<div class="box" id="details"><!-- box Starts -->

<h1 class="text-center">Product Description</h1>
<hr style="margin-top:0px;">

<div class="tab-content"><!-- tab-content Starts -->

<div id="description" class="tab-pane fade in active" style="margin-top:7px;" ><!-- description tab-pane fade in active Starts -->

<?php echo $pro_desc; ?>

</div><!-- description tab-pane fade in active Ends -->


</div><!-- tab-content Ends -->

</div><!-- box Ends -->



<?php } ?>

</div><!-- row same-height-row Ends -->

</div><!-- col-md-12 Ends -->


</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

//include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>


