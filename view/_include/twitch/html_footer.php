<?php if (ENVIRONMENT === 'production'): ?>
    <script type="text/javascript" src="/js/vendor/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/js/vendor/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/js/vendor/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/twitch/script.min.js"></script>
<?php else: ?>
    <script type="text/javascript" src="/js/vendor/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="/js/vendor/jquery-ui.js"></script>
    <script type="text/javascript" src="/js/vendor/bootstrap.js"></script>
    <script type="text/javascript" src="/js/twitch/script.js"></script>
<?php endif; ?>
</body>
</html>