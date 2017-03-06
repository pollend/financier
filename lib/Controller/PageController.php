<?php

namespace OCA\Financier\Controller;

use OCP\IConfig;
use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;

class PageController extends Controller {


	private $userId;
	private $config;

	public function __construct($AppName, IRequest $request, $userId, IConfig $config){

		parent::__construct($AppName, $request);
		$this->userId = $userId;
		$this->config = $config;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index() {
		$params = ['user' => $this->userId];
		return new TemplateResponse('financier', 'main');
	}


}
