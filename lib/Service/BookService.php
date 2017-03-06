<?php namespace OCA\Financier\Service;
use OCA\Financier\Db\Book;
use OCA\Financier\Db\BookMapper;

/**
 * Created by PhpStorm.
 * User: michaelpollind
 * Date: 3/5/17
 * Time: 11:19 AM
 */
class BookService {
	private $bookMapper;

	function __construct(BookMapper $bookMapper, $userId) {
		$this->bookMapper = $bookMapper;
	}

	function findAllBooks($limit = null,$offset = null)
	{
		return $this->bookMapper->findAll($limit,$offset);
	}
	function findBooksByUser($userid,$limit = null,$offset = null)
	{
		return $this->bookMapper->findByUser($userid,$limit,$offset);
	}
	function createBook($name,$description,$owner)
	{
		$book = new Book();
		$book->setDescription($description);
		$book->setTitle($name);
		$book->setOwner($owner);
		return $this->bookMapper->insert($book);

	}
}