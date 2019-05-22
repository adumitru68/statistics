<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/22/2019
 * Time: 5:05 AM
 */

namespace JL\Modules\Reports;


use Qpdb\Common\Prototypes\Traits\AsSingletonPrototype;
use Qpdb\PdoWrapper\PdoWrapperService;
use Qpdb\QueryBuilder\Abstracts\AbstractTableDao;

class ReportDao extends AbstractTableDao
{

	use AsSingletonPrototype;

	public function perState() {
		$sql = "SELECT 
			sum(am.taxes) taxes_sum,
			avg(am.taxes) taxes_avg,
			avg(am.taxes / am.amount  * 100) percent_avg,
			states.name state_name
			FROM `amounts` am 
			INNER JOIN states ON am.state_id = states.id
			GROUP BY am.state_id
			
		";

		return PdoWrapperService::getInstance()->query( $sql, [] )->fetchAll( \PDO::FETCH_ASSOC );
	}

	public function perCountry() {
		$sql = "SELECT 
			sum(am.taxes) taxes_sum,
			avg(am.taxes) taxes_avg,
			avg(am.taxes / am.amount * 100) percent_avg,
			'All states' state_name
			FROM `amounts` am 
			INNER JOIN states ON am.state_id = states.id
		";

		return PdoWrapperService::getInstance()->query( $sql, [] )->fetchAll( \PDO::FETCH_ASSOC );
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