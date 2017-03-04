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

class Book extends Entity implements JsonSerializable {

	public $id;
	protected $description;
	protected $title;

	public  function __construct() {
		$this->addType('id','integer');
		$this->addType('description','text');
		$this->addType('title','text');

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
		return [
			'id' => $this->id,
			'description' => $this->description,
			'title' => $this->title
		];
	}
}