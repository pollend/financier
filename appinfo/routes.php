<?php
namespace OCA\Financier\AppInfo;



$app = new Application();
$app->registerRoutes($this,[
    'routes' => [
	    ['name' => 'page#index', 'url' => '/', 'verb' => 'GET'],

		['name' => 'book#index','url' => '/book', 'verb' => 'GET'],
		['name' => 'book#create','url' => '/book', 'verb' => 'PUT'],
		['name' => 'book#patch','url' => '/book/{id}', 'verb' => 'PATCH'],
		['name' => 'book#delete','url' => '/book/{id}', 'verb' => 'DELETE'],

		['name' => 'transaction#index', 'url' => '/book/{bookId}/transaction', 'verb' => 'GET'],
		['name' => 'transaction#put', 'url' => '/book/{bookId}/transaction', 'verb' => 'PUT'], // creates
		['name' => 'transaction#patch', 'url' => '/book/{bookId}/transaction/{id}', 'verb' => 'PATCH'], //modify transaction row
		['name' => 'transaction#delete', 'url' => '/book/{bookId}/transaction/{id}', 'verb' => 'DELETE']
		//['name' => 'page#do_echo', 'url' => '/echo', 'verb' => 'POST'],
    ]
]);
