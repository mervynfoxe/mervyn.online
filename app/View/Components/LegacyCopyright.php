<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LegacyCopyright extends Component
{
    public string $environment;

    /**
     * Create a new component instance.
     */
    public function __construct($environment)
    {
        $this->environment = $environment;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('legacy.components.legacy-copyright');
    }
}
