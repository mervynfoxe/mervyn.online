<?php

require_once 'config/Database.php';

class DOI {
	private static $sHost;
	private static $sDatabase;
	private static $sUsername;
	private static $sPassword;
	private static $aOptions;
	private static $sConn;
	private static $oHandler = NULL;

	private static function load() {
		self::$sHost = DB::$sDBHost;
		self::$sDatabase = DB::$sDBName;
		self::$sUsername = DB::$sDBUsername;
		self::$sPassword = DB::$sDBPassword;
		self::$sConn = sprintf("mysql:host=%s;dbname=%s", self::$sHost, self::$sDatabase);
		self::$aOptions = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
		);
	}

	public static function getPDO() {
		if (self::$oHandler === NULL) {
			self::load();
			self::$oHandler = new PDO(self::$sConn, self::$sUsername, self::$sPassword, self::$aOptions);
		}

		return self::$oHandler;
	}
}