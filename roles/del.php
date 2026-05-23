<?php

$id = $_GET['id'];
$db = new PDO('mysql:host=localhost;dbname=project', 'root', 'root');
$db->query("DELETE FROM roles WHERE id=$id");

header('location: index.php');