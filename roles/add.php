<?php

$name = $_POST['name'];
$value = $_POST['value'];

$sql = "INSERT INTO roles (name, value) VALUES ('$name', $value);";

$db = new PDO('mysql:host=localhost;dbname=project', 'root', 'root');
$db->query($sql);

header('location: index.php');