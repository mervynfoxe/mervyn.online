<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PanelSocialLink extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $header,
        public string $url,
        public string $label,
        public string $target = '_blank',
        public string|null $class = NULL,
        public string|null $rel = NULL
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('legacy.components.panel-social-link');
    }
}
