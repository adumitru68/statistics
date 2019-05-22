<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/22/2019
 * Time: 2:46 AM
 */

namespace JL\Modules\Taxes;


class TaxModel
{

	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var string
	 */
	private $countyId;

	/**
	 * @var float
	 */
	private $tax;


	/**
	 * TaxModel constructor.
	 * @param array $row
	 */
	public function __construct( array $row ) {
		$this->id = (int)$row[ 'id' ];
		$this->countyId = (string)$row[ 'county_id' ];
		$this->tax = (float)$row[ 'tax' ];
	}

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getCountyId(): string {
		return $this->countyId;
	}

	/**
	 * @return float
	 */
	public function getTax(): float {
		return $this->tax;
	}

	/**
	 * @param float $amount
	 * @return float
	 */
	public function getTaxAmount( float $amount ): float {
		$taxValue = $this->tax * $amount / 100;

		return round( $taxValue, 4 );
	}

}