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
		parent::__construct($db, "financier_book",Book::class);

	}

	public function insert(Entity $entity)
	{
		$entity->setCreatedAt(time());
		$entity->setLastModified(time());
		return parent::insert($entity);
	}

	public  function update(Entity $entity)
	{
		$entity->setLastModified(time());
		return parent::update($entity);
	}

	public  function  findAll($limit = null, $offset = null)
	{
		$sql = 'SELECT * FROM `' . $this->tableName . '`';
		return $this->findEntities($sql,$limit,$offset);
	}


}