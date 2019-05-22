<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/22/2019
 * Time: 5:05 AM
 */

namespace JL\Modules\Reports;


use Qpdb\Common\Prototypes\Traits\AsSingletonPrototype;

class ReportService
{

	use AsSingletonPrototype;

	/**
	 * @var ReportDao
	 */
	private $dao;

	public function __construct() {
		$this->dao = ReportDao::getInstance();
	}

	/**
	 * @return ReportStatesModel[]
	 */
	public function perState() {
		$rows = $this->dao->perState();
		$models = [];
		foreach ($rows as $row) {
			$models[] = new ReportStatesModel($row);
		}

		return $models;
	}

}