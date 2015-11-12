<?php
// 获取服务器地址
function host ($uri = '')
{
	// URL协议
	$http = (isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!='off')?'https://':'http://';
	// 端口
	$port = $_SERVER['SERVER_PORT'] != 80 ? : '';
	// 域名
	$domain = $_SERVER['HTTP_HOST'];
	// URI
	$uri = $uri ? $_SERVER['REQUEST_URI'] : '';

	return $http . $domain . $port . $uri;
}

function get_avatar_name(){
	return 'temp_' . md5(session('uid'));
}