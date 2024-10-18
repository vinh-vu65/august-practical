<?php
require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Create a log channel
$log = new Logger('test');
$log->pushHandler(new StreamHandler('php://stdout', Logger::DEBUG));

// Add records to the log
$log->info('Monolog is successfully installed and working!');

echo "Check the logs to see if the message was logged.";
?>
