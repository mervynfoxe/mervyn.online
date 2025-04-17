@props([
    'title',
    'description',
    'image',
    'keywords',
    'author',
])
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>{{ $title }}</title>
@isset($description)
    <meta name="description" content="{{ $description }}">
@endisset
@isset($keywords)
    <meta name="keywords" content="{{ $keywords }}">
@endisset
@isset($author)
    <meta name="author" content="{{ $author }}">
@endisset
@isset($image)
    {{-- TODO add SEO image tag(s) here --}}
@endisset

@vite(['resources/css/app.css', 'resources/js/app.js'])
