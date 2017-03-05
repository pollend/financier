<?php
namespace OCA\Financier\AppInfo;

use OCP\AppFramework\App;
use OCA\Deck\Middleware\SharingMiddleware;


class Application extends App {

	/**
	 * Application constructor.
	 *
	 * @param array $urlParams
	 */
	public function __construct(array $urlParams = array()) {
		parent::__construct('financier', $urlParams);

		$container = $this->getContainer();
		$server = $container->getServer();
	}


	public function registerNavigationEntry() {


		$container = $this->getContainer();
		$container->query('OCP\INavigationManager')->add(function() use ($container) {
			$l = \OC::$server->getL10N('financier');
			$g = \OC::$server->getURLGenerator();

			return [
				'id' => 'financier',
				'order' => 100,
				'href' => $g ->linkToRoute('financier.page.index'),
				'icon' => $g ->imagePath('financier', 'app.svg'),
				'name' => $l->t('Financier'),
			];
		});
	}


}
