<?php
/**
 * Created by PhpStorm.
 * User: michaelpollind
 * Date: 3/8/17
 * Time: 8:43 AM
 */

namespace OCA\Financier\Db;


use OCP\IDBConnection;

class PermissionMapper extends BaseMapper
{
	public function __construct(IDBConnection $db) {
		parent::__construct($db, "financier_permissions",Transaction::class);
	}


	public  function  getPermissionsForBook(Book $book,$limit = null,$offset = null)
	{
		$sql = 'SELECT * FROM `*PREFIX*financier_permissions` WHERE book_id = ?';
		return $this->findEntities($sql,[$book->id],$limit,$offset);
	}

	public  function  GetUserPermissionsForBook(Book $book,$user)
	{
		$sql = 'SELECT * FROM `*PREFIX*financier_permissions` WHERE book_id = ? AND user = ?';
		return $this->findEntity($sql,[$book->id,$user]);
	}

	public  function  GetUserPermissions($user)
	{
		$sql = 'SELECT * FROM `*PREFIX*financier_permissions` user = ?';
		return $this->findEntity($sql,[$user]);
	}


}