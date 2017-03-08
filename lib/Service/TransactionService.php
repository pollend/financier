<?php  namespace OCA\Financier\Service;
use lib\Service\PermissionService;
use OCA\Financier\Db\Book;
use OCA\Financier\Db\BookMapper;
use OCA\Financier\Db\Transaction;
use OCA\Financier\Db\TransactionMapper;

/**
 * Created by PhpStorm.
 * User: michaelpollind
 * Date: 3/7/17
 * Time: 6:13 PM
 */


class TransactionService {

	protected $transactionMapper;
	protected $bookMapper;
	protected $permissionService;

	function __construct( TransactionMapper $transactionMapper,PermissionService $permssionService, BookMapper $bookMapper) {
		$this->transactionMapper = $transactionMapper;
		$this->bookMapper = $bookMapper;
		$this->permissionService = $permssionService;
	}

	function createTransaction($type,Book $book,$title,$price) : Transaction
	{
		$transaction = new Transaction();
		$transaction->setType($type);
		$transaction->setBookId($book->id);
		$transaction->setTitle($title);
		$transaction->setPrice($price);
		return $transaction;
	}

	function  getTransaction($transactionId)
	{
		return $this->transactionMapper->find($transactionId);
	}

	function findTransactions(Book $book,$limit = null, $offset = null)
	{
		return $this->transactionMapper->getTransactions($book,$limit, $offset );
	}

	function  deleteTransaction(Transaction $transaction)
	{
		$this->transactionMapper->delete($transaction);

	}
}