<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
//umask(0000);
$ip2longCli = ip2long($_SERVER['REMOTE_ADDR']);
$minIp = ip2long('172.17.0.1');
$maxIp = ip2long('172.17.0.10');
$minIpVagrant = ip2long('192.168.33.1');
$maxIpVagrant = ip2long('192.168.33.10');

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.
// I custom by remove this instruction in the condition '|| isset($_SERVER['HTTP_X_FORWARDED_FOR'])' because it's the header send by xdebug
if (isset($_SERVER['HTTP_CLIENT_IP'])
    || (!(in_array(@$_SERVER['REMOTE_ADDR'], array(
    												'127.0.0.1',
    												 '192.168.33.10', 
    												 'fe80::1', '::1'
    										)))
    	 AND !(($minIp <= $ip2longCli) && ($ip2longCli <= $maxIp) ||  ($minIpVagrant <= $ip2longCli) && ($ip2longCli <= $maxIpVagrant)))
    	    || php_sapi_name() === 'cli-server'
) {
    header('HTTP/1.0 403 Forbidden');
	echo $_SERVER['REMOTE_ADDR'],
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}

/**
 * @var Composer\Autoload\ClassLoader $loader
 */
$loader = require __DIR__.'/../app/autoload.php';
Debug::enable();

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
