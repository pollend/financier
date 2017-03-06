<?php
/**
 * Created by PhpStorm.
 * User: michaelpollind
 * Date: 3/3/17
 * Time: 9:43 AM
 */

namespace OCA\Financier\Db;

use OCP\AppFramework\Db\Entity;
use OCP\IDBConnection;

class BookMapper extends BaseMapper {
	public function __construct(IDBConnection $db) {
		parent::__construct($db, "financier_books",Book::class);

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
	public  function  findByUser($user,$limit = null, $offset = null)
	{
		$sql = 'SELECT * FROM `*PREFIX*financier_books` WHERE owner = ?';
		return $this->findEntities($sql,[$user],$limit,$offset);
	}
	public  function  findAll($limit = null, $offset = null)
	{
		$sql = 'SELECT * FROM `*PREFIX*financier_books`';
		return $this->findEntities($sql,[],$limit,$offset);
	}



}