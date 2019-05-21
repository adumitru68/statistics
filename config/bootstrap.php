<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/21/2019
 * Time: 3:16 AM
 */

use JL\Config\DbConfig;
use Qpdb\PdoWrapper\PdoWrapperService;
use Qpdb\SlimApplication\Config\ConfigService;

require __DIR__ . '/../vendor/autoload.php';

$configPath = __DIR__ . '/settings.php';

ConfigService::getInstance()->setConfigPath( __DIR__ . '/settings.php' );
PdoWrapperService::getInstance()->setPdoWrapperConfig( ( new DbConfig() ) );