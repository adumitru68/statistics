<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/22/2019
 * Time: 3:27 AM
 */

namespace JL\Modules\Counties;


use function DI\string;

class CountyModel
{

	/**
	 * @var string
	 */
	private $id;

	/**
	 * @var string
	 */
	private $stateId;

	/**
	 * @var string
	 */
	private $name;


	/**
	 * CountyModel constructor.
	 * @param array $row
	 */
	public function __construct( array $row ) {
		$this->id = (string)$row[ 'id' ];
		$this->stateId = (string)$row[ 'state_id' ];
		$this->name = (string)$row[ 'name' ];
	}

	/**
	 * @return string
	 */
	public function getId(): string {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getStateId(): string {
		return $this->stateId;
	}

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

}