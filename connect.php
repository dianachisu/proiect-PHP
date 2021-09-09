<?php
/*** mysql hostname ***/
$hostname = 'localhost';
/*** mysql username ***/
$username = 'root';
/*** mysql password ***/
$password = '';
/*** baza de date ***/
$db = 'proiect';
/*** se creaza un obiect mysqli ***/
$mysqli = new mysqli($hostname, $username, $password,$db);
/* se verifica daca s-a realizat conexiunea */
if(mysqli_connect_errno())
 {

 echo 'Nu se poate connecta';
 exit();
 }
?>