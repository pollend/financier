<?php
namespace OCA\Financier\Controller;

use OCA\Financier\Service\BookService;
use OCP\IConfig;
use OCP\IGroupManager;
use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;


class BookController extends Controller {

	private $userId;
	private $config;
	private $bookService;

	public function __construct($AppName, IGroupManager $groupManager, IRequest $request, $userId, IConfig $config,BookService $bookService){

		parent::__construct($AppName, $request);
		$this->userId = $userId;
		$this->config = $config;
		$this->bookService = $bookService;
	}

	/**
	 * @NoAdminRequired
	 */
	public function index() {
		return $this->bookService->findBooksByUser($this->userId,null,null);
	}

	/**
	 * @NoAdminRequired
	 */
	public function  create($name,$description){
		return $this->bookService->createBook($name,$description,$this->userId);
	}

	public  function  delete($id)
	{
		$pass = $this->bookService->deleteBook($id,$this->userId);
		return ["success" => $pass];
	}
}