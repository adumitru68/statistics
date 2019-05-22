<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/22/2019
 * Time: 1:04 AM
 */

namespace JL\Modules\States;


class StateModel
{

	/**
	 * @var string
	 */
	private $id;

	/**
	 * @var string
	 */
	private $name;


	/**
	 * StateModel constructor.
	 * @param array $row
	 */
	public function __construct( array $row) {
		$this->id = (string)$row['id'];
		$this->name = (string)$row['name'];
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
	public function getName(): string {
		return $this->name;
	}

}