<?php

use GuzzleHttp\Client as HttpClient;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require dirname(__DIR__) . '/vendor/autoload.php';
$config = require dirname(__DIR__) . '/config.php';

// create a log channel
$log = new Logger('clientlog');
$log->pushHandler(new StreamHandler(dirname(__DIR__) . '/' . $config['client']['log_file']));

$log->addInfo('Received MO', $_POST);

//reply MO
echo '<?xml version="1.0"?>
<report>
	<status>success</status>
</report>';

//send MT
$httpClient = new HttpClient();
$mtParams = array_merge($_POST, $config['mt']);

$mtParams['to'] = $mtParams['from'];
unset($mtParams['from']);

$log->info('Sending MT with body: ', $mtParams);

$response = $httpClient->post($config['mt']['url'], [
    'body' => $mtParams
]);

$log->addInfo('Received MT REPLY: ' . $response->getBody());
