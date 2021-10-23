<?php
define('_SERVER_NAME', '192.168.64.2');
define('_SERVER_URL', 'http://'._SERVER_NAME);
define('_APP_ROOT', '/Zad2');
define('_APP_URL', _SERVER_URL._APP_ROOT);
define("_ROOT_PATH", dirname(__FILE__));

function out(&$param){
	if (isset($param)){
		echo $param;
	}
}
?>