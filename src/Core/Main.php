<?php

namespace Mayfield\Core;

use Mayfield\Lib\Config\Config;
use Mayfield\Core\Argument;

final class Main
{
	const ACTION_NAMESPACE = '\\Mayfield\\Action\\';


	/**
	 * Argumentクラスのインスタンス
	 *
	 * @var object
	 */
	private $arg;



	/**
	 * アプリケーションを起動する
	 *
	 * @return void
	 * @throw RuntimeException
	 */
	public function run()
	{
		// アプリケーションの初期設定を行う
		$this->init();

		// アクション実行
		$action_class = self::ACTION_NAMESPACE . $this->arg->getAction();
		$action = new $action_class($this->arg->getParams());
		$action->execute();
	}



	/**
	 * アプリケーションの基本的な初期設定を行う
	 *
	 * @return void
	 */
	private function init()
	{
		// 設定ファイルの読み込み
		Config::init();
		Config::load();

		// 指定された引数を処理
		$this->arg = new Argument();
	}
}
