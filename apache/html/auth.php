<?php
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$password = md5($password."234rdfswDR$");

require ('connect.php');

$customers = $mysqli->query("SELECT * FROM `users`");
while ($result = mysqli_fetch_array($customers, MYSQLI_ASSOC) ) {
    $users[]= $result;
}

$result = $mysqli->query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
$user = $result->fetch_assoc();


if ($user) {
    echo '<div class="alert alert-success" role="alert">Привет, '. $user['first_name'] . ', вы успешно зарегистрировались!</div>';
    require('show.html');

}elseif (!$user) {
    echo '<div class="alert alert-danger" role="alert">Авторизация не удалась. Попробуйте снова или зарегистрируйтесь.</div>';
    require('index.html');
    exit();
}