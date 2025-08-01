<?php

namespace App\Data;

use Prezet\Prezet\Data\FrontmatterData;
use WendellAdriel\ValidatedDTO\Attributes\Rules;

class CustomFrontmatterData extends FrontmatterData
{
    #[Rules(['string'])]
    public string $type;

    #[Rules(['string', 'in:article,page,category,video'])]
    public string $contentType;

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
