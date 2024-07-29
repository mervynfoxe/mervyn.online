<?php

namespace App\View\Components;

use App\Models\Config;
use App\Models\Environment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public string $content_h1 = '';
    public array $features = [];

    // TODO move this to config table to pull from
    private array $feature_opts = [
        'default' => [
            'Web Dev',
            'Internet Fox',
            'Slacker',
            'Bad to the Bone',
            'Bad at Games',
            'Time-waster',
            'Coffee-consumer',
            //    'Lucio Main',
            'No one of Importance',
            'Never Sleeps',
            'Key Smasher',
            'Soft Friend',
            'Photo-taker',
        ],
        'professional' => [
            'Applications',
            'Websites',
            'Databases',
        ]
    ];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->content_h1 = Config::get('site_title');
        // TODO set up DB config option for if feature list should be randomized and assemble list
        $environment = Environment::get(config('app.environment.id'));
        $feature_arr = $this->feature_opts[$environment->name];
        if ($environment->name === 'default') {
            shuffle($feature_arr);
        }
        $this->features = array_slice($feature_arr, 0, 3);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
