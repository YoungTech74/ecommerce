if(isset($_GET['send_email'])){

$subject = "Email Confirmation Message";

$from = "sad.ahmed22224@gmail.com";

$message = "

<h2>
Email Confirmation By Computerfever.com $c_name
</h2>

<a href='localhost/ecom_store/customer/my_account.php?$customer_confirm_code'>

Click Here To Confirm Email

</a>

";

$headers = "From: $from \r\n";

$headers .= "Content-type: text/html\r\n";

mail($c_email, $subject, $message, $headers);

echo "<script>alert('Your Confirmation Email Has Been sent to you, check your inbox')</script>";

echo "<script>window.open('my_account.php?my_orders','_self')</script>";

}


<div class="alert alert-danger"><!-- alert alert-danger Starts -->

<strong> Warning! </strong> Please Confirm Your Email and if you have not received your confirmation email

<a href="my_account.php?send_email" class="alert-link">

Send Email Again

</a>

</div><!-- alert alert-danger Ends -->
