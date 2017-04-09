<?php 

final class ZZXPHP{
	public static function run(){
		//定义常量
		self::_set_const();
		//创建目录
		self::_create_dir();
		//载入核心文件
		self::_import_file();
		Application::run();
	}

	private static function _set_const(){
		//定义框架根目录
		// var_dump(__FILE__);
		$path = str_replace('\\','/',__FILE__);
		define('ZZXPHP_PATH',dirname($path));
		//定义框架配置项目录
		define('CONFIG_PATH',ZZXPHP_PATH.'/Config');
		define('DATA_PATH',ZZXPHP_PATH.'/Data');
		define('LIB_PATH',ZZXPHP_PATH.'/Lib');
		define('CORE_PATH',LIB_PATH.'/Core');
		define('FUNCTION_PATH',LIB_PATH.'/Function');
		//定义根目录
		define('ROOT_PATH', dirname(ZZXPHP_PATH));
		//定义应用目录
		define('APP_PATH',ROOT_PATH.'/'.APP_NAME);
		define('APP_CONFIG_PATH',APP_PATH.'/Config');
		define('APP_CONTROLLER_PATH',APP_PATH.'/Controller');
		define('APP_TPL_PATH',APP_PATH.'/Tpl');
		define('APP_PUBLIC_PATH',APP_TPL_PATH.'/Public');
	}

	private static function _create_dir(){
		$arr = array(
			APP_PATH,
			APP_CONFIG_PATH,
			APP_CONTROLLER_PATH,
			APP_TPL_PATH,
			APP_PUBLIC_PATH
			);
		//创建目录
		foreach ($arr as $v) {
			is_dir($v) || mkdir($v,0777,true);
		}
	}

	private static function _import_file(){
		$fileArr = array(
			FUNCTION_PATH . '/function.php',
			CORE_PATH . '/Controller.class.php',
			CORE_PATH . '/Application.class.php'
			);
		foreach ($fileArr  as $v) {
			require_once $v;
		}
	}

}

ZZXPHP::run();

?>