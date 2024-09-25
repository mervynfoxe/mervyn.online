<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommentWidget extends Component
{
    public string $page_id;
    public string $page_url;
    public string $page_title;
    public string|bool $header;

    /**
     * Create a new component instance.
     */
    public function __construct($pageId, $pageUrl, $pageTitle, $header = FALSE)
    {
        $this->page_id = $pageId;
        $this->page_url = $pageUrl;
        $this->page_title = $pageTitle;
        $this->header = $header;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comment-widget');
    }
}
