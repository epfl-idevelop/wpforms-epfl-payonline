<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
//curl 'https://websrv.epfl.ch/cgi-bin/rwsaccred/getAccred?app=wp-forms&caller=000000&password=...&persid=169419'
//curl 'https://websrv.epfl.ch/cgi-bin/rwsunits/getUnit?app=wp-forms&caller=000000&password=...&id=13030'

class _EPFLWSClient {
	
	const APP_NAME = 'wp-forms';
	const CALLER = '000000';

	const PROD_URL = 'https://websrv.epfl.ch/cgi-bin/';
	const TEST_URL = 'https://test-websrv.epfl.ch/cgi-bin/';
	
	static function getPassword() {
		// cat /keybase/team/epfl_idevfsd/webservices/wpforms-epfl/password
		return getenv( 'EPFL_WEBSRV_PASSWORD') ; 
	}
	
	static const SERVICE_ACCRED = 'rwsaccred';
	static const SERVICE_UNITS = 'rwsunits';
	
	function __construct ($mode = null, $prod = true) {
		
		if (!$mode) { 
			throw new Execption ("EPFL-WS needs a mode");
		}
		
		if ($mode == self::SERVICE_ACCRED) {
			$this->url = self::PROD_URL . self::SERVICE_ACCRED . '/getAccred' ;
			
		}
	}
	
	function httpGet ($params) {
		if (!is_array($params)) { die(); }
		return $this->url .= http_build_query(array_merge(array("app" => self::APP_NAME, "caller" => self::CALLER, "password" => static::getPassword()), $params));
	}
}

class EPFLWSAccred {
	static function getBySciper($sciper) {
		$client = new _EPFLWSClient(_EPFLWSClient::SERVICE_ACCRED, self::_is_prod());
		$client->
	}
	
	static function _is_prod () {
		// @TODO: be smarter
		return false;
	}
}

