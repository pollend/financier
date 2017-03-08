<?php
/**
 * Created by PhpStorm.
 * User: michaelpollind
 * Date: 3/7/17
 * Time: 7:25 PM
 */

namespace OCA\Financier\Db;


use JsonSerializable;
use OCP\AppFramework\Db\Entity;

class Tag extends Entity implements JsonSerializable {


	public  $id;
	protected $bookId;
	protected $tag;

	function __construct() {
		$this->addType('id','integer');
		$this->addType('bookId','integer');
		$this->addType('tag','string');
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
			"id" => $this->id,
			"bookId" => $this->bookId,
			"tag" => $this->tag
		];

	}
}