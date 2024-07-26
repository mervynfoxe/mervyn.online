<?php

namespace App\View\Components;

use App\Models\Config;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Copyright extends Component
{
    public string $year = '';
    public string $copyright_name = '';

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->year = date('Y');
        $this->copyright_name = Config::get('copyright_name');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.copyright');
    }
}
