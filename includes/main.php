</head>

<body>

  <header class="page-header">
    <!-- topline -->
    <div class="page-header__topline">
      <div class="container clearfix">

        <div class="currency">
          <a class="currency__change" href="customer/my_account.php?my_orders">
          <?php
          if(!isset($_SESSION['customer_email'])){
          echo "Welcome :Guest"; 
          }
          else
          { 
              echo "Welcome : " . $_SESSION['customer_email'] . "";
            }
?>
          </a>
        </div>
<?php
if(isset($_SESSION['customer_email'])){?>
    <div class="basket">
          <a href="cart.php" class="btn btn--basket">
            <i class="icon-basket"></i>
            <?php items(); ?> items
          </a>
        </div>
<?php
}
?>
      
        
        
        <ul class="login">

<li class="login__item">
<?php
if(!isset($_SESSION['customer_email'])){
  echo '<a href="customer_register.php" class="login__link">Register</a>';
} 
  else
  { 
      echo '<a href="customer/my_account.php?my_orders" class="login__link">My Account</a>';
  }   
?>  
</li>


<li class="login__item">
<?php
if(!isset($_SESSION['customer_email'])){
  echo '<a href="checkout.php" class="login__link">Sign In</a>';
} 
  else
  { 
      echo '<a href="./logout.php" class="login__link">Logout</a>';
  }   
?>  
  
</li>
</ul>
      
      </div>
    </div>
    <!-- bottomline -->
    <div class="page-header__bottomline">
      <div class="container clearfix">

        <div class="logo">
          <a class="logo__link" href="index.php">
            <h1>Keziah's Latest Fashion</h1>
          </a>
        </div>

        <nav class="main-nav">
          <ul class="categories">

            <li class="categories__item">
              <a class="categories__link" href="men_collections.php">
                Men
               
              </a>
              </li>

            <li class="categories__item">
              <a class="categories__link" href="female_collections.php">
                Women
               
              </a>
            </li>

            <li class="categories__item">
              <a class="categories__link" href="customer/my_account.php?my_orders">
                Services
                <i class="icon-down-open-1"></i>
              </a>
              <div class="dropdown dropdown--lookbook" style="margin-right: -300%; width: 7;">
                <div class="clearfix " style="margin-left: 30%;">
          
                  <div class="dropdown__half">
                    <div class="dropdown__heading"></div>
                    <ul class="dropdown__items">
                      <li class="dropdown__item">
                        <a href="hair_stylish.php" class="dropdown__link text-center">Hair Stylist</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="fashion_design.php" class="dropdown__link">Fashion Design</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="photographer.php" class="dropdown__link">Photographer</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="makeup_artist.php" class="dropdown__link">Makeup Artist</a>
                      </li>
                      <li class="dropdown__item">
                        <a href="masseus.php" class="dropdown__link">Masseus/Masseuse</a>
                      </li>
                    </ul>
                  </div>
                </div>
             

              </div>

            </li>

            <li class="categories__item">
              <a class="categories__link categories__link--active" href="index.php">
                Shop
              </a>
            </li>

          </ul>
        </nav>
      </div>
    </div>
  </header>