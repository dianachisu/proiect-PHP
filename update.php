<?php 
require_once "DBController.php";
session_start();

if (!isset($_SESSION['loggedin'])) 
{
	header('Location: admin.html');
	exit;
}
include("connect.php");
if (!empty($_POST['id']))
 { 
	if (isset($_POST['submit']))
	{
		if (is_numeric($_POST['id']))
		 {
			 $id = $_POST['id'];
			 $name = htmlentities($_POST['name'], ENT_QUOTES);
			 $price = htmlentities($_POST['price'], ENT_QUOTES);
			 $images = htmlentities($_POST['images'], ENT_QUOTES);
			 $code = htmlentities($_POST['code'], ENT_QUOTES);
 
			if ($name == '' || $price == ''||$images =='' || $code =='')
			{ 
				echo "<div> ERROR: Completati campurile obligatorii!</div>";
			}
			else 
			{ 
				if ($stmt = $mysqli->prepare("UPDATE house_plants SET name=?,price=?,images=?, code=? WHERE id='".$id."'"))
				{
					$stmt->bind_param("ssss",$name, $price,$images,$code);
					$stmt->execute();
					$stmt->close();
				}
				else
				{
					echo "ERROR: nu se poate executa update.";
				}
			}
		}
	else
	{
		echo "id incorect!";}
	}
}?>

<html> 
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" href="css/bootstrap.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<h1><?php if (!empty($_GET['id'])) { echo "Update product"; }?></h1>
	<?php 
	if (!empty($error)) 
	{
	 echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error. "</div>";} 
	?>
	
	
	<form action="" method="post">
		<div>
			<?php if (!empty($_GET['id'])) { ?>
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
			<p> <?php 
			if ($result = $mysqli->query("SELECT * FROM house_plants where id='".$_GET['id']."'"))
			{
				if ($result->num_rows > 0)
				{ 
					$row = $result->fetch_object(); ?> 
			</p>
<div class="form-group">
  <label class="col-md-4 control-label" >Image</label>  
  <div class="col-md-4">
  <input id="image" name="images" class="form-control input-md" required="" type="text" value="<?php echo $row->images;?>"> 
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" >Name</label>  
  <div class="col-md-4">
  <input id="name" name="name"  class="form-control input-md" required="" type="text" value="<?php echo $row->name;?>">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Price </label>  
  <div class="col-md-4">
  <input id="price" name="price"  class="form-control input-md" required="" type="text" value="<?php echo $row->price;?>">
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Code</label>  
  <div class="col-md-4">
  <input id="code" name="code"class="form-control input-md" required="" type="text" value="<?php echo $row->code;}}}?>">
  </div>
</div>
					<input type="submit" name="submit" value="Submit" class=" btn btn-info"/>
					 <a href="Shop_admin.php" class ="btn btn-info">Return</a>
					
		</div>
	</form>
</body> 
</html>