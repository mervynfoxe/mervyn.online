@extends('legacy.layout', ['env' => $env])

@section('site_title', $env === 'professional' ? 'Ren Fox' : config('app.name'))
@section('page_title', 'Home')

@section('content')
    <x-legacy-header :environment="$env" />
    <x-legacy-social :environment="$env" />
@endsection

@section('email_addr', $env === 'professional' ? 'uv@erasbk.bayvar' : 'uv@zreila.bayvar')
