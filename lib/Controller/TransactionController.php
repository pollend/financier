<?php  namespace OCA\Financier\Controller;
use OCP\IConfig;
use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;


class TransactionController extends Controller{

	private $userId;
	private $config;

	public function __construct($AppName, IRequest $request, $userId, IConfig $config){

		parent::__construct($AppName, $request);
		$this->userId = $userId;
		$this->config = $config;
	}

}