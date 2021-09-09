<?php
 include("connect.php");
 if (isset($_POST['submit']))
 {
	// preluam datele de pe formular
	$name = htmlentities($_POST['name'], ENT_QUOTES);
	$price = htmlentities($_POST['price'], ENT_QUOTES);
	$images	= htmlentities($_POST['images'], ENT_QUOTES);
	$code = htmlentities($_POST['code'], ENT_QUOTES);
	// verificam daca sunt completate
 if ($name == '' || $price == ''||$images==''||$code=='')
 {
 // daca sunt goale se afiseaza un mesaj
 $error = 'ERROR: Campuri goale!';

 } else {
 // insert
 if ($stmt = $mysqli->prepare("INSERT into house_plants (name, price, images, code)VALUES (?, ?, ?, ?)"))
 {
	$stmt->bind_param("ssss", $name, $price,$images,$code);
	$stmt->execute();
	$stmt->close();
 }
 // eroare le inserare
 else
 {
 echo "ERROR: Nu se poate executa insert.";
 }

 }
 }

 // se inchide conexiune mysqli
 $mysqli->close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head> 
		<title><?php echo "Inserare inregistrare"; ?> </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	</head> <body>
<h1><?php echo "Inserare inregistrare"; ?></h1>
<?php // if($error != '') {
// echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error. "</div>";} ?>
<form action="" method="post">
 <div>
	<div class="form-group">
  <label class="col-md-4 control-label" for="name" >Name</label>  
  <div class="col-md-4">
  <input type="text" name="name" value=""/> <br/></p>
  </div>
</div>
<div>
	<div class="form-group">
  <label class="col-md-4 control-label" for="price" >Price</label>  
  <div class="col-md-4">
  <input type="text" name="price" value=""/> <br/></p>
  </div>
</div>
<div>
	<div class="form-group">
  <label class="col-md-4 control-label" for="images" >Image</label>  
  <div class="col-md-4">
  <input type="text" name="images" value=""/> <br/></p>
  </div>
</div>
<div>
	<div class="form-group">
  <label class="col-md-4 control-label" for="code" >code</label>  
  <div class="col-md-4">
  <input type="text" name="code" value=""/> <br/></p>
  </div>
</div>
	
	<input type="submit" name="submit" value="Submit" class="btn btn-info"/>
<a href="Shop_admin.php"class="btn btn-info">Index</a>
</div>
</form>
</body>
</html>
