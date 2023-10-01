<?php
require 'vendor/autoload.php';

use Predis\Client;

$legacyConnection = new Client([
    'scheme' => 'tcp',
    'host' => 'redis-master',
    'port' => 6379,
]);

$legacyConnection->flushall();

for ($x = 1; $x <= 1000; $x++) {
    $legacyConnection->set('example_key_' . $x, 'Hello, Redis!');
}

$legacyCount = $legacyConnection->dbsize();

echo "The count of legacy items which persisted are : $legacyCount" . PHP_EOL;

$newConnection = new Client([
    'scheme' => 'tcp',
    'host' => 'redis-slave',
    'port' => 6379,
]);

$newCount = $newConnection->dbsize();
echo "The count of new client items which persisted are : $newCount" . PHP_EOL;
