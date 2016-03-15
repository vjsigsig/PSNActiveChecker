<?php

namespace Mayfield\Lib\Config;

use RuntimeException;

final class Config
{
	/**
	 * キーセパレーター
	 *
	 * @var string
	 */
	const KEY_SEPARATOR = '.';

	/**
	 * デフォルトで除外するディレクトリ名
	 *
	 * @var array
	 */
	private static $DEFAULT_EXCLUDE_DIR = [
		'global',
	];

	/**
	 * 各ライブラリのコンフィグファイルが格納されている
	 * ディレクトリの最上位パス
	 *
	 * @var string
	 */
	private static $config_path;

	/**
	 * 読み込み対象ディレクトリ名設定
	 *
	 * @var array
	 */
	private static $target_dir = [];

	/**
	 * 読み込み対象外ディレクトリ名設定
	 *
	 * @var array
	 */
	private static $exclude_dir = [];

	/**
	 * 読み込み済みの設定ファイル
	 *
	 * @var array
	 */
	private static $config_list = [];



	/**
	 * 初期設定を行う
	 * 引数に指定したディレクトリから配置されている設定ファイルを
	 * 全て読み込む
	 *
	 * @param string $config_path 設定ファイルディレクトリパス
	 * @return self
	 */
	public static function init($config_path = CONFIG_PATH)
	{
		self::$config_path = $config_path;

		// 各ライブラリのディレクトリ名を全て取得し
		// 読み込み対象ディレクトリ名としてプロパティにセット
		$dir_list = array_diff(scandir(CONFIG_PATH), ['.', '..'], self::$DEFAULT_EXCLUDE_DIR);
		foreach ($dir_list as $dir) {
			self::$target_dir[] = $dir;
		}
	}



	/**
	 * 読み込み除外ディレクトリ名を追加する
	 *
	 * @param string|array $dirs 除外対象ディレクトリ名
	 * @return void
	 */
	public static function addExcludeDir($dirs)
	{
		// 配列だった場合、後のループ処理の為配列化
		if (false === is_array($dirs)) {
			$dirs = [$dirs];
		}

		foreach ($dirs as $dir) {
			if (false === isset(self::$exclude_dir[$dir])) {
				self::$exclude_dir[$dir];
			}
		}
	}



	/**
	 * プロパティに指定されている読み込み対象ディレクトリに存在する
	 * 設定ファイルを全て読み込む
	 *
	 * @return void
	 * @throw RuntimeException
	 */
	public static function load()
	{
		foreach (self::$target_dir as $dir) {
			if (true === in_array($dir, self::$exclude_dir)) {
				continue;
			}

			$path = self::$config_path . $dir;
			$files = array_diff(scandir($path), ['.', '..']);

			foreach ($files as $file) {
				$config_arr = require_once($path . DS . $file);
				foreach ($config_arr as $key => $val) {
					self::$config_list[$dir][$key] = $val;
				}
			}
		}
	}



	/**
	 * 読み込まれた設定配列から指定のキーを元に値を取り出す
	 *
	 * @param string $key キー
	 * @return mixed
	 */
	public static function get($key)
	{
		$key = explode(self::KEY_SEPARATOR, $key);

		foreach ($key as $sep) {
			if (false === isset($result)) {
				$result = self::$config_list[$sep];
				continue;
			}
			$result = $result[$sep];
		}

		return $result;
	}



	/**
	 * デバッグ用関数
	 * 読み込み済の設定配列を全て返す
	 *
	 * @return array
	 */
	public static function getConfigList()
	{
		return self::$config_list;
	}
}
