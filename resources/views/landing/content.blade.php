@extends('layouts.landing')
@section('content')
    <div class="background"></div>
    <div class="container-fluid center-box">
        <div class="row-fluid">
            <div class="col-lg-6 col-lg-offset-4 col-md-6 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center"
                 id="mainContent">
                Content here<br />
                {{ $environment->name }}
                <?php /*Template::includeTemplate('partials/header_' . Config::$sCurrentEnv . '.php');*/ ?>
                <?php /*Template::includeTemplate('partials/social_' . Config::$sCurrentEnv . '.php');*/ ?>
            </div>
            <x-copyright />
        </div>
    </div>
@endsection
