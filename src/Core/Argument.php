<?php

namespace Mayfield\Core;

use RuntimeException;

final class Argument
{
	/**
	 * アクション名
	 *
	 * @var string
	 */
	private $action;

	/**
	 * パラメーター
	 *
	 * @var string
	 */
	private $params;



	/**
	 * 指定された引数を整形してプロパティにまとめる
	 *
	 * @return void
	 * @throw RuntimeException
	 */
	public function __construct()
	{
		$argv = $_SERVER['argv'];

		if (3 !== count($argv)) {
			throw new RuntimeException('引数が間違っています');
		}

		$this->action = $argv[1];
		$this->params = $argv[2];
	}



	public function getAction()
	{
		return $this->action;
	}



	public function getParams()
	{
		return $this->params;
	}
}
