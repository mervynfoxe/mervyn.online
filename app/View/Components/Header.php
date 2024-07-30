<?php

namespace App\View\Components;

use App\Models\Config;
use App\Models\Descriptor;
use App\Models\Environment;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public string $content_h1 = '';
    public array $features = [];
    protected Environment $environment;

    /**
     * Create a new component instance.
     */
    public function __construct(Environment $environment = NULL)
    {
        $this->environment = $environment ?? Environment::get(config('app.environment.id'));
        $this->content_h1 = Config::get('site_title');
        $feature_arr = Descriptor::getFromEnvironment($this->environment->id);
        if ($this->environment->shuffle_descriptors) {
            shuffle($feature_arr);
        }
        $feature_strs = array_map(static function($item) {
            return $item['label'];
        }, $feature_arr);
        $this->features = array_slice($feature_strs, 0, 3);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
