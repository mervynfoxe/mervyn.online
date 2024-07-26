@extends('layouts.landing')
@section('content')
    <div class="background"></div>
    <div class="container-fluid center-box">
        <div class="row-fluid">
            <div class="col-lg-6 col-lg-offset-4 col-md-6 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center"
                 id="mainContent">
                <x-header />
                <?php /*Template::includeTemplate('partials/social_' . Config::$sCurrentEnv . '.php');*/ ?>
            </div>
            <x-copyright />
            env: {{ $environment->name }}<br />
            domain: {{ $request->getHost() }}
        </div>
    </div>
@endsection
