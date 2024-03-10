<?php

session_start();
include("includes/db.php");
$inactive = "<span style='background: red; border-radius: 10px;'>Inactive</span>";

if(isset($_SESSION['customer_email'])) {

    mysqli_query($con, "UPDATE customers SET status = 'Inactive' WHERE customer_email = '$_SESSION[customer_email]'");
    session_destroy();

    echo "<script>window.open('./index.php','_self')</script>";

}
?>