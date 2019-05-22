<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/21/2019
 * Time: 4:17 AM
 */

namespace JL\Config;


use JL\Core;
use Qpdb\PdoWrapper\Helpers\QueryTimer;
use Qpdb\PdoWrapper\Interfaces\PdoWrapperConfigInterface;

class DbConfig implements PdoWrapperConfigInterface
{

	/**
	 * @return string
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 */
	public function getHost() {
		return Core::settings()->getProperty( 'db_credentials.host' );
	}

	/**
	 * @return string
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 */
	public function getUser() {
		return Core::settings()->getProperty( 'db_credentials.user' );
	}

	/**
	 * @return string
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 */
	public function getPassword() {
		return Core::settings()->getProperty( 'db_credentials.password' );
	}

	/**
	 * @return string
	 * @throws \Qpdb\Common\Exceptions\CommonException
	 */
	public function getDbName() {
		return Core::settings()->getProperty( 'db_credentials.dbname' );
	}

	/**
	 * @return array
	 */
	public function getExecCommands() {
		return [
			"SET time_zone='+00:00'"
		];
	}

	/**
	 * @param \Exception $e
	 * @param array      $otherInformation
	 * @throws \Exception
	 */
	public function handlePdoException( \Exception $e, $otherInformation = [] ) {
		throw new \Exception( $e->getMessage() );
	}

	/**
	 * @param string     $query
	 * @param QueryTimer $timer
	 * @return void
	 */
	public function handlePdoExecute( $query, QueryTimer $timer ) {
		// TODO: Implement handlePdoExecute() method.
	}


}