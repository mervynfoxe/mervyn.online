<?php
define('ENVIRONMENT', isset($_SERVER['ENV']) ? $_SERVER['ENV'] : 'development');

if (ENVIRONMENT !== 'production') {
	ini_set('display_errors', 1);
}

class PATH
{
	public static $ROOT_DIR;
	public static $DS;
	public static $TEMPLATE_DIRECTORY;
	public static $MODEL_DIRECTORY;
	public static $CONTROLLER_DIRECTORY;
	public static $PAGE_DIRECTORY;
	
	public static function load()
	{
		self::$ROOT_DIR = getcwd();
		self::$DS = DIRECTORY_SEPARATOR;
		self::$TEMPLATE_DIRECTORY = (self::$ROOT_DIR . self::$DS . 'view' . self::$DS . '_include');
		self::$MODEL_DIRECTORY = self::$ROOT_DIR . self::$DS . 'model';
		self::$CONTROLLER_DIRECTORY = self::$ROOT_DIR . self::$DS . 'controller';
		self::$PAGE_DIRECTORY = self::$ROOT_DIR . self::$DS . 'view' . self::$DS . 'page';
	}
}

PATH::load();
require_once 'Template.php';
require_once 'Config.php';

function loadController($controller) {
	if (is_file(PATH::$CONTROLLER_DIRECTORY . PATH::$DS . $controller . '.php')) {
		include_once(PATH::$CONTROLLER_DIRECTORY . PATH::$DS . $controller . '.php');
	} else {
		renderPage('404');
	}
}

function loadPage($page) {
	if (is_file(PATH::$PAGE_DIRECTORY . PATH::$DS . $page . '.php')) {
		include_once(PATH::$PAGE_DIRECTORY . PATH::$DS . $page . '.php');
	} else {
		renderPage('404');
	}
}

function renderPage($request) {
	ob_start();
	ob_clean();
	header('Content-type: text/html; charset=utf-8');
	loadController($request);
	loadPage($request);
	ob_flush();
}

session_start();

$request = isset($_GET['q']) ? $_GET['q'] : 'index';
renderPage($request);
?>