<?php  namespace OCA\Financier\Service;
use OCA\Financier\Db\Book;
use OCA\Financier\Db\BookMapper;
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
	function __construct( TransactionMapper $transactionMapper, BookMapper $bookMapper) {
		$this->transactionMapper = $transactionMapper;
		$this->bookMapper = $bookMapper;
	}

	function findTransactions($bookId)
	{
		/** @var Book $book */
		$book = $this->bookMapper->find($bookId);
		if($book == null)
			return null;
		return $this->transactionMapper->getTransactions($book);
	}
}