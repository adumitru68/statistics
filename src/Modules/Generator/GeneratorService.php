<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/22/2019
 * Time: 12:10 AM
 */

namespace JL\Modules\Generator;


use JL\Modules\Counties\CountyService;
use JL\Modules\Taxes\TaxService;
use Qpdb\Common\Prototypes\Traits\AsSingletonPrototype;

class GeneratorService
{
	use AsSingletonPrototype;

	/**
	 * @var GeneratorDao
	 */
	private $dao;

	/**
	 * GeneratorService constructor.
	 */
	public function __construct() {
		$this->dao = GeneratorDao::getInstance();
	}

	public function generateAmounts() {
		$this->dao->clean();
		$countyModels = CountyService::getInstance()->getAllRows();
		foreach ( $countyModels as $countyModel ) {
			$amountsRowInsert = random_int( 30, 50 );
			for ( $i = 1; $i <= $amountsRowInsert; $i++ ) {
				$amount = random_int( 30, 2000 );
				$rowInsert = [
					'state_id' => $countyModel->getStateId(),
					'county_id' => $countyModel->getId(),
					'amount' => $amount,
					'taxes' => $this->calcTaxes($countyModel->getId(), $amount)
				];
				$this->dao->insertRow($rowInsert);
			}
		}
	}

	private function calcTaxes(string $countyId, float $amount): float {
		$taxValue = 0;
		$taxes = TaxService::getInstance()->getTaxesByCounty($countyId);
		foreach ($taxes as $tax) {
			$taxValue += $tax->getTaxAmount($amount);
		}

		return $taxValue;
	}

	public function insertRow( array $row ) {
		$this->dao->insertRow( $row );
	}

}