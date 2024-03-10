<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>
<!DOCTYPE html>

<html>

<head>

<title> Insert Products </title>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'#product_desc,#product_features' });</script>

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Add New Product

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Add Product

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Title </label>

<div class="col-md-6" >

<input type="text" name="product_title" class="form-control" required >

</div>

</div><!-- form-group Ends -->


<!-- <div class="form-group" > -->
  <!-- form-group Starts -->

<!-- <label class="col-md-3 control-label" > Product Url </label>

<div class="col-md-6" >

<input type="text" name="product_url" class="form-control" required >

<br>

<p style="font-size:15px; font-weight:bold;">

Product Url Example : navy-blue-t-shirt

</p>

</div>

</div> -->
<!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Select A Manufacturer </label>

<div class="col-md-6" >

<select class="form-control" name="manufacturer"><!-- select manufacturer Starts -->

<option> Select A Manufacturer </option>

<?php

$get_manufacturer = "SELECT * FROM manufacturers";
$run_manufacturer = mysqli_query($con, $get_manufacturer);
while($row_manufacturer = mysqli_fetch_array($run_manufacturer)){
$manufacturer_id = $row_manufacturer['manufacturer_id'];
$manufacturer_title = $row_manufacturer['manufacturer_title'];

echo "<option value='$manufacturer_id'>
$manufacturer_title
</option>";

}

?>

</select><!-- select manufacturer Ends -->

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Category </label>

<div class="col-md-6" >

<select name="product_cat" class="form-control" >

<option> Select  a Product Category </option>


<?php

$get_p_cats = "SELECT * FROM product_categories";

$run_p_cats = mysqli_query($con,$get_p_cats);

while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {

$p_cat_id = $row_p_cats['p_cat_id'];

$p_cat_title = $row_p_cats['p_cat_title'];

echo "<option value='$p_cat_id' >$p_cat_title</option>";

}


?>


</select>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Category </label>

<div class="col-md-6" >


<select name="cat" class="form-control" >

<option> Select a Category </option>

<?php

$get_cat = "SELECT * FROM categories ";

$run_cat = mysqli_query($con, $get_cat);

while ($row_cat = mysqli_fetch_array($run_cat)) {

$cat_id = $row_cat['cat_id'];

$cat_title = $row_cat['cat_title'];

echo "<option value='$cat_id'>$cat_title</option>";

}

?>


</select>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" >Services Offered </label>

<div class="col-md-6" >

<select name="service" class="form-control">
  <option>Select a Service</option>
  <option value="Hair Stylish">Hair Stylish</option>
  <option value="Fashion Design">Fashion Design</option>
  <option value="Photographer">Photographer</option>
  <option value="Makeup Arttist">Makeup Arttist</option>
  <option value="Masseus/Masseuse">Masseus/Masseuse</option>
</select>

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Image 1 </label>

<div class="col-md-6" >

<input type="file" name="product_img1" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Image 2 </label>

<div class="col-md-6" >

<input type="file" name="product_img2" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Product Image 3 </label>

<div class="col-md-6" >

<input type="file" name="product_img3" class="form-control" required >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->
    <label class="col-md-3 control-label" > Product Price </label>
    <div class="col-md-6" >
        <input type="text" name="product_price" class="form-control" required >
    </div>
</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->
    <label class="col-md-3 control-label" > Age Range</label>
    <div class="col-md-6" >
        <input type="text" name="age_range" class="form-control" required >
    </div>
</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->
    <label class="col-md-3 control-label" > Product Location </label>
    <div class="col-md-6" >
        <input type="text" name="product_location" class="form-control" required >
    </div>
</div><!-- form-group Ends -->


<a data-toggle="tab" href="#description"> Product Description </a>

</li>


</ul><!-- nav nav-tabs Ends -->

<div class="tab-content"><!-- tab-content Starts -->

<div id="description" class="tab-pane fade in active"><!-- description tab-pane fade in active Starts -->

<br>

<textarea name="product_desc" class="form-control" rows="10" id="product_desc">


</textarea>

</div><!-- description tab-pane fade in active Ends -->


</div><!-- tab-content Ends -->

</div>

</div><!-- form-group Ends -->


<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control" >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if(isset($_POST['submit'])){

$product_title = $_POST['product_title'];
$product_cat = $_POST['product_cat'];
$cat = $_POST['cat'];
$service = $_POST['service'];
$manufacturer_id = $_POST['manufacturer'];
$product_price = $_POST['product_price'];
$age_range = $_POST['age_range'];
$product_location = $_POST['product_location'];
$product_desc = $_POST['product_desc'];
$product_keywords = $_POST['product_keywords'];


$product_img1 = $_FILES['product_img1']['name'];
$product_img2 = $_FILES['product_img2']['name'];
$product_img3 = $_FILES['product_img3']['name'];

$temp_name1 = $_FILES['product_img1']['tmp_name'];
$temp_name2 = $_FILES['product_img2']['tmp_name'];
$temp_name3 = $_FILES['product_img3']['tmp_name'];

move_uploaded_file($temp_name1,"product_images/$product_img1");
move_uploaded_file($temp_name2,"product_images/$product_img2");
move_uploaded_file($temp_name3,"product_images/$product_img3");

$insert_product = "INSERT INTO products (p_cat_id, cat_id, service, manufacturer_id, date, product_title, product_img1, product_img2, product_img3, product_price, age_range, product_location, product_desc) 
VALUES ('$product_cat','$cat', '$service', '$manufacturer_id', NOW(), '$product_title', '$product_img1', '$product_img2', '$product_img3','$product_price', '$age_range', '$product_location', '$product_desc')";

$run_product = mysqli_query($con, $insert_product);

if($run_product){

echo "<script>alert('Product has been inserted successfully')</script>";

echo "<script>window.open('index.php?view_products','_self')</script>";

}

}

?>

<?php } ?>
