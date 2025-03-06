<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SocialIcon extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $icon,
        public string $url,
        public string $title,
        public string $target = '_blank',
        public string $alt = '',
        public string|null $class = NULL,
        public string|null $rel = NULL,
        public string|null $id = NULL,
        public string|null $iconImg = NULL,
        public array|null $panelLinks = NULL
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('legacy.components.social-icon');
    }
}
