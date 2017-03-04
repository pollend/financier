<?php
namespace OCA\Financier\AppInfo;

use OCA\Financier\Controller\BookController;
use OCA\Financier\Controller\PageController;
use OCP\AppFramework\App;
use OCP\AppFramework\IAppContainer;


class Application extends App {
	public function __construct (array $urlParams=array()) {
		parent::__construct('financier', $urlParams);

		$container = $this->getContainer();

		$container->registerService('PageController', function(IAppContainer $c) {
			return new PageController(
				$c->query('AppName'),
				$c->query('Request'),
				$c->query('UserId'),
				$c->query('ServerContainer')->getConfig()
			);
		});

		$container->registerService('BookController', function(IAppContainer $c) {
			return new BookController(
				$c->query('AppName'),
				$c->query('Request'),
				$c->query('UserId'),
				$c->query('ServerContainer')->getConfig()
			);
		});

	}

}