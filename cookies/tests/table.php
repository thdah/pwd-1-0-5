<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$table = new UsersTable(new MySQL);

$id = $table->insert([
    "name" => "Bob",
    "email" => "bob@gmail.com",
    "phone" => "0987654321",
    "address" => "America",
    "password" => "123"
]);

echo $id;

$result = $table->fetchAll();
print_r($result);