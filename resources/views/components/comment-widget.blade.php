<div class="comments-container{{ $header !== FALSE ? ' has-header' : '' }}">
    <?php if ($header !== FALSE): ?>
    <div class="comments-header">
        <h2 class="text-gray-900 dark:text-gray-200">
            {{ $header }}
        </h2>
    </div>
    <?php endif; ?>
    <div class="comments-container bg-transparent dark:bg-white p-5">
        <div id="cusdis_thread"
             data-host="https://cusdis.com"
             data-app-id="{{ config('blog.comments.app_id') }}"
             data-page-id="{{ $page_id }}"
             data-page-url="{{ $page_url }}"
             data-page-title="{{ $title }}"
        ></div>
        <script async defer src="https://cusdis.com/js/cusdis.es.js"></script>
    </div>
</div>
