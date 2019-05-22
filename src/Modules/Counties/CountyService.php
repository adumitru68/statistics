<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/22/2019
 * Time: 12:28 AM
 */

namespace JL\Modules\Counties;


use JL\Core;
use JL\Modules\States\SateService;
use JL\Modules\Taxes\TaxDao;
use JL\Modules\Taxes\TaxService;
use Qpdb\Common\Prototypes\Traits\AsSingletonPrototype;

class CountyService
{

	use AsSingletonPrototype;

	/**
	 * @var CountyDao
	 */
	private $dao;

	/**
	 * CountyService constructor.
	 */
	public function __construct() {
		$this->dao = CountyDao::getInstance();
	}

	/**
	 * @return CountyModel[]
	 * @throws \Qpdb\QueryBuilder\Dependencies\QueryException
	 */
	public function getAllRows() {
		$models = [];
		$rows = $this->dao->getAllRows();
		foreach ( $rows as $row ) {
			$models[] = new CountyModel( $row );
		}

		return $models;
	}


	/**
	 * @throws \JL\Helpers\StringToolsException
	 * @throws \Qpdb\QueryBuilder\Dependencies\QueryException
	 */
	public function generateCounties() {
		$this->dao->clean();
		TaxService::getInstance()->clean();
		$states = SateService::getInstance()->getAllRows( true );
		foreach ( $states as $state ) {
			$numberOfCounties = random_int( 3, 7 );
			for ( $i = 1; $i <= $numberOfCounties; $i++ ) {
				$countyId = Core::helper()->stringTools()->concat( $state->getId(), 'c', $i );
				$row = [
					'id' => $countyId,
					'state_id' => $state->getId(),
					'name' => Core::helper()->stringTools()->delimiterConcat( ' ', 'County', $countyId )
				];
				$rowTax = [
					'county_id' => $countyId,
					'tax' => random_int( 12, 24 )
				];
				$this->dao->insertRow( $row );
				TaxService::getInstance()->insertRow( $rowTax );
			}
		}
	}


}