<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Environment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public array $data = [];
    protected Environment $environment;

    public function __construct() {
        $this->environment = Environment::get(config('app.environment.id'));
        $this->data = [
            'environment' => $this->environment,
            'site_title' => Config::get('site_title'),
            'meta_title' => Config::get('meta_title')
        ];
    }

    public function index(Request $request): View {
        $this->data['request'] = $request;
        return view('landing.content', $this->data);
    }
}
