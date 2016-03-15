<?php

namespace Mayfield\Action;

/**
 * アクションクラスの基底クラス
 */
abstract class Action
{
	protected $params;



	/**
	 * コンストラクタ
	 *
	 * @param mixed $params 汎用パラメーター
	 * @return void
	 */
	public function __construct($params = null)
	{
		$this->params = $params;
	}



	/**
	 * メイン処理の事前処理を行う
	 *
	 * @return bool
	 */
	public function before()
	{
	}



	/**
	 * メイン処理
	 *
	 * @return bool
	 */
	public function execute()
	{
	}



	/**
	 * メイン処理の事後処理を行う
	 *
	 * @return bool
	 */
	public function after()
	{
	}
}
