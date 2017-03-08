<?php
/**
 * Created by PhpStorm.
 * User: michaelpollind
 * Date: 3/8/17
 * Time: 7:51 AM
 */

namespace lib\Service;


use OCA\Financier\Db\Book;
use OCA\Financier\Db\PermissionMapper;

class PermissionService {

	private  $permissionMapper;

	function __construct(PermissionMapper $permissionMapper) {
		$this->permissionMapper = $permissionMapper;
	}

	public function isUserAllowedToModifyBook(Book $book,$user)
	{
		if($book->getOwner() == $user)
		{
			return true;
		}
		return $this->isUserAllowedToEditBook($user,$book);
	}

	public  function  canUserViewBook(Book $book,$user)
	{
		if($book->getOwner() == $user)
		{
			return true;
		}
		return $this->isUserAllowedtoViewBook($user,$book);
	}

	public  function  canUserManageBook(Book $book,$user)
	{
		if($book->getOwner() == $user)
		{
			return true;
		}
		return $this->isUserAllowedToManageBook($user,$book);
	}

	public  function  isUserAllowedToEditBook($user, Book $book)
	{
		$permission = $this->permissionMapper->getPermissionsForBook($book,$user);
		if($permission == null)
			return false;
		return $permission->getPermissionEdit();
	}

	public  function  isUserAllowedToManageBook($user, Book $book)
	{
		$permission = $this->permissionMapper->getPermissionsForBook($book,$user);
		if($permission == null)
			return false;
		return $permission->getPermissionManage();

	}

	public  function  isUserAllowedtoViewBook($user, Book $book)
	{
		$permission = $this->permissionMapper->getPermissionsForBook($book,$user);
		if($permission == null)
			return false;
		return $permission->getPermissionView();

	}

}