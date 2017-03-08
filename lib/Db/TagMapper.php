<?php
/**
 * Created by PhpStorm.
 * User: michaelpollind
 * Date: 3/8/17
 * Time: 10:22 AM
 */

namespace OCA\Financier\Db;


use OCP\IDBConnection;

class TagMapper extends BaseMapper
{
	public function __construct(IDBConnection $db) {
		parent::__construct($db, "financier_tags",Tag::class);
	}

	public  function  CreateTag(Book $book, $title)
	{
		$tag = new Tag();
		$tag->setBookId($book->id);
		$tag->setTag($title);
		return parent::insert($tag);
	}

	public  function  FindTag(Book $book,$tag,$limit = null,$offset = null)
	{
		$sql = 'SELECT * FROM `*PREFIX*financier_tags` WHERE book_id = ?';
		return $this->findEntity($sql,[$book->id],$limit,$offset);
	}


}