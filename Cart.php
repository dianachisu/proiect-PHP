<?php
require_once "ShoppingCart.php";
session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$member_id=$_SESSION['loggedin'];
$shoppingCart = new ShoppingCart();
if (! empty($_GET["action"])) {
	switch ($_GET["action"]) {
	case "add":
if (! empty($_POST["quantity"])) {

 $productResult = $shoppingCart->getProductByCode($_GET["code"]);
 $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["id"], $member_id);

 if (! empty($cartResult)) {

 $newQuantity = $cartResult[0]["quantity"] + $_POST["quantity"];
 $shoppingCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
 } else {

 $shoppingCart->addToCart($productResult[0]["id"], $_POST["quantity"], $member_id);
 }
 }
 break;
 case "remove":

 $shoppingCart->deleteCartItem($_GET["id"]);
 break;
 case "empty":

 $shoppingCart->emptyCart($member_id);
 break;
 }
}
?>
<HTML>
<HEAD>
<title>Evergreen</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</HEAD>
<BODY>

<section class=" nav text-center navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light">
    <div class="container">
        <h1 class="navbar-brand nav-item"> CART</h1>
     </div>
</section>
<?php
$cartItem = $shoppingCart->getMemberCartItem($member_id);
if (! empty($cartItem)) {
 $item_total = 0;
 ?>
 	
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
					<?php foreach ($cartItem as $item) { ?>
                        <tr>
                            <td><img src="<?php echo $item["images"]; ?>"  class ="img-cart"/> </td>
                            <td><?php echo $item["name"];?></td>
                            <td><input class="form-control" type="text" value="<?php echo $item["quantity"]; ?>" /></td>
                            <td class="text-right"><?php echo "$".$item["price"]; ?></td>
                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"><a href="Cart.php?action=remove&id=<?php echo $item["cart_id"]; ?>"
							class="btnRemoveAction"><img src="icon-delete.png" alt="icon-delete" title="Remove Item" /></a></i> </button> </td>
							 <?php
				            $item_total += ($item["price"] * $item["quantity"]);
				            }
				            ?>
                        </tr>               
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right">
							<strong><?php echo "$".$item_total; ?></></strong></td>
                        </tr>
						
                    </tbody>
                </table>
				 <?php
                 }
                 ?>

            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light"><a href="Shop.php" style="text-decoration:none;color: #9AE36B;">Continue Shopping</a></button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                </div>
            </div>
        </div>			 
    </div>
</div>