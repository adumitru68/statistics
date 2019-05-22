<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/22/2019
 * Time: 2:36 AM
 */

namespace JL\Modules\Taxes;


use Qpdb\Common\Prototypes\Traits\AsSingletonPrototype;
use Qpdb\PdoWrapper\PdoWrapperService;
use Qpdb\QueryBuilder\Abstracts\AbstractTableDao;
use Qpdb\QueryBuilder\QueryBuild;

class TaxDao extends AbstractTableDao
{

	use AsSingletonPrototype;

	public function clean() {
		PdoWrapperService::getInstance()->query( "TRUNCATE TABLE `{$this->table}`", [] );
	}



	/**
	 * @param $countyId
	 * @return array
	 * @throws \Qpdb\QueryBuilder\Dependencies\QueryException
	 */
	public function getTaxesByCounty( $countyId ) {
		return QueryBuild::select( $this->getTableName() )
			->whereEqual( 'county_id', $countyId )
			->execute();
	}

	/**
	 * @return string
	 */
	protected function getTableName() {
		return 'taxes';
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