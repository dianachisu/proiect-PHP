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
		  <a class="nav-link nav-item nav-tabs"  href="logout.php" href="Shop.php">House Plants</a>
	     
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
			<a href="insert.php"> New Product</a>
          </div>
        </div>
      </div>
    </section>
	  
  <?php
	$shoppingCart = new ShoppingCart();
	$product_array = $shoppingCart->getAllProduct();
	if(!empty($product_array))
	{
		?>
		<div class="container mb-4">
		
			<div class="row">
				<div class="col-12">
					<div class="table-responsive">
					<table class="table table-striped">
		
				<tr>
					<th>Image</th>
					<th>Product</th>
					<th>Price</th>
					<th>Code</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
		<tbody>
		<?php
		foreach ($product_array as $key => $value)
		{
			?>
			<tr>
				<td><img src="<?php echo $product_array[$key]["images"]; ?>"  class ="img-cart"/> </td>
				<td><?php echo $product_array[$key]["name"];?> </td>
				<td><?php echo $product_array[$key]["price"];?> </td>
				<td><?php echo $product_array[$key]["code"];?> </td>
				<td><a href="update.php?id=<?php echo $product_array[$key]["id"];?>">Update</a></td>
				<td><a href="delete.php?id=<?php echo $product_array[$key]["id"];?>">Delete</a></td>
			</tr>
		<?php } ?>
		</body>
				</table>
	<?php } ?>
	</div>
	</div>
		    </div>
</div>	
	
</body>
</html>