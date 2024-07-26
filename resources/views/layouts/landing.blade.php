<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ $site_title }} - Home</title>
    <link rel="shortcut icon" sizes="16x16 32x32 48x48 64x64" href="/img/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
    <!--[if IE]>
    <link rel="shortcut icon" href="/img/favicon.ico">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="{{ $meta_title }}"/>
    <meta property="og:url" content="{{ URL::to('/') }}"/>
    <meta property="og:image" content="{{ URL::to('/') }}img/logo-a.png"/>

    @env(['staging', 'production'])
        <link rel="stylesheet" href="/css/vendor/bootstrap.min.css"/>
        <link rel="stylesheet" href="/css/vendor/jquery-ui.min.css"/>
        <link rel="stylesheet" href="/css/style.min.css"/>
    @endenv

    @env(['local', 'development'])
        <link rel="stylesheet" href="/css/vendor/bootstrap.css"/>
        <link rel="stylesheet" href="/css/vendor/jquery-ui.css"/>
        <link rel="stylesheet" href="/css/style.css"/>
    @endenv
</head>
<body>
    @yield('content')
    <script>
    <?php
        echo 'var sEmail = \'era.z.sbk@tznvy.pbz\';';
    ?>
    </script>

    @env(['staging', 'production'])
        <script type="text/javascript" src="/js/vendor/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="/js/vendor/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/script.min.js"></script>
    @endenv

    @env(['local', 'development'])
        <script type="text/javascript" src="/js/vendor/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="/js/vendor/jquery-ui.js"></script>
        <script type="text/javascript" src="/js/vendor/bootstrap.js"></script>
        <script type="text/javascript" src="/js/script.js"></script>
    @endenv
</body>
</html>
