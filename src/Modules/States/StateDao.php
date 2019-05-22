<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/22/2019
 * Time: 12:34 AM
 */

namespace JL\Modules\States;


use Qpdb\Common\Prototypes\Traits\AsSingletonPrototype;
use Qpdb\QueryBuilder\Abstracts\AbstractTableDao;
use Qpdb\QueryBuilder\QueryBuild;

class StateDao extends AbstractTableDao
{

	use AsSingletonPrototype;

	/**
	 * @param array $fields
	 * @return array
	 * @throws \Qpdb\QueryBuilder\Dependencies\QueryException
	 */
	public function getAllRows( array $fields = [] ) {
		return QueryBuild::select( $this->table )
			->fields( $fields )
			->orderBy( 'id' )
			->execute();
	}

	/**
	 * @return string
	 */
	protected function getTableName() {
		return 'states';
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