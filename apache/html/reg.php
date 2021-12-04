<?php

$first_name = trim($_POST['first_name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$password = md5($password."234rdfswDR$");
$gender = $_POST['gender'];
$about = trim($_POST['about']);
$agree = trim($_POST['agree']);
$avatar_file = $_POST['avatar_file'];

require ('connect.php');
$user_is_created = $mysqli->query("INSERT INTO `users`(`first_name`, `email`, `password`, `gender`, `about`, `agree`, `avatar_file`) VALUES ('$first_name', '$email', '$password', '$gender', '$about', '$agree', '$avatar_file')");
if ($user_is_created) {
    echo '<div class="alert alert-success" role="alert">Пользователь создан успешно</div>';


}elseif (!$user_is_created) {
    echo '<div class="alert alert-danger" role="alert">Пользователь не был создан</div>';
}
require ('auth.html');
$mysqli->close();
?>

query();