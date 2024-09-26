<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CommentWidget extends Component
{
    public string $page_id;
    public string $post_slug;
    public string $page_url;
    public string $title;
    public string|bool $header;

    /**
     * Create a new component instance.
     */
    public function __construct($slug, $title, $header = FALSE)
    {
        $this->post_slug = $slug;
        $this->page_url = route('prezet.show', $this->post_slug);
        $this->title = $title;
        $this->header = $header;
        $this->page_id = md5($this->post_slug);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.comment-widget');
    }
}
