<script>
	<?php
	if (Config::$sCurrentEnv === 'professional') {
		echo 'var sEmail = \'nyrk.e.fpunrssre@tznvy.pbz\';';
	}
	?>
</script>

<?php if (ENVIRONMENT === 'production'): ?>
    <script type="text/javascript" src="/js/vendor/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/js/vendor/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/js/vendor/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/script.min.js"></script>
<?php else: ?>
    <script type="text/javascript" src="/js/vendor/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="/js/vendor/jquery-ui.js"></script>
    <script type="text/javascript" src="/js/vendor/bootstrap.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
<?php endif; ?>
</body>
</html>
