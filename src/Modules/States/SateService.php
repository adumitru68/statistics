<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/22/2019
 * Time: 12:34 AM
 */

namespace JL\Modules\States;


use Qpdb\Common\Prototypes\Traits\AsSingletonPrototype;

class SateService
{

	use AsSingletonPrototype;

	/**
	 * @var StateDao
	 */
	private $dao;

	/**
	 * SateService constructor.
	 */
	public function __construct() {/**/
		$this->dao = StateDao::getInstance();
	}

	/**
	 * @param bool $returnModel
	 * @return array|StateModel[]
	 * @throws \Qpdb\QueryBuilder\Dependencies\QueryException
	 */
	public function getAllRows( $returnModel = false ) {
		$rows = $this->dao->getAllRows();

		if(!$returnModel) {
			return $rows;
		}

		$models = [];
		foreach ($rows as $row) {
			$models[] = new StateModel($row);
		}

		return $models;
	}

}