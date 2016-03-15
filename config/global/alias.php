<?php

/**
 * 定義済み定数やディレクトリ名などのエイリアスを定数で定義する
 */

/** 定義済み定数 */
define('DS', DIRECTORY_SEPARATOR);



/** ディレクトリ */
define('ROOT_PATH', dirname(dirname(__DIR__)) . DS);
define('CONFIG_PATH', ROOT_PATH . 'config' . DS);
define('VENDOR_PATH', ROOT_PATH . 'vendor' . DS);
define('SRC_PATH', ROOT_PATH . 'src' . DS);
define('CORE_PATH', SRC_PATH . 'Core' . DS);
