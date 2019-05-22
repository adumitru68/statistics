<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/22/2019
 * Time: 2:35 AM
 */

namespace JL\Modules\Taxes;


use Qpdb\Common\Prototypes\Traits\AsSingletonPrototype;

class TaxService
{

	use AsSingletonPrototype;

	/**
	 * @var TaxDao
	 */
	private $dao;

	/**
	 * TaxService constructor.
	 */
	public function __construct() {
		$this->dao = TaxDao::getInstance();
	}

	public function clean() {
		$this->dao->clean();
	}

	/**
	 * @param $countyId
	 * @return TaxModel[]
	 * @throws \Qpdb\QueryBuilder\Dependencies\QueryException
	 */
	public function getTaxesByCounty($countyId) {
		$taxesModel = [];
		$rows = $this->dao->getTaxesByCounty($countyId);
		foreach ($rows as $row) {
			$taxesModel[] = new TaxModel($row);
		}

		return $taxesModel;
	}

	/**
	 * @param array $arrayInsert
	 * @throws \Qpdb\QueryBuilder\Dependencies\QueryException
	 */
	public function insertRow(array $arrayInsert) {
		$this->dao->insertRow($arrayInsert);
	}

}