<?php

namespace App\Models;

use App\Data\CustomFrontmatterData as FrontmatterData;

use BenBjurstrom\Prezet\Models\Document as BaseDocument;
use BenBjurstrom\Prezet\Models\Tag;
use BenBjurstrom\Prezet\Prezet;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Feed\Feedable;
use App\Models\FeedItem;

/**
 * @property string $slug
 * @property string $filepath
 * @property string|null $category
 * @property bool $draft
 * @property FrontmatterData $frontmatter
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * */
class Document extends BaseDocument implements Feedable
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'draft' => 'boolean',
            'frontmatter' => FrontmatterData::class,
        ];
    }

    public function type(): string
    {
        return $this->frontmatter->type;
    }

    public function toFeedItem(): FeedItem {
        $authors = config('prezet.authors');
        $author = $authors[$this->frontmatter->author]['name'] ?? $authors['default']['name'];

        $md = Prezet::getMarkdown($this->filepath);
        $html = Prezet::parseMarkdown($md)->getContent();

        return FeedItem::create()
            ->id($this->slug)
            ->title($this->frontmatter->title)
            ->summary($this->frontmatter->excerpt)
            ->category($this->frontmatter->category ?? '')
            ->updated($this->created_at)
            ->link(route('prezet.show', $this->slug))
            ->authorName($author)
            ->content($html);
    }

    public static function getFeedItems(): \Illuminate\Database\Eloquent\Collection {
        return self::where('draft', false)
            ->where('frontmatter', 'like', '%"type":"post"%')->get();
    }
}
