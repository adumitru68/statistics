<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/21/2019
 * Time: 5:44 AM
 */

namespace JL\Helpers;


use Qpdb\Common\Prototypes\Traits\AsSingletonPrototype;

class StringTools
{

	use AsSingletonPrototype;

	/**
	 * @param mixed ...$items
	 * @return string
	 * @throws StringToolsException
	 */
	public function concat( ...$items ) {
		return implode( '', $this->prepareStringsForConcat( $items ) );
	}

	/**
	 * @param null|string $delimiter
	 * @param mixed       ...$items
	 * @return string
	 * @throws StringToolsException
	 */
	public function delimiterConcat( $delimiter = null, ...$items ) {
		return implode( (string)$delimiter, $this->prepareStringsForConcat( $items ) );
	}

	/**
	 * @param string $input
	 * @return string
	 * @throws StringToolsException
	 */
	public function upperCase( $input ) {
		return strtoupper( $this->toString( $input ) );
	}

	/**
	 * @param string $input
	 * @return string
	 * @throws StringToolsException
	 */
	public function lowerCase( $input ) {
		return strtolower( $this->toString( $input ) );
	}


	/**
	 * @param $input
	 * @return string
	 */
	public function md5( $input ) {
		$hashed = md5( $input );

		return $hashed;
	}

	/**
	 * @param string $input
	 * @return string
	 * @throws StringToolsException
	 */
	public function sha512( $input ) {
		return hash( 'sha512', $this->toString( $input ) );
	}

	/**
	 * @param string $a Needle to search for
	 * @param string $b Replace - value to replace the needle
	 * @param string $c Haystack - string to search the needle in
	 * @return mixed
	 * @throws StringToolsException
	 */
	public function replace( $a, $b, $c ) {
		return str_replace( $this->toString( $a ), $this->toString( $b ), $this->toString( $c ) );
	}

	/**
	 * @param $input
	 * @return string
	 * @throws StringToolsException
	 */
	public function trim( $input ) {
		return trim( $this->toString( $input ) );
	}

	/**
	 * @param array $items
	 * @return array
	 * @throws StringToolsException
	 */
	private function prepareStringsForConcat( array $items ) {
		$items = ArrayTools::getInstance()->getFlattenValues( $items );
		foreach ( $items as $key => $item ) {
			$items[ $key ] = $this->toString( $item );
		}

		return $items;
	}

	/**
	 * @param $variable
	 * @return string
	 * @throws StringToolsException
	 */
	private function toString( $variable ) {
		switch ( gettype( $variable ) ) {
			case 'string':
			case 'double':
			case 'integer':
			case 'NULL':
				return (string)$variable;
			default:
				throw new StringToolsException( 'Not cast string: "' . gettype( $variable ) . '".' );
		}
	}

}