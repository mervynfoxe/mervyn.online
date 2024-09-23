<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    protected string $host;
    protected string $environment;

    private array $domain_map = [
        'public' => [
            'mervyn.online',
            'dev.mervyn.online',
            'mervyn-online.lndo.site',
            'localhost',
        ],
        'professional' => [
            'renfox.online',
            'dev.renfox.online',
            'renfox.lndo.site',
        ]
    ];

    public function __construct() {
        $this->host = request()->getHttpHost();
        $this->environment = 'public';

        foreach($this->domain_map as $env=>$domains) {
            if (in_array($this->host, $domains, TRUE)) {
                $this->environment = $env;
                break;
            }
        }
    }

    public function index(Request $request) {
        return view('legacy.index')
            ->with('env', $this->environment)
            ->with('host', $this->host);
    }
}
