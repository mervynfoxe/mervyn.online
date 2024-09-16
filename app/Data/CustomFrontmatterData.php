<?php

namespace App\Data;

use BenBjurstrom\Prezet\Data\FrontmatterData;
use WendellAdriel\ValidatedDTO\Attributes\Rules;

class CustomFrontmatterData extends FrontmatterData
{
    #[Rules(['string'])]
    public string $type;

    protected function defaults(): array
    {
        return [
            'tags' => [],
            'draft' => false,
            'type' => 'post',
        ];
    }
}
