<?php
/**
 * Created by PhpStorm.
 * User: michaelpollind
 * Date: 3/7/17
 * Time: 5:52 PM
 */

namespace OCA\Financier\Db;


use OCA\Financier\Db\BaseMapper;
use OCP\AppFramework\Db\Entity;
use OCP\IDBConnection;

class TransactionMapper extends BaseMapper
{
	public function __construct(IDBConnection $db) {
		parent::__construct($db, "financier_transactions",Transaction::class);
	}

	public function insert(Entity $entity)
	{
		$entity->setCreatedAt(date("Y-m-d H:i:s"));
		$entity->setLastModified(date("Y-m-d H:i:s"));
		return parent::insert($entity);
	}

	public  function update(Entity $entity)
	{
		$entity->setLastModified(date("Y-m-d H:i:s"));
		return parent::update($entity);
	}

	public function getTransactions(Book $book,$limit = null, $offset = null)
	{
		$sql = 'SELECT * FROM `*PREFIX*financier_transactions` WHERE book_id = ?';
		return $this->findEntities($sql,[$book->id],$limit,$offset);
	}

}