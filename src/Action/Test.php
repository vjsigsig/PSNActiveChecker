<?php

namespace Mayfield\Action;

use Mayfield\Action\Action;

/**
 * コンソール上に指定の文字列を表示させるテスト用アクション
 */
class Test extends Action
{
	public function execute()
	{
		echo $this->params . PHP_EOL;
	}
}
