<?php
namespace OCA\Financier\AppInfo;



$app = new Application();
$app->registerRoutes($this,[
    'routes' => [
	   ['name' => 'page#index', 'url' => '/', 'verb' => 'GET'],

		['name' => 'transaction#index', 'url' => '/book/{bookId}/transaction', 'verb' => 'GET'],
		['name' => 'transaction#put', 'url' => '/book/{bookId}/transaction/{id}', 'verb' => 'PUT'], // creates
		['name' => 'transaction#patch', 'url' => '/book/{bookId}/transaction/{id}', 'verb' => 'PATCH'], //modify transaction row
		['name' => 'transaction#delete', 'url' => '/book/{bookId}/transaction/{id}', 'verb' => 'DELETE']
		//['name' => 'page#do_echo', 'url' => '/echo', 'verb' => 'POST'],
    ]
]);
