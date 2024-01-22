<?php


require_once __DIR__ . "/vendor/autoload.php";

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// craete a log channel

$log = new Logger('name');
$log->pushHandler(new StreamHandler("aplication.log", Level::Debug));


$log->warning('Foo satu');
$log->error('Bar');
