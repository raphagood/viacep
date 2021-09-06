<?php

require '../vendor/autoload.php';

use Raphagood\ViaCEP\Client;


$endereco = (new Client())->findByZipCode('12010050')->toJson();

echo '<pre>';
var_dump($endereco);
echo '<pre>';