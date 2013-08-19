<?php
require 'vendor/autoload.php';

use Ratsit\Ratsit as Ratsit;

Ratsit::$service  = 'GetPersonInformationPackage';
Ratsit::$apiKey   = '';
Ratsit::$packages = 'small 1';

$Ratsit = new Ratsit;

$response = $Ratsit->searchPerson('person number');

print_r($response);
