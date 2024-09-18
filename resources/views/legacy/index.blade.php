<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        {{ config('app.name') }}
        Home
    </title>
    <link rel="shortcut icon" sizes="16x16 32x32 48x48 64x64" href="/img/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
    <!--[if IE]>
    <link rel="shortcut icon" href="/img/favicon.ico"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:title" content="Mervyn's Hub"/>
    <meta property="og:url" content="{{ config('app.url') }}"/>

    <meta property="og:image" content="{{ config('app.url') }}/img/logo-a.png"/>

    <link rel="stylesheet" href="{{ Vite::asset('resources/legacy/css/vendor/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ Vite::asset('resources/legacy/css/vendor/jquery-ui.min.css') }}"/>
    <link rel="stylesheet" href="{{ Vite::asset('resources/legacy/css/style.css') }}"/>
</head>
<body>

<div class="background"></div>
<div class="container-fluid center-box">
    <div class="row-fluid">
        <div class="col-lg-6 col-lg-offset-4 col-md-6 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center"
             id="mainContent">
            <x-legacy-header :environment="$env" />
            <x-legacy-social :environment="$env" />
        </div>
        <x-legacy-copyright :environment="$env" />
    </div>
</div>

<script>
    <?= 'var sEmail = \'era.z.sbk@tznvy.pbz\';' ?>
</script>

<script type="text/javascript" src="{{ Vite::asset('resources/legacy/js/vendor/jquery-1.10.2.min.js') }}"></script>
<script type="text/javascript" src="{{ Vite::asset('resources/legacy/js/vendor/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ Vite::asset('resources/legacy/js/vendor/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ Vite::asset('resources/legacy/js/script.js') }}"></script>

</body>
</html>
