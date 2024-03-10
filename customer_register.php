<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");


?>

<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->





<div class="col-md-6" style="margin-left: 30%;"><!-- col-md-12 Starts -->

<div class="box" ><!-- box Starts -->

<div class="box-header" ><!-- box-header Starts -->

<center><!-- center Starts -->

<h2> Create A New Account</h2>


</div><!-- box-header Ends -->

<form action="" method="POST" ><!-- form Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label>Choose User Category</label>

<select name="category" class="form-control">
  <option value="Guest">Guest</option>
  <option value="Business">Business Owner</option>
</select>

</div><!-- form-group Ends -->

<div class="text-center"><!-- text-center Starts -->

<button type="submit" name="register_cat" class="btn btn-primary">

<i class="fa fa-user-md"></i> Proceed</button>

</div><!-- text-center Ends -->

</form><!-- form Ends -->

</div><!-- box Ends -->

</div><!-- col-md-12 Ends -->


</div><!-- container Ends -->
</div><!-- content Ends -->

</center><!-- center Ends -->

<?php

// include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>


</body>

</html>

<?php

if(isset($_POST['register_cat'])){
  $bus_category = $_POST['category'];

  if($bus_category == 'Guest'){?>
    <script>
      window.location = 'register_guest.php'
    </script>
  <?php
  }else if($bus_category == 'Business'){?>
     <script>
      window.location = 'register_bix.php'
    </script>
<?php
  }
}

?>
