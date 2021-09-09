<?php
require_once "DBController.php";
session_start();

if (!isset($_SESSION['loggedin'])) 
{
	header('Location: admin.html');
	exit;
}
 include("connect.php");

 // se verifica daca id a fost primit
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // preluam variabila 'id' din URL
 $id = $_GET['id'];

 // stergem inregistrarea cu ibstudent=$id
 if ($stmt = $mysqli->prepare("DELETE FROM house_plants WHERE id = ? LIMIT 1"))
 {
 $stmt->bind_param("i",$id);
 $stmt->execute();
 $stmt->close();
 }
 else
 {
 echo "ERROR: Nu se poate executa delete.";
 }
 $mysqli->close();
 echo "<div>Product was deleted!!!!</div>";
}
echo "<p><a href=\"Shop_admin.php\">Return</a></p>";
?>