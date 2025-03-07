<?php

namespace App\Http\Controllers;

use App\Models\Document;

use BenBjurstrom\Prezet\Data\DocumentData;
use BenBjurstrom\Prezet\Http\Controllers\IndexController as BaseIndexController;
use BenBjurstrom\Prezet\Prezet;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogIndexController extends BaseIndexController
{
    public function __invoke(Request $request): View
    {
        $category = $request->input('category');
        $tag = $request->input('tag');
        $type = $request->input('type', 'post');

        $query = app(Document::class)::where('draft', false);

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

        $nav = Prezet::getSummary();
        $docs = $query->orderBy('created_at', 'desc')
            ->paginate(4);

        $docsData = $docs->map(fn (Document $doc) => app(DocumentData::class)::fromModel($doc));

        return view('prezet::index', [
            'nav' => $nav,
            'articles' => $docsData,
            'paginator' => $docs,
            'currentTag' => request()->query('tag'),
            'currentCategory' => request()->query('category'),
        ]);
    }
}
