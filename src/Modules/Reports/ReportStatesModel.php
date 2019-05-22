<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/22/2019
 * Time: 5:56 AM
 */

namespace JL\Modules\Reports;


class ReportStatesModel
{

	/**
	 * @var float
	 */
	private $sumTaxes;
	/**
	 * @var float
	 */
	private $avgTaxes;
	/**
	 * @var float
	 */
	private $avgTaxesPercent;
	/**
	 * @var string
	 */
	private $state;

	/**
	 * ReportStatesModel constructor.
	 * @param array $row
	 */
	public function __construct( array $row) {
		$this->sumTaxes = round((float)$row['taxes_sum'],2);
		$this->avgTaxes = round((float)$row['taxes_avg'],2);
		$this->avgTaxesPercent = round((float)$row['percent_avg'],2);
		$this->state = (string)$row['state_name'];
	}

	/**
	 * @return float
	 */
	public function getSumTaxes(): float {
		return $this->sumTaxes;
	}

	/**
	 * @return float
	 */
	public function getAvgTaxes(): float {
		return $this->avgTaxes;
	}

	/**
	 * @return float
	 */
	public function getAvgTaxesPercent(): float {
		return $this->avgTaxesPercent;
	}

	/**
	 * @return string
	 */
	public function getState(): string {
		return $this->state;
	}

}