<?php
/**
 * Created by PhpStorm.
 * User: michaelpollind
 * Date: 3/7/17
 * Time: 5:27 PM
 */

namespace OCA\Financier\Db;

use JsonSerializable;
use OCP\AppFramework\Db\Entity;

class Transaction extends Entity implements JsonSerializable{

	public $id;
	protected $lastModified;
	protected $createdAt;
	protected $type;
	protected $bookId;
	protected $title;
	protected $price;


	function __construct() {
		$this->addType('id','integer');
		$this->addType('lastModified','string');
		$this->addType('createdAt','string');
		$this->addType('type','string');
		$this->addType('bookId','integer');
		$this->addType('title','string');
		$this->addType('price','float');
	}



	/**
	 * Specify data which should be serialized to JSON
	 *
	 * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return mixed data which can be serialized by <b>json_encode</b>,
	 * which is a value of any type other than a resource.
	 * @since 5.4.0
	 */
	function jsonSerialize() {

		//\OC::$server->getDatabaseConnection()

		return [
			"id" => $this->id,
			"lastModified" => $this->lastModified,
			"createdAt" => $this->createdAt,
			"type" => $this->type,
			"bookId" => $this->bookId,
			"title" => $this->title,
			"price" => $this->price
		];
	}
}