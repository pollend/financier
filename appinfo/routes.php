<?php
namespace OCA\Financier\AppInfo;



$app = new Application();
$app->registerRoutes($this,[
    'routes' => [
	   ['name' => 'page#index', 'url' => '/', 'verb' => 'GET']//,
	   //['name' => 'page#do_echo', 'url' => '/echo', 'verb' => 'POST'],
    ]
]);