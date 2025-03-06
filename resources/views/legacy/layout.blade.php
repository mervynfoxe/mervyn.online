<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        @yield('site_title') - @yield('page_title')
    </title>
    <link rel="shortcut icon" sizes="16x16 32x32 48x48 64x64" href="/img/favicon.ico">
    <link rel="shortcut icon" type="image/x-icon" href="{{ Vite::asset('resources/legacy/img/favicon.ico') }}">
    <!--[if IE]>
    <link rel="shortcut icon" href="{{ Vite::asset('resources/legacy/img/favicon.ico') }}"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:title" content="@yield('site_title')"/>
    <meta property="og:url" content="{{ config('app.url') }}"/>

    <meta property="og:image" content="{{ Vite::asset('resources/legacy/img/logo-a.png') }}"/>

    @vite(['resources/css/legacy.css', 'resources/js/legacy.js'])
</head>
<body>

<div class="background"></div>
<div class="container-fluid center-box">
    <div class="row-fluid">
        <div class="col-lg-6 col-lg-offset-4 col-md-6 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center"
             id="mainContent">
            @yield('content')
        </div>
        <x-legacy-copyright />
    </div>
</div>

<script>let sEmail = '@yield('email_addr')';</script>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
</body>
</html>
