<div class="comments-container">
    <?php if ($header !== FALSE): ?>
    <div class="comments-header">
        <h2>
            {{ $header }}
        </h2>
    </div>
    <?php endif; ?>
    <div class="comments-container">
        <div id="cusdis_thread"
             data-host="https://cusdis.com"
             data-app-id="{{ config('blog.comments.app_id') }}"
             data-page-id="{{ $page_id }}"
             data-page-url="{{ $page_url }}"
             data-page-title="{{ $page_title }}"
        ></div>
        <script async defer src="https://cusdis.com/js/cusdis.es.js"></script>
    </div>
</div>
