<?php

require __DIR__ . '/../vendor/autoload.php';

$server = new \donatj\MockWebServer\MockWebServer;
$server->start();

// We define the servers response to requests of the /definedPath endpoint
$url = $server->setResponseOfPath(
	'/definedPath',
	'This is our http body response',
	[ 'Cache-Control' => 'no-cache' ],
	200
);

echo "Requesting: $url\n\n";

$content = file_get_contents($url);

// $http_response_header is a little known variable magically defined
// in the current scope by file_get_contents with the response headers
echo implode("\n", $http_response_header) . "\n\n";
echo $content . "\n";