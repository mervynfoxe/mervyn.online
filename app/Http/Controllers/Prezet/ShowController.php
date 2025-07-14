<?php

namespace App\Http\Controllers\Prezet;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Prezet\Prezet\Prezet;

class ShowController
{
    public function __invoke(Request $request, string $slug): View
    {
        $doc = Prezet::getDocumentModelFromSlug($slug);
        $nav = Prezet::getSummary();
        $md = Prezet::getMarkdown($doc->filepath);
        $html = Prezet::parseMarkdown($md)->getContent();
        $headings = Prezet::getHeadings($html);
        $docData = Prezet::getDocumentDataFromFile($doc->filepath);
        $image = $docData->frontmatter->image ? Storage::disk(Prezet::getPrezetDisk())->url('images/' . $docData->frontmatter->image) : NULL;
        $linkedData = json_encode(Prezet::getLinkedData($docData), JSON_UNESCAPED_SLASHES);

        return view('prezet.show', [
            'document' => $docData,
            'image' => $image,
            'linkedData' => $linkedData,
            'headings' => $headings,
            'body' => $html,
            'nav' => $nav,
        ]);
    }
}
