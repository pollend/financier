<?php  namespace OCA\Financier\Controller;
use lib\Service\PermissionService;
use OCA\Financier\Db\Book;
use OCA\Financier\Service\BookService;
use OCA\Financier\Service\TransactionService;
use OCP\IConfig;
use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;


class TransactionController extends Controller{

	private $userId;
	private $config;
	private $bookSerivce;
	private $permissionService;
	private  $transactionService;

	public function __construct($AppName, IRequest $request, $userId, IConfig $config,TransactionService $transactionService,BookService $bookService,PermissionService $permssionService){
		parent::__construct($AppName, $request);
		$this->userId = $userId;
		$this->config = $config;
		$this->bookSerivce = $bookService;
		$this->permissionService = $permssionService;
		$this->transactionService = $transactionService;
	}

	public  function index($bookId)
	{
		$book = $this->bookSerivce->getbook($bookId);
		if($book == null)
		{
			return ['result' => false];
		}

		if($this->permissionService->isUserAllowedtoViewBook($this->userId,$book))
		{
			return $this->transactionService->findTransactions($book);
		}
		return ['result' => false];
	}

	public  function put($bookId,$title,$price)
	{
		$book = $this->bookSerivce->getbook($bookId);
		if($book == null)
		{
			return ['result' => false];
		}
		if($this->permissionService->isUserAllowedToEditBook($this->userId,$book))
		{
			return $this->transactionService->createTransaction("FIXED",$book,$title,$price)
		}
		return ['result' => false];
	}

	public  function  patch($bookId,$transactionId,$title,$price)
	{
		$book = $this->bookSerivce->getbook($bookId);
		if($book == null)
		{
			return ['result' => false];
		}
		if($this->permissionService->isUserAllowedToModifyBook($book,$this->userId)) {

			$transaction = $this->transactionService->getTransaction($transactionId);
			$transaction->SetTitle($title);
			$transaction->SetPrice($price);
			return ['result' => true];
		}
		return ['result' => false];
	}

	public  function delete($bookId,$transactionId)
	{
		$book = $this->bookSerivce->getbook($bookId);
		if($book == null)
		{
			return ['result' => false];
		}
		if($this->permissionService->isUserAllowedToModifyBook($book,$this->userId)) {
			$transaction = $this->transactionService->getTransaction($transactionId);

			$this->transactionService->deleteTransaction($transaction);

			return ['result' => true];
		}
		return ['result' => false];

	}



}