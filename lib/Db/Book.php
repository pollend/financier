<?php
/**
 * Created by PhpStorm.
 * User: michaelpollind
 * Date: 3/3/17
 * Time: 9:32 AM
 */

namespace OCA\Financier\Db;


use JsonSerializable;
use OCP\AppFramework\Db\Entity;
use OCP\IDBConnection;

class Book extends Entity implements JsonSerializable{

	/** @var  IDBConnection */
	public $db;
	public $id;
	protected $description;
	protected $title;
	protected $lastModified;
	protected $createdAt;
	protected $owner;


	public  function __construct() {

		$this->addType('id','integer');
		$this->addType('lastModified','string');
		$this->addType('createdAt','string');
		$this->addType('description','string');
		$this->addType('title','string');
		$this->addType('owner','string');
	}

	/**
	 * Specify data which should be serialized to JSON
	 *
	 * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return mixed data which can be serialized by <b>json_encode</b>,
	 * which is a value of any type other than a resource.
	 * @since 5.4.0
	 */
	public function jsonSerialize() {
		//var_dump(\OC::$server->getDatabaseConnection());
		return [
			'id' => $this->id,
			'owner' => $this->owner,
			'createdAt' => $this->createdAt,
			'lastModified' => $this->lastModified,
			'descrption' => $this->description,
			'title' => $this->title,

		];
	}
}