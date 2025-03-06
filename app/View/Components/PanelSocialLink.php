<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PanelSocialLink extends Component
{
    public object $link;

    /**
     * Create a new component instance.
     */
    public function __construct($link)
    {
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('legacy.components.panel-social-link');
    }
}
