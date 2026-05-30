<?php

include("../vendor/autoload.php");

use Libs\Database\UsersTable;
use Libs\Database\MySQL;
use Helpers\HTTP;

$table = new UsersTable(new MySQL());
$table->insert([
    "name" => $_POST['name'],
    "email" => $_POST['email'],
    "password" => $_POST['password'],
    "phone" => $_POST['phone'],
    "address" => $_POST['address'],
]);

HTTP::redirect("/index.php", "register=success");