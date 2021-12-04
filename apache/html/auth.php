
<?php


$email = trim($_POST['email']);
$password = trim($_POST['password']);
$password = md5($password."234rdfswDR$");


require ('connect.php');
$result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
$user = $result->fetch_assoc();

$customers = $mysqli->query("SELECT * FROM `users`");
while ($result = mysqli_fetch_array($customers, MYSQLI_ASSOC) ) {
    $users[]= $result;
}
require('users.html')
?>
