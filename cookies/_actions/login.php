<?php

session_start();
$email = $_POST['email'];
$password = $_POST['password'];

if($email == 'admin@gmail.com' and $password == 'admin') {
    $_SESSION['user'] = ['username' => 'admin'];
    header('location: ../profile.php');
} else {
    header('location: ../index.php?incorrect=1');
}