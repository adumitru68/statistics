<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/22/2019
 * Time: 12:29 AM
 */

namespace JL\Modules\Counties;


use Qpdb\Common\Prototypes\Traits\AsSingletonPrototype;
use Qpdb\PdoWrapper\PdoWrapperService;
use Qpdb\QueryBuilder\Abstracts\AbstractTableDao;
use Qpdb\QueryBuilder\QueryBuild;

class CountyDao extends AbstractTableDao
{

	use AsSingletonPrototype;


	public function clean() {
		PdoWrapperService::getInstance()->query( "TRUNCATE TABLE `{$this->table}`", [] );
	}

	/**
	 * @return array
	 * @throws \Qpdb\QueryBuilder\Dependencies\QueryException
	 */
	public function getAllRows() {
		return QueryBuild::select($this->getTableName())
			->orderByExpression('rand()')
			->execute();
	}

	/**
	 * @return string
	 */
	protected function getTableName() {
		return 'counties';
	}

	/**
	 * @return string|array
	 */
	protected function getPrimaryKey() {
		return 'id';
	}

	/**
	 * @return string
	 */
	protected function getOrderField() {
		return '';
	}
}