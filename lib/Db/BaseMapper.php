<?php
/**
 * Created by PhpStorm.
 * User: michaelpollind
 * Date: 3/3/17
 * Time: 9:44 AM
 */

namespace OCA\Financier\Db;


use OCP\AppFramework\Db\Mapper;

class BaseMapper extends Mapper{
	/**
	 * @param $id
	 * @return \OCP\AppFramework\Db\Entity if not found
	 */
	public function find($id) {
		$sql = 'SELECT * FROM `' . $this->tableName . '` ' . 'WHERE `id` = ?';
		return $this->findEntity($sql, [$id]);
	}
	protected function execute($sql, array $params = [], $limit = null, $offset = null) {
		return parent::execute($sql, $params, $limit, $offset);
	}
}