<?php

namespace App\Data;

use BenBjurstrom\Prezet\Data\FrontmatterData;
use WendellAdriel\ValidatedDTO\Attributes\Rules;

class CustomFrontmatterData extends FrontmatterData
{
    #[Rules(['string'])]
    public string $type;

    #[Rules(['bool'])]
    public bool $comments;

    #[Rules(['nullable', 'string'])]
    public ?string $comments_header;

    protected function defaults(): array
    {
        return [
            'tags' => [],
            'draft' => false,
            'type' => 'post',
            'comments' => false,
            'comments_header' => 'Leave a comment',
        ];
    }
}
