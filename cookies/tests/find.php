<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$table = new UsersTable(new MySQL);
$user = $table->findByEmailAndPass("bob@gmail.com", "1234");

if($user) {
    print_r($user);
} else {
    echo "Incorrect Email or Password!";
}