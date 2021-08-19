<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
		<?php if (Config::$sCurrentEnv == 'public'): ?>
			<?php echo CONFIG::$sSiteTitle; ?>
		<?php elseif (Config::$sCurrentEnv == 'professional'): ?>
            Alex Schaeffer
		<?php endif; ?>
        - Home
    </title>
    <link rel="shortcut icon" sizes="16x16 32x32 48x48 64x64" href="/img/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
    <!--[if IE]>
    <link rel="shortcut icon" href="/img/favicon.ico"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php if (Config::$sCurrentEnv == 'public'): ?>
        <meta property="og:title" content="Mervyn's Hub"/>
        <meta property="og:url" content="<?= PATH::$BASE_URL ?>"/>
	<?php elseif (Config::$sCurrentEnv == 'professional'): ?>
        <meta property="og:title" content="Homepage of Alex Schaeffer"/>
        <meta property="og:url" content="<?= PATH::$BASE_URL ?>"/>
	<?php endif; ?>
    <meta property="og:image" content="<?= PATH::$BASE_URL ?>img/logo-a.png"/>

	<?php if (ENVIRONMENT == 'production'): ?>
        <link rel="stylesheet" href="/css/vendor/bootstrap.min.css"/>
        <link rel="stylesheet" href="/css/vendor/jquery-ui.min.css"/>
        <link rel="stylesheet" href="/css/style.min.css"/>
	<?php else: ?>
        <link rel="stylesheet" href="/css/vendor/bootstrap.css"/>
        <link rel="stylesheet" href="/css/vendor/jquery-ui.css"/>
        <link rel="stylesheet" href="/css/style.css"/>
	<?php endif; ?>
</head>
<body>
