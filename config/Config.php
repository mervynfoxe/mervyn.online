<?php

class Config {
	public static $sSiteTitle = 'Mervyn Fox';
	public static $sBaseURL = 'https://amv-ph34r.com/';
	public static $sLogDir = 'logs';
	public static $sDateFormat = 'Y-m-d\TH-i-s';
	public static $aEnvMap = array(
	    'public' => array(
	        'amv-ph34r.com', 'amv-ph34r.local.com',
            'mervyn.online', 'mervyn.local'
        ),
        'professional' => array(
            'arschaeffer.com', 'arschaeffer.local'
        ),
		'professional-ren' => array(
			'renfox.online', 'renfox.local'
		)
    );
	public static $sCurrentEnv = 'public';

	public static function setEnv($default = 'public') {
	    foreach(self::$aEnvMap as $env => $domains) {
	        foreach($domains as $domain) {
                if (strpos(PATH::$HOST, $domain) !== false) {
                    self::$sCurrentEnv = $env;
                    return TRUE;
                }
            }
        }
	    self::$sCurrentEnv = $default;
	    return FALSE;
    }
}

Config::setEnv();
