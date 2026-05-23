<?php

include("vendor/autoload.php");

use Carbon\Carbon;
use Libs\Math\Circle;
use Support\Square;

echo Carbon::now()->addDay(5);

echo "<br>";

$circle = new Circle;
$circle->area(80);

$square = new Square;
$square->area(80);

