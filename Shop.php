<?php
require_once "ShoppingCart.php";
?>
<html>

<head>
	<title>Evergreen</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>


<body>
	<section>
      <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          <a class="navbar-brand" href="Shop.php">evergreen</a>
		  <a class="nav-link nav-item nav-tabs" href="Shop.php">House Plants</a>
	     
        </div>
		 <a href="Cart.php" class="btn-cart  aria-haspopup="true" aria-expanded="false">
			<span><img src="cart.png" class="cart-icon "></span>
	      </a>
		    <a href="profile.php" class ="btn btn-dark flex-box">Profile</a>
		  <a href="logout.php" class ="btn btn-dark flex-box">Logout</a>
		
      </nav>
      </section>
	  <section class="hero-wrap"  data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate mb-5 text-center">
          	
            <h2 class="mb-0 bread">House Plants</h2>
          </div>
        </div>
      </div>
    </section>
	  
  <section class="ftco-section" >
    <div class="container" >
      <div class="row">
        <div class="col-md-12">
          <div class="row">
			
				
		
		 <?php
		 $shoppingCart = new ShoppingCart();
		 $query = "SELECT * FROM house_plants";
		 $product_array = $shoppingCart->getAllProduct($query);
		 
		 if (! empty($product_array)) 
		 {
			foreach ($product_array as $key => $value) 
			{
		 ?>
		 <div class="col-md-4 d-flex">
		 <div class="product ftco-animate">
			<div class="column">
			<form method="post" action="Cart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
				<div class="product-img d-flex align-items-center justify-content-center ">
					<img src="<?php echo $product_array[$key]["images"]; ?>" class="prod-image">
				</div>
				<div class="product-name text text-center">
					<strong><?php echo $product_array[$key]["name"]; ?></strong>
				</div>
				<div class="product-price text text-center"><?php echo "$".$product_array[$key]["price"]; ?></div>
				<div class="text-center">
				<input type="text" name="quantity" value="1" size="2" />
				<input type="submit" value="Add to cart" class="btnAddAction" />
				</div>
			</form>
			</div>
		 </div>
		 </div>
		 <?php
			}
		 }
		 ?>
		
	
	</div>
	</div>
	</div>
	</div>
	</section>
	
</body>
</html>