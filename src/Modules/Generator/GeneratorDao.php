<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/22/2019
 * Time: 12:12 AM
 */

namespace JL\Modules\Generator;


use Qpdb\Common\Prototypes\Traits\AsSingletonPrototype;
use Qpdb\PdoWrapper\PdoWrapperService;
use Qpdb\QueryBuilder\Abstracts\AbstractTableDao;

class GeneratorDao extends AbstractTableDao {

	use AsSingletonPrototype;

	public function clean() {
		PdoWrapperService::getInstance()->query( "TRUNCATE TABLE `{$this->table}`", [] );
	}

	/**
	 * @return string
	 */
	protected function getTableName() {
		return 'amounts';
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