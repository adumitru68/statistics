<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/21/2019
 * Time: 11:05 PM
 */

namespace JL\Helpers;


use Qpdb\Common\Prototypes\Traits\AsSingletonPrototype;

class ArrayTools
{

	use AsSingletonPrototype;

	/**
	 * @param mixed $arrayInput
	 * @param bool  $unique
	 * @return array
	 */
	public function getFlattenValues( $arrayInput = [], $unique = false ) {
		$arrayInput = (array)$arrayInput;
		$arrayPrepared = [];
		array_walk_recursive( $arrayInput, function( $a ) use ( &$arrayPrepared ) {
			$arrayPrepared[] = $a;
		} );
		if ( $unique ) {
			return array_values( array_unique( $arrayPrepared ) );
		}

		return $arrayPrepared;
	}

}