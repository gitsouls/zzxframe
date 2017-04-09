<?php

/**
 * @函数名称 打印函数
 * @Author   gitsoul@163.com
 * @DateTime 2017-04-03
 * @param    [type]          $arr [description]
 * @return   [type]               [description]
 */
function p($arr){
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}

//C函数，1.加载配置项
//C($sysConfig)
//C($userConfig)
//2.读取配置项
//C('CODE_LEN')
//3.临时动态改变配置项
//C('CODE_LEN',20);

function C($var=NULL,$value=NULL){
	static $config = array();
	//加载配置项
	if (is_array($var)) {
		$config = array_merge($config,array_change_key_case($var,CASE_UPPER));
		return;
	}
	//读取，动态改变配置项
	if (is_string($var)) {
		$var = strtoupper($var);
		//两个参数传递
		if (!is_null($value)) {
			$config[$var] = $value;
			return;
		}
		return isset($config[$var])?$config[$var]:NULL;
	}

	//返回所有配置项
	if (is_null($var) && is_null($value)) {
		return $config;
	}
}