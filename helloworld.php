<?php


require_once __DIR__ . '/vendor/autoload.php';

use Riskisaria\PucukPena\Data\person;

echo "hello world <br>" . PHP_EOL;

$person = new person("Riski");

echo $person->callname('Haikal');
