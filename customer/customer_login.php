<div class="box" style="width: 50%; margin-left: 30%;"><!-- box Starts -->

<div class="box-header" ><!-- box-header Starts -->

<center>

<h1>Login Page</h1>

</center>





</div><!-- box-header Ends -->

<form action="checkout.php" method="post" ><!--form Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label>Email</label>

<input type="text" class="form-control" name="c_email" required >

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label>Password</label>

<input type="password" class="form-control" name="c_pass" required >

<h4 align="center">

<a href="forgot_pass.php"> Forgot Password </a>

</h4>

</div><!-- form-group Ends -->

<div class="text-center" ><!-- text-center Starts -->

<button name="login" value="Login" class="btn btn-primary" >

<i class="fa fa-sign-in" ></i> Log in


</button>

</div><!-- text-center Ends -->


</form><!--form Ends -->

<center><!-- center Starts -->

<a href="customer_register.php" >

<h3>New ? Register Here</h3>

</a>


</center><!-- center Ends -->


</div><!-- box Ends -->

<?php

if(isset($_POST['login'])){

$customer_email = $_POST['c_email'];

$customer_pass = $_POST['c_pass'];

$select_customer = "SELECT * FROM customers WHERE customer_email='$customer_email' AND customer_pass='$customer_pass'";

$run_customer = mysqli_query($con,$select_customer);
if($row = mysqli_fetch_array($run_customer)){
    $customer_id = $row['customer_id'];
    $customer_location = $row['location'];
    $customer_age = $row['age'];
    $business_type = $row['business_type'];
}
$get_ip = getRealUserIp();

$check_customer = mysqli_num_rows($run_customer);

$select_cart = "SELECT * FROM cart WHERE ip_add = '$get_ip'";

$run_cart = mysqli_query($con, $select_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_customer==0){

echo "<script>alert('password or email is wrong')</script>";

exit();

}
$active = "<span style='background: green; border-radius: 10px;'>Active</span>";
if($check_customer==1 AND $check_cart==0){

$_SESSION['customer_email']=$customer_email;
$_SESSION['customer_id'] = $customer_id;
$_SESSION['customer_location'] = $customer_location;
$_SESSION['customer_age'] = $customer_age;
$_SESSION['business_type'] = $business_type;

mysqli_query($con, "UPDATE customers SET status = 'Active' WHERE customer_email = '$customer_email'");

echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('./index.php','_self')</script>";

}
else {

$_SESSION['customer_email']=$customer_email;
$_SESSION['customer_id']=$customer_id;
$_SESSION['customer_location'] = $customer_location;
$_SESSION['customer_age'] = $customer_age;
$_SESSION['business_type'] = $business_type;
mysqli_query($con, "UPDATE customers SET status = 'Active' WHERE customer_email = '$customer_email'");


echo "<script>alert('You are Logged In')</script>";

echo "<script>window.open('./index.php','_self')</script>";

} 


}

?>