<?php

namespace App\Http\Controllers\Prezet;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use Prezet\Prezet\Data\DocumentData;
use App\Models\Document;

class IndexController
{
    public function __invoke(Request $request, $filter = NULL): View
    {
        $category = $filter && $request->routeIs('prezet.category') ? $filter : $request->input('category');
        $tag = $filter && $request->routeIs('prezet.tag') ? $filter : $request->input('tag');
        $type = $request->input('type', 'post');
        $author = $request->input('author');

        $query = app(Document::class)::query()
            ->where('content_type', 'article');

        // Only load drafts in dev environments
        if (!App::environment('local', 'dev', 'staging')) {
            $query->where('draft', false);
        }

        if ($category) {
            $query->where('category', $category);
        }

        if ($tag) {
            $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('name', $tag);
            });
        }

        if ($type !== 'all') {
            $query->where('frontmatter', 'like', '%"type":"' . $type . '"%');
        }

        // Filter by author if provided
        if ($author) {
            $query->where('frontmatter->author', $author);
        }

        $currentAuthor = config('prezet.authors.'.$author);

        $docs = $query->orderBy('created_at', 'desc')->paginate(5);

        $docsData = $docs->map(fn (Document $doc) => app(DocumentData::class)::fromModel($doc));

        // Group posts by year
        $postsByYear = $docsData->groupBy(function ($post) {
            return $post->createdAt->format('Y');
        })->sortKeysDesc();

        return view('prezet.index', [
            'articles' => $docsData,
            'docs' => $docs,
            'currentTag' => request()->query('tag'),
            'currentCategory' => request()->query('category'),
            'currentAuthor' => $currentAuthor,
            'postsByYear' => $postsByYear,
        ]);
    }
}
