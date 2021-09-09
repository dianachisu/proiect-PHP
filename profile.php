
<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'proiect';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM users WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION[' id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		
		<title>Profile Page</title>
		 <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" href="css/bootstrap.min.css">
	</head>
	<body class="loggedin">
		<section>
      <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
          <a class="navbar-brand" href="Shop.php">evergreen</a>
		  <a class="nav-link nav-item nav-tabs" href="Shop.php">House Plants</a>
	     
        </div>
		 <a href="Cart.php" class="btn-cart  aria-haspopup="true" aria-expanded="false">
			<span><img src="cart.png" class="cart-icon "></span>
	      </a>
		  <a href="profile.php" class="btn btn-dark flex-box">Profile</a>
		
      </nav>
      </section>
		<div class="container">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?echo $password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?echo $email?></td>
					</tr>
					<tr>
					<td><a href="logout.php" class ="btn btn-dark flex-box">Logout</a><td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>