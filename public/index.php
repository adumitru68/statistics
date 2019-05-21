<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 5/21/2019
 * Time: 3:17 AM
 */

use Qpdb\SlimApplication\SlimApplicationDI;

require __DIR__ . '/../config/bootstrap.php';

SlimApplicationDI::routerService()->run();