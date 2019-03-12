#!/usr/bin/env php
<?php

use Passwonsole\NewCommand;
use Symfony\Component\Console\Application;

require 'vendor/autoload.php';


$app = new Application( 'Passwonsole', '1.0.0');

$app->add(new NewCommand());

try {
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}