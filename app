#!/usr/bin/env php
<?php

use Mayfield\Core\Main;
use Mayfield\Lib\Config\Config;

require_once('config/global/alias.php');

if (false === file_exists(VENDOR_PATH . 'autoload.php')) {
	throw new RuntimeException;
}

require_once(VENDOR_PATH . 'autoload.php');
require_once(CORE_PATH . 'Debug' . DS . 'global_functions.php');

(new Main())->run();
