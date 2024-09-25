<?php

namespace App\Models;

use Spatie\Feed\FeedItem as BaseFeedItem;

class FeedItem extends BaseFeedItem
{
    protected string $content;

    public function content(string $content): self {
        $this->content = $content;

        return $this;
    }
}
