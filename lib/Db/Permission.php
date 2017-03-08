<?php
use OCP\AppFramework\Db\Entity;

/**
 * Created by PhpStorm.
 * User: michaelpollind
 * Date: 3/8/17
 * Time: 8:29 AM
 */

class Permission extends Entity implements JsonSerializable {

	public $id;
	protected $user;
	protected $bookId;
	protected $permissionEdit;
	protected $permissionView;
	protected $permissionManage;

	function __construct() {
		$this->addType('id','integer');
		$this->addType('user','string');
		$this->addType('bookId','string');
		$this->addType('permissionEdit','bool');
		$this->addType('permissionManage','bool');
		$this->addType('permissionView','bool');
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
			'user' => $this->user,
			'bookId' => $this->bookId,
			'permissionEdit' => $this->permissionEdit,
			'permissionManage' => $this->permissionManage,
			'permissionView' => $this->permissionView
		];
	}
}