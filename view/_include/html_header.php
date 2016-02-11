<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo CONFIG::$sSiteTitle; ?></title>
		<link rel="shortcut icon" sizes="16x16 32x32 48x48 64x64" href="/img/favicon.ico">
		<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
		<!--[if IE]><link rel="shortcut icon" href="/img/favicon.ico"><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php if (ENVIRONMENT == 'production'): ?>
		<link rel="stylesheet" href="/css/vendor/bootstrap.min.css" />
		<link rel="stylesheet" href="/css/style.min.css" />
		<?php else: ?>
		<link rel="stylesheet" href="/css/vendor/bootstrap.css" />
		<link rel="stylesheet" href="/css/style.css" />
		<?php endif; ?>
	</head>
<body>
